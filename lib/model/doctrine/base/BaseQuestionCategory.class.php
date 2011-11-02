<?php

/**
 * BaseQuestionCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $question_category_id
 * @property string $name
 * @property QuestionCategory $ParentCaregory
 * @property Doctrine_Collection $SubCategories
 * @property Doctrine_Collection $Questions
 * 
 * @method integer             getQuestionCategoryId()   Returns the current record's "question_category_id" value
 * @method string              getName()                 Returns the current record's "name" value
 * @method QuestionCategory    getParentCaregory()       Returns the current record's "ParentCaregory" value
 * @method Doctrine_Collection getSubCategories()        Returns the current record's "SubCategories" collection
 * @method Doctrine_Collection getQuestions()            Returns the current record's "Questions" collection
 * @method QuestionCategory    setQuestionCategoryId()   Sets the current record's "question_category_id" value
 * @method QuestionCategory    setName()                 Sets the current record's "name" value
 * @method QuestionCategory    setParentCaregory()       Sets the current record's "ParentCaregory" value
 * @method QuestionCategory    setSubCategories()        Sets the current record's "SubCategories" collection
 * @method QuestionCategory    setQuestions()            Sets the current record's "Questions" collection
 * 
 * @package    phptest
 * @subpackage model
 * @author     Pascal Larocque
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseQuestionCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('question_categories');
        $this->hasColumn('question_category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('QuestionCategory as ParentCaregory', array(
             'local' => 'question_category_id',
             'foreign' => 'id'));

        $this->hasMany('QuestionCategory as SubCategories', array(
             'local' => 'id',
             'foreign' => 'question_category_id'));

        $this->hasMany('Question as Questions', array(
             'local' => 'id',
             'foreign' => 'question_category_id'));
    }
}