<?php

/**
 * Question form base class.
 *
 * @method Question getObject() Returns the current form's model object
 *
 * @package    phptest
 * @subpackage form
 * @author     Pascal Larocque
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'question_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionCategory'), 'add_empty' => false)),
      'validation_type'      => new sfWidgetFormChoice(array('choices' => array('text' => 'text', 'email' => 'email', 'postalCode' => 'postalCode', 'number' => 'number'))),
      'description'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionCategory'))),
      'validation_type'      => new sfValidatorChoice(array('choices' => array(0 => 'text', 1 => 'email', 2 => 'postalCode', 3 => 'number'), 'required' => false)),
      'description'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

}
