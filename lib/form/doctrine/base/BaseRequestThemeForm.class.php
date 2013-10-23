<?php

/**
 * RequestTheme form base class.
 *
 * @method RequestTheme getObject() Returns the current form's model object
 *
 * @package    aeurus
 * @subpackage form
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRequestThemeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'request_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Request'), 'add_empty' => false)),
      'theme_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Theme'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'request_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Request'))),
      'theme_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Theme'))),
    ));

    $this->widgetSchema->setNameFormat('request_theme[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RequestTheme';
  }

}
