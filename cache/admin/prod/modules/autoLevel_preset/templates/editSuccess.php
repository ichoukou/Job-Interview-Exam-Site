<?php
// auto-generated by sfPropelAdmin
// date: 2007/03/28 18:09:57
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Edit Staff Level', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('level_preset/edit_header', array('level_preset' => $level_preset)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('level_preset/edit_messages', array('level_preset' => $level_preset, 'labels' => $labels)) ?>
<?php include_partial('level_preset/edit_form', array('level_preset' => $level_preset, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('level_preset/edit_footer', array('level_preset' => $level_preset)) ?>
</div>

</div>