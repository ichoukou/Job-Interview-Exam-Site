<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

<?php echo link_to('User Control Panel', 'user/list'); ?> |
<?php echo link_to('Department Control', 'department/list')." | " ?>
<?php echo link_to('Grade Control', 'grade')." | " ?>
<?php echo link_to('Level Setting Control', 'level_preset')." | " ?>
<?php echo link_to('Question Control', 'question')." | " ?>
<?php echo link_to('Answer Options', 'answer_option')." | " ?>
<?php if($sf_user->isAuthenticated()): ?>
<?php echo link_to('Log Out', 'security/logout'); ?>
<?php else: ?>
<?php echo link_to('Log In', 'security'); ?>
<?php endif; ?>

<?php echo $sf_data->getRaw('sf_content') ?>

</body>
</html>
