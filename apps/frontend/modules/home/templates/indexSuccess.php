<div id="content" >
    <?php echo form_tag('@homepage',array('id'=>'answer_form', 'style'=>'display:none;', 'class'=>'row')) ?>

        <?php echo $form['_csrf_token']->render() ?>

        <?php echo $form['question_id']->render() ?>
        <?php echo $form['session_id']->render() ?>
        <?php echo $form['question_id']->renderLabel() ?>
        <br />
        <br />
        <?php echo $form['answer']->renderLabel() ?>
        <br />
        <?php echo $form['answer']->render() ?>



        <br />
        <input type="submit" value="Send" class="button" id="submit" />
    </form>
</div>
<script type="text/javascript">
    $categories = <?php echo html_entity_decode($json) ?>;
    $questions = new Questions($categories);
    $questions.generateCategories(jQuery('#content'));
</script>



