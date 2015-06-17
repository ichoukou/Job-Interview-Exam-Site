<h2>Welcome to Online KRA Exam System (Beta)</h2>
<br />
<h2>Rules and Regulations</h2>
<ul>
	<li>Please answer all the questions within 2 hours</li>
	<li>Answers submitted after 2 hours will consider forfeit</li>
	<li>When you click on Start Test, exam time will start from there</li>
	<li>If you have any problem, please contact yor superior</li>
	<li>You are not allow to start the exam twice</li>
	<li>Questions are randomly generated, you are advice <strong>NOT TO</strong> refresh the page during the test, the new set of question will re-generate.</li>
	<li>During exam, if there is any unforseen circumstance like leaving the test for urgent matter, please report to your superior to re-arrange exam slot</li>
	<li>You are only allow to take the exam at 1st Floor's NOC, question answer outside the hall will consider forfeit</li>
</ul>

<br />
<h2>Exam Session</h2>
<?php echo ($sf_user->isAuthenticated()) ? 'Welcome '.$sf_user->getAttribute('fullname').', would you like to log out? '.link_to('Log Out', 'exam/logout') : link_to('Proceed to Log In', 'exam/loginForm'); ?>
<?php if ($sf_user->isAuthenticated()): ?>
<ul>
  <li>I would like to <?php echo link_to('Start Test', 'exam/login') ?></li>
</ul>
<?php endif; ?>
<br /><br />
If you required more info/help, please contact paul.ooi@aims.com.my.