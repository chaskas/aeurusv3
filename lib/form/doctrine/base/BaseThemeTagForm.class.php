<?php

/**
 * ThemeTag form base class.
 *
 * @method ThemeTag getObject() Returns the current form's model object
 *
 * @package    aeurus
 * @subpackage form
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseThemeTagForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'theme_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Theme'), 'add_empty' => false)),
      'tag_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'theme_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Theme'))),
      'tag_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'))),
    ));

    $this->widgetSchema->setNameFormat('theme_tag[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ThemeTag';
  }

}
