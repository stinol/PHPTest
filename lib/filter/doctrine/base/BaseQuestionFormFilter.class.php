<?php

/**
 * Question filter form base class.
 *
 * @package    phptest
 * @subpackage filter
 * @author     Pascal Larocque
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuestionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'question_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionCategory'), 'add_empty' => true)),
      'validation_type'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'text' => 'text', 'email' => 'email', 'postalCode' => 'postalCode', 'number' => 'number'))),
      'description'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'question_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('QuestionCategory'), 'column' => 'id')),
      'validation_type'      => new sfValidatorChoice(array('required' => false, 'choices' => array('text' => 'text', 'email' => 'email', 'postalCode' => 'postalCode', 'number' => 'number'))),
      'description'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'question_category_id' => 'ForeignKey',
      'validation_type'      => 'Enum',
      'description'          => 'Text',
    );
  }
}
