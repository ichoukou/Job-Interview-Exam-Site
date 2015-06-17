<?php

/**
 * security actions.
 *
 * @package    kra
 * @subpackage security
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class securityActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  }

	public function executeLogin()
	{
		$username = $this->getRequestParameter('login');
		$password = $this->getRequestParameter('password');
		
		$c = new Criteria();
		$c->add(UserPeer::EMAIL, $username);
		$c->add(UserPeer::PASSWORD, $password);
		
		$staffs = UserPeer::doSelect($c);
		
	  if ($staffs)
	  {
	    $this->getUser()->setAuthenticated(true);
			
			foreach($staffs as $staff)
			{
				$staffId = $staff->getId();
				$staffAdmin = $staff->getAdmin();
				$staffFullname = $staff->getFullname();
			}
			
			if($staffAdmin)
			{
				$this->getUser()->addCredential('admin');
			}
			
	    return $this->redirect('user/index');
	  }
	  else
	  {
	    $this->getRequest()->setError('login', 'incorrect entry');

	    return $this->forward('security', 'index');
	  }
	}
	
	public function executeLogout()
	{
		$this->getUser()->setAuthenticated(false);
		$this->getUser()->removeCredential('admin');
		
		return $this->forward('security', 'index');
	}
}
