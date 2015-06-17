<h2>Welcome <?php echo $sf_user->getAttribute('fullname'); ?></h2>

<p>
You have to answer, <br />
<?php foreach($questions as $question) : ?>
<?php echo $question['questions'].' questions for '.$question['department'].' at Level - '.$question['level']; ?><br />
<?php endforeach; ?>
<br /><br /><br />
<?php echo form_tag('exam/save') ?><br />
<?php foreach($all_questions as $row) : ?>
<?php echo ++$j.'. '.$row['q_desc']."<br />"; ?>
<?php echo radiobutton_tag('questions['.$row['q_id'].']', '1', false).$row['q_a'] ?> <br />
<?php echo radiobutton_tag('questions['.$row['q_id'].']', '2', false).$row['q_b'] ?> <br />
<?php echo ($row['q_c']) ? radiobutton_tag('questions['.$row['q_id'].']', '3', false).$row['q_c'] : ''; ?> <br />
<?php echo ($row['q_d']) ? radiobutton_tag('questions['.$row['q_id'].']', '3', false).$row['q_d'] : ''; ?> 
<br /><br />
<?php endforeach; ?>
<?php echo submit_tag('Done') ?>
</p>