<?php


abstract class BaseDepartment extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $user_id;


	
	protected $created_at;

	
	protected $aUser;

	
	protected $collUsers;

	
	protected $lastUserCriteria = null;

	
	protected $collGrades;

	
	protected $lastGradeCriteria = null;

	
	protected $collLevelPresets;

	
	protected $lastLevelPresetCriteria = null;

	
	protected $collQuestions;

	
	protected $lastQuestionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DepartmentPeer::ID;
		}

	} 
	
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DepartmentPeer::NAME;
		}

	} 
	
	public function setUserId($v)
	{

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = DepartmentPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = DepartmentPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->user_id = $rs->getInt($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Department object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DepartmentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DepartmentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DepartmentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aUser !== null) {
				if ($this->aUser->isModified()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DepartmentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DepartmentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collUsers !== null) {
				foreach($this->collUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGrades !== null) {
				foreach($this->collGrades as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLevelPresets !== null) {
				foreach($this->collLevelPresets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collQuestions !== null) {
				foreach($this->collQuestions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}


			if (($retval = DepartmentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsers !== null) {
					foreach($this->collUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGrades !== null) {
					foreach($this->collGrades as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLevelPresets !== null) {
					foreach($this->collLevelPresets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collQuestions !== null) {
					foreach($this->collQuestions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getUserId();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DepartmentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getUserId(),
			$keys[3] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DepartmentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setUserId($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DepartmentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUserId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DepartmentPeer::DATABASE_NAME);

		if ($this->isColumnModified(DepartmentPeer::ID)) $criteria->add(DepartmentPeer::ID, $this->id);
		if ($this->isColumnModified(DepartmentPeer::NAME)) $criteria->add(DepartmentPeer::NAME, $this->name);
		if ($this->isColumnModified(DepartmentPeer::USER_ID)) $criteria->add(DepartmentPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(DepartmentPeer::CREATED_AT)) $criteria->add(DepartmentPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DepartmentPeer::DATABASE_NAME);

		$criteria->add(DepartmentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setUserId($this->user_id);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getUsers() as $relObj) {
				$copyObj->addUser($relObj->copy($deepCopy));
			}

			foreach($this->getGrades() as $relObj) {
				$copyObj->addGrade($relObj->copy($deepCopy));
			}

			foreach($this->getLevelPresets() as $relObj) {
				$copyObj->addLevelPreset($relObj->copy($deepCopy));
			}

			foreach($this->getQuestions() as $relObj) {
				$copyObj->addQuestion($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DepartmentPeer();
		}
		return self::$peer;
	}

	
	public function setUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->aUser = $v;
	}


	
	public function getUser($con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';

		if ($this->aUser === null && ($this->user_id !== null)) {

			$this->aUser = UserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->aUser;
	}

	
	public function initUsers()
	{
		if ($this->collUsers === null) {
			$this->collUsers = array();
		}
	}

	
	public function getUsers($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsers === null) {
			if ($this->isNew()) {
			   $this->collUsers = array();
			} else {

				$criteria->add(UserPeer::DEPARTMENT_ID, $this->getId());

				UserPeer::addSelectColumns($criteria);
				$this->collUsers = UserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserPeer::DEPARTMENT_ID, $this->getId());

				UserPeer::addSelectColumns($criteria);
				if (!isset($this->lastUserCriteria) || !$this->lastUserCriteria->equals($criteria)) {
					$this->collUsers = UserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUserCriteria = $criteria;
		return $this->collUsers;
	}

	
	public function countUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(UserPeer::DEPARTMENT_ID, $this->getId());

		return UserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUser(User $l)
	{
		$this->collUsers[] = $l;
		$l->setDepartment($this);
	}


	
	public function getUsersJoinGrade($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsers === null) {
			if ($this->isNew()) {
				$this->collUsers = array();
			} else {

				$criteria->add(UserPeer::DEPARTMENT_ID, $this->getId());

				$this->collUsers = UserPeer::doSelectJoinGrade($criteria, $con);
			}
		} else {
									
			$criteria->add(UserPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastUserCriteria) || !$this->lastUserCriteria->equals($criteria)) {
				$this->collUsers = UserPeer::doSelectJoinGrade($criteria, $con);
			}
		}
		$this->lastUserCriteria = $criteria;

		return $this->collUsers;
	}

	
	public function initGrades()
	{
		if ($this->collGrades === null) {
			$this->collGrades = array();
		}
	}

	
	public function getGrades($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGradePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGrades === null) {
			if ($this->isNew()) {
			   $this->collGrades = array();
			} else {

				$criteria->add(GradePeer::DEPARTMENT_ID, $this->getId());

				GradePeer::addSelectColumns($criteria);
				$this->collGrades = GradePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GradePeer::DEPARTMENT_ID, $this->getId());

				GradePeer::addSelectColumns($criteria);
				if (!isset($this->lastGradeCriteria) || !$this->lastGradeCriteria->equals($criteria)) {
					$this->collGrades = GradePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGradeCriteria = $criteria;
		return $this->collGrades;
	}

	
	public function countGrades($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGradePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GradePeer::DEPARTMENT_ID, $this->getId());

		return GradePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGrade(Grade $l)
	{
		$this->collGrades[] = $l;
		$l->setDepartment($this);
	}

	
	public function initLevelPresets()
	{
		if ($this->collLevelPresets === null) {
			$this->collLevelPresets = array();
		}
	}

	
	public function getLevelPresets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLevelPresetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLevelPresets === null) {
			if ($this->isNew()) {
			   $this->collLevelPresets = array();
			} else {

				$criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->getId());

				LevelPresetPeer::addSelectColumns($criteria);
				$this->collLevelPresets = LevelPresetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->getId());

				LevelPresetPeer::addSelectColumns($criteria);
				if (!isset($this->lastLevelPresetCriteria) || !$this->lastLevelPresetCriteria->equals($criteria)) {
					$this->collLevelPresets = LevelPresetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLevelPresetCriteria = $criteria;
		return $this->collLevelPresets;
	}

	
	public function countLevelPresets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLevelPresetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->getId());

		return LevelPresetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLevelPreset(LevelPreset $l)
	{
		$this->collLevelPresets[] = $l;
		$l->setDepartment($this);
	}


	
	public function getLevelPresetsJoinGrade($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLevelPresetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLevelPresets === null) {
			if ($this->isNew()) {
				$this->collLevelPresets = array();
			} else {

				$criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->getId());

				$this->collLevelPresets = LevelPresetPeer::doSelectJoinGrade($criteria, $con);
			}
		} else {
									
			$criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastLevelPresetCriteria) || !$this->lastLevelPresetCriteria->equals($criteria)) {
				$this->collLevelPresets = LevelPresetPeer::doSelectJoinGrade($criteria, $con);
			}
		}
		$this->lastLevelPresetCriteria = $criteria;

		return $this->collLevelPresets;
	}

	
	public function initQuestions()
	{
		if ($this->collQuestions === null) {
			$this->collQuestions = array();
		}
	}

	
	public function getQuestions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestions === null) {
			if ($this->isNew()) {
			   $this->collQuestions = array();
			} else {

				$criteria->add(QuestionPeer::DEPARTMENT_ID, $this->getId());

				QuestionPeer::addSelectColumns($criteria);
				$this->collQuestions = QuestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionPeer::DEPARTMENT_ID, $this->getId());

				QuestionPeer::addSelectColumns($criteria);
				if (!isset($this->lastQuestionCriteria) || !$this->lastQuestionCriteria->equals($criteria)) {
					$this->collQuestions = QuestionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastQuestionCriteria = $criteria;
		return $this->collQuestions;
	}

	
	public function countQuestions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(QuestionPeer::DEPARTMENT_ID, $this->getId());

		return QuestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestion(Question $l)
	{
		$this->collQuestions[] = $l;
		$l->setDepartment($this);
	}


	
	public function getQuestionsJoinAnswerOption($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestions === null) {
			if ($this->isNew()) {
				$this->collQuestions = array();
			} else {

				$criteria->add(QuestionPeer::DEPARTMENT_ID, $this->getId());

				$this->collQuestions = QuestionPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionPeer::DEPARTMENT_ID, $this->getId());

			if (!isset($this->lastQuestionCriteria) || !$this->lastQuestionCriteria->equals($criteria)) {
				$this->collQuestions = QuestionPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		}
		$this->lastQuestionCriteria = $criteria;

		return $this->collQuestions;
	}

} 