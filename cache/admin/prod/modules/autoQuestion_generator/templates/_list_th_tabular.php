<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/29 01:22:34
?>
  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'question_generator/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'question_generator/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_user_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'user_id'): ?>
      <?php echo link_to(__('User'), 'question_generator/list?sort=user_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('User'), 'question_generator/list?sort=user_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_question_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'question_id'): ?>
      <?php echo link_to(__('Question'), 'question_generator/list?sort=question_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Question'), 'question_generator/list?sort=question_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_answer">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'answer'): ?>
      <?php echo link_to(__('Answer'), 'question_generator/list?sort=answer&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Answer'), 'question_generator/list?sort=answer&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_answer_option_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'answer_option_id'): ?>
      <?php echo link_to(__('Answer option'), 'question_generator/list?sort=answer_option_id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Answer option'), 'question_generator/list?sort=answer_option_id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_created_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'created_at'): ?>
      <?php echo link_to(__('Created at'), 'question_generator/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created at'), 'question_generator/list?sort=created_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_answer_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/question_generator/sort') == 'answer_at'): ?>
      <?php echo link_to(__('Answer at'), 'question_generator/list?sort=answer_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/question_generator/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Answer at'), 'question_generator/list?sort=answer_at&type=asc') ?>
      <?php endif; ?>
          </th>
