<?php

/**
 * RequestTheme filter form base class.
 *
 * @package    aeurus
 * @subpackage filter
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRequestThemeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'request_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Request'), 'add_empty' => true)),
      'theme_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Theme'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'request_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Request'), 'column' => 'id')),
      'theme_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Theme'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('request_theme_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'RequestTheme';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'request_id' => 'ForeignKey',
      'theme_id'   => 'ForeignKey',
    );
  }
}
