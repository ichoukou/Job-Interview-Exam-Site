<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/29 01:22:34
?>
<td colspan="7">
    <?php echo link_to($question_generator->getId() ? $question_generator->getId() : __('-'), 'question_generator/edit?id='.$question_generator->getId()) ?>
     - 
    <?php echo $question_generator->getUserId() ?>
     - 
    <?php echo $question_generator->getQuestionId() ?>
     - 
    <?php echo $question_generator->getAnswer() ?>
     - 
    <?php echo $question_generator->getAnswerOptionId() ?>
     - 
    <?php echo ($question_generator->getCreatedAt() !== null && $question_generator->getCreatedAt() !== '') ? format_date($question_generator->getCreatedAt(), "f") : '' ?>
     - 
    <?php echo ($question_generator->getAnswerAt() !== null && $question_generator->getAnswerAt() !== '') ? format_date($question_generator->getAnswerAt(), "f") : '' ?>
     - 
</td>