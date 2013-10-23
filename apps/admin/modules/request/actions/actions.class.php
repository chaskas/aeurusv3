<?php

/**
 * request actions.
 *
 * @package    aeurus
 * @subpackage request
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class requestActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->requests = Doctrine_Core::getTable('Request')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RequestForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RequestForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($request = Doctrine_Core::getTable('Request')->find(array($request->getParameter('id'))), sprintf('Object request does not exist (%s).', $request->getParameter('id')));
    $this->form = new RequestForm($request);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($request = Doctrine_Core::getTable('Request')->find(array($request->getParameter('id'))), sprintf('Object request does not exist (%s).', $request->getParameter('id')));
    $this->form = new RequestForm($request);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($request = Doctrine_Core::getTable('Request')->find(array($request->getParameter('id'))), sprintf('Object request does not exist (%s).', $request->getParameter('id')));
    $request->delete();

    $this->redirect('request/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $request = $form->save();

      $this->redirect('request/edit?id='.$request->getId());
    }
  }
}
