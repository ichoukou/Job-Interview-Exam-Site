<h2>Staff Authentication</h2>
 
<?php if ($sf_request->hasErrors()): ?>
  Identification failed - please try again
<?php endif; ?>

<?php echo form_tag('exam/login') ?>
  <label for="login">email address:</label>
  <?php echo input_tag('login', $sf_params->get('login')) ?>
  <br />
  <label for="password">password:</label>
  <?php echo input_password_tag('password') ?>
  <br />
  <?php echo submit_tag('submit', 'class=default') ?>
</form>