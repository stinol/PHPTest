<?php

/**
 * Answer form.
 *
 * @package    phptest
 * @subpackage form
 * @author     Pascal Larocque
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnswerForm extends BaseAnswerForm
{
  public function configure()
  {
      $this->useFields(array('question_id','answer', 'session_id'));
      $this->widgetSchema['answer'] = new sfWidgetFormTextarea();
      $this->widgetSchema['question_id'] = new tiWidgetReadonlyText();
      $this->widgetSchema['session_id'] = new sfWidgetFormInputHidden();
  }
}
