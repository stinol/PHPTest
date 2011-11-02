<?php

/**
 * QuestionCategory filter form base class.
 *
 * @package    phptest
 * @subpackage filter
 * @author     Pascal Larocque
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseQuestionCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'question_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCaregory'), 'add_empty' => true)),
      'name'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'question_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ParentCaregory'), 'column' => 'id')),
      'name'                 => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('question_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuestionCategory';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'question_category_id' => 'ForeignKey',
      'name'                 => 'Text',
    );
  }
}
