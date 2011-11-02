/**
 * Created by IntelliJ IDEA.
 * User: pascal
 * Date: 30/10/11
 * Time: 9:53 PM
 * To change this template use File | Settings | File Templates.
 */

function Questions($categories) {

    var _categories;
    var _prependTo;
    var _selectedCategory = [];
    var _selectedSubCategory = [];

    var _generateSubCategory = function(evt) {
        _selectedCategory['index'] =  evt.target.value;
        _selectedCategory['id'] =_categories[_selectedCategory['index']].id;
        jQuery(_prependTo).slideUp('slow',_showSubCategories);

    }

    var _showSubCategories = function(){
        list = jQuery('<ul class="subcategory row"></ul>');
        jQuery(list).prependTo(_prependTo)
        for (var $subCategoryId in _categories[_selectedCategory['index']].SubCategories) {
                var $categoryButton = jQuery('<li><button class="button" value="'+$subCategoryId+'">' + _categories[_selectedCategory['index']].SubCategories[$subCategoryId].name + '</button></li>')
                jQuery($categoryButton).click(_generateQuestion);
                jQuery($categoryButton).prependTo(list);
            }
            jQuery('.category').remove();
            jQuery(_prependTo).slideDown();
        }

    var _generateQuestion = function(evt){
        _selectedSubCategory['index'] =  evt.target.value;
        _selectedSubCategory['id'] =_categories[_selectedCategory['index']].SubCategories[_selectedSubCategory['index']].id;
        jQuery(_prependTo).slideUp('slow',_showQuestion);
    }

    var _showQuestion = function(){
         var $questionForm =  _setupForm(_categories[_selectedCategory['index']].SubCategories[_selectedSubCategory['index']].Questions[0]);
        jQuery('.subcategory').remove();
        jQuery(_prependTo).slideDown();
    }

    var _setupForm = function($question){
        jQuery('[for="answer_question_id"]').html($question.description);
        jQuery('#answer_question_id').attr('value',$question.id);
        $validationFunction = eval('_validate'+$question.validation_type);
        jQuery('#answer_form').submit($validationFunction).show();
    }

    var _validatetext = function(){
        if(jQuery.trim(jQuery('#answer_answer').attr('value')).length == 0) { alert('Please Enter a value'); return false; }
        return true ;
    }

    var _validatenumber = function(){
        var $regNumeric = /^\d+$/g;
        if(!$regNumeric.test(jQuery.trim(jQuery('#answer_answer').attr('value')))) { alert('Please Enter a Number'); return false; }
        return _validatetext() ;
    }

    var _validateemail = function(){
        var $regEmail = /^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/ig;
        if(!$regEmail.test(jQuery.trim(jQuery('#answer_answer').attr('value')))) { alert('Please Enter a valid Email'); return false; }
        return _validatetext() ;
    }

    var _validatepostalCode = function(){
        var $regPostalCode = /^[a-zA-Z]\d[a-zA-Z]\s\d[a-zA-Z]\d$/ig;
        if(!$regPostalCode.test(jQuery.trim(jQuery('#answer_answer').attr('value')))) { alert('Please Enter a valid Postal Code'); return false; }
        return _validatetext() ;
    }

    this.init = function($categories) {
        _categories = $categories;
    }

    this.generateCategories = function($prependToElement) {
        _prependTo = $prependToElement;
        list = jQuery('<ul class="category row"></ul>');
        jQuery(list).prependTo(_prependTo)
        for (var categoryId in _categories) {
            var categoryButton = jQuery('<li><button class="button" value="'+categoryId+'">' + _categories[categoryId].name + '</button></li>')
            jQuery(categoryButton).click(_generateSubCategory);
            jQuery(categoryButton).prependTo(list);

        }

    }
    this.init($categories);

}
Questions.prototype = new Object();

