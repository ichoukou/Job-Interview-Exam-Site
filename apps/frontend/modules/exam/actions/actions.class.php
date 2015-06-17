<?php

/**
 * exam actions.
 *
 * @package    kra
 * @subpackage exam
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class examActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  }

	public function executeLogin()
	{
		if ($this->getRequest()->getMethod() != sfRequest::POST)
		  {
		    return sfView::SUCCESS;
		  }
		  else
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
						$staffEmail = $staff->getEmail();
						$staffGrade = $staff->getGradeId();
					}

			    $this->getUser()->setAttribute('fullname', $staffFullname);
					$this->getUser()->setAttribute('email', $staffEmail);
					$this->getUSer()->setAttribute('staff_grade', $staffGrade);
					$this->getUSer()->setAttribute('staff_id', $staffId);

					return $this->redirect('exam/login');
			  }
			  else
			  {
			    $this->getRequest()->setError('loginForm', 'incorrect entry');

			    return $this->redirect('exam/loginForm');
			  }
		  }
	}
	
	public function executeLoginForm()
	{
	}
	
	public function executeStart()
	{
		$c = new Criteria();
		$c->add(QuestionGeneratorPeer::USER_ID, $this->getUser()->getAttribute('staff_id'));
		$taken_exam = QuestionGeneratorPeer::doSelect($c);
		
		if($taken_exam)
		{
			$this->getRequest()->setError('exam', 'Exam already taken');
			return $this->redirect('exam/index');
		}
		
		if($this->getUser()->isAuthenticated())
		{
			$c = new Criteria();
			$c->add(LevelPresetPeer::GRADE_ID, $this->getUser()->getAttribute('staff_grade'));
			$grade_settings = LevelPresetPeer::doSelect($c);
		
			foreach ($grade_settings as $grade_setting)
			{
				++$q;
				$questions[$q]['department'] = $grade_setting->getName();
				$questions[$q]['questions'] = $grade_setting->getQuestionNo();
				$questions[$q]['level'] = $grade_setting->getLevel();
			}
			$this->questions = $questions;
		
			foreach ($questions as $question)
			{
				++$g;
				$department_id = $this->getDepartmentId($question['department']);

				$c = new Criteria();
				$c->add(QuestionPeer::DEPARTMENT_ID, $department_id);
				$c->add(QuestionPeer::LEVEL, $question['level']);
				$c->setLimit($question['questions']);
			
				$loaded_questions[] = QuestionPeer::doSelect($c);
			}
		
			foreach($loaded_questions as $loaded_question)
			{
				foreach($loaded_question as $row)
				{
					++$kk;
					$all_questions[$kk]['q_id'] = $row->getId();
					$all_questions[$kk]['q_desc'] = $row->getDescription();
					$all_questions[$kk]['q_a'] = $row->getAnswerA();
					$all_questions[$kk]['q_b'] = $row->getAnswerB();
					$all_questions[$kk]['q_c'] = $row->getAnswerC();
					$all_questions[$kk]['q_d'] = $row->getAnswerD();
				}
				$this->all_questions = $all_questions;
			}
		}
		else
		{
			$this->redirect('exam', 'index');
		}
	}
	
	public function executeSave()
	{
		$questions = $this->getRequestParameter('questions');
		foreach ($questions as $questionId=>$answerId)
		{	
			$qg = new QuestionGenerator();
			$qg->setUserId($this->getUser()->getAttribute('staff_id'));
			$qg->setQuestionId($questionId);
			$qg->setAnswer($answerId);
			$qg->save();
		}
	}
	
	public function getDepartmentId($department_name)
	{
		$c = new Criteria();
		$c->add(DepartmentPeer::NAME, $department_name);
		
		$department_ids = DepartmentPeer::doSelect($c);
		
		foreach ($department_ids as $row)
		{
			$the_department_id = $row->getId();
		}
		
		return $the_department_id;
	}
	
	public function executeLogout()
	{
		$this->getUser()->setAuthenticated(false);
		$this->getUser()->getAttributeHolder()->clear();
		
		return $this->forward('exam', 'index');
	}
}
