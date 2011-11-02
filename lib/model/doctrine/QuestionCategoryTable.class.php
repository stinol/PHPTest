<?php

/**
 * QuestionCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuestionCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object QuestionCategoryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('QuestionCategory');
    }

    public static function getAllCategoriesWithSubcategoriesAndQuestion($sessionId){
        return self::getInstance()->createQuery('qc')
                ->select('qc.name, subcategories.name, q.validation_type, q.description')
                ->innerJoin('qc.SubCategories subcategories')
                ->innerJoin('subcategories.Questions q With q.id not in (select a.question_id from Answer a where a.session_id = \''.$sessionId.'\')')
                ->where('qc.question_category_id is null')
                ->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
    }
}