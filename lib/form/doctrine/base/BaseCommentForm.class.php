<?php

/**
 * Comment form base class.
 *
 * @method Comment getObject() Returns the current form's model object
 *
 * @package    aeurus
 * @subpackage form
 * @author     Rodrigo Campos H. rodrigo <at> webdevel <dot> cl
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'request_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme'), 'add_empty' => false)),
      'theme_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme_2'), 'add_empty' => false)),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'request_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme'))),
      'theme_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RequestTheme_2'))),
      'description' => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

}
