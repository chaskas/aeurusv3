<?php

/**
 * theme actions.
 *
 * @package    aeurus
 * @subpackage theme
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class themeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->themes = Doctrine_Core::getTable('Theme')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ThemeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ThemeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($theme = Doctrine_Core::getTable('Theme')->find(array($request->getParameter('id'))), sprintf('Object theme does not exist (%s).', $request->getParameter('id')));
    $this->form = new ThemeForm($theme);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($theme = Doctrine_Core::getTable('Theme')->find(array($request->getParameter('id'))), sprintf('Object theme does not exist (%s).', $request->getParameter('id')));
    $this->form = new ThemeForm($theme);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($theme = Doctrine_Core::getTable('Theme')->find(array($request->getParameter('id'))), sprintf('Object theme does not exist (%s).', $request->getParameter('id')));
    $theme->delete();

    $this->redirect('theme/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $theme = $form->save();

      $this->redirect('theme/edit?id='.$theme->getId());
    }
  }
}
