<?php

/**
 * home actions.
 *
 * @package    phptest
 * @subpackage home
 * @author     Pascal Larocque
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        if($request->isMethod('POST')){
            $this->saveForm($request);
        }
        $sessionId = session_id();
        $categories = QuestionCategoryTable::getAllCategoriesWithSubcategoriesAndQuestion($sessionId);
        $this->json = json_encode($categories);
        $answer = new Answer();
        $answer->session_id = $sessionId;
        $this->form = new AnswerForm($answer);

    }

    private function saveForm( sfWebRequest $request){
        $form = new AnswerForm();
        $form->bind($request->getParameter('answer'));
        if($form->isValid()){
            $form->save();
        }
    }
}
