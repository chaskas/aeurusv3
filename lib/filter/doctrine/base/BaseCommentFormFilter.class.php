<?php

/**
 * Comment filter form base class.
 *
 * @package    aeurus
 * @subpackage filter
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'request_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme'), 'add_empty' => true)),
      'theme_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme_2'), 'add_empty' => true)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'request_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RequestTheme'), 'column' => 'id')),
      'theme_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RequestTheme_2'), 'column' => 'id')),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'request_id'  => 'ForeignKey',
      'theme_id'    => 'ForeignKey',
      'description' => 'Text',
    );
  }
}
