<?php

/**
 * AnswerTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnswerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AnswerTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Answer');
    }

    public function retrieveWithQuestionsForList(Doctrine_Query $q)
    {
        $rootAlias = $q->getRootAlias();
        $q->innerJoin($rootAlias . '.Question q');
        return $q;
    }
}