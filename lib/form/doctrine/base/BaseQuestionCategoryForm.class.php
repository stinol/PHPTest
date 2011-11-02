<?php

/**
 * QuestionCategory form base class.
 *
 * @method QuestionCategory getObject() Returns the current form's model object
 *
 * @package    phptest
 * @subpackage form
 * @author     Pascal Larocque
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuestionCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'question_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCaregory'), 'add_empty' => true)),
      'name'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ParentCaregory'), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('question_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuestionCategory';
  }

}
