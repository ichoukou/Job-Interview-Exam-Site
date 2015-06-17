<?php


abstract class BaseUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $fullname;


	
	protected $email;


	
	protected $username;


	
	protected $password;


	
	protected $admin;


	
	protected $grade_id;


	
	protected $department_id;


	
	protected $created_at;

	
	protected $aGrade;

	
	protected $aDepartment;

	
	protected $collDepartments;

	
	protected $lastDepartmentCriteria = null;

	
	protected $collQuestionGenerators;

	
	protected $lastQuestionGeneratorCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getFullname()
	{

		return $this->fullname;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getPassword()
	{

		return $this->password;
	}

	
	public function getAdmin()
	{

		return $this->admin;
	}

	
	public function getGradeId()
	{

		return $this->grade_id;
	}

	
	public function getDepartmentId()
	{

		return $this->department_id;
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
			$this->modifiedColumns[] = UserPeer::ID;
		}

	} 
	
	public function setFullname($v)
	{

		if ($this->fullname !== $v) {
			$this->fullname = $v;
			$this->modifiedColumns[] = UserPeer::FULLNAME;
		}

	} 
	
	public function setEmail($v)
	{

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UserPeer::EMAIL;
		}

	} 
	
	public function setUsername($v)
	{

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

	} 
	
	public function setPassword($v)
	{

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

	} 
	
	public function setAdmin($v)
	{

		if ($this->admin !== $v) {
			$this->admin = $v;
			$this->modifiedColumns[] = UserPeer::ADMIN;
		}

	} 
	
	public function setGradeId($v)
	{

		if ($this->grade_id !== $v) {
			$this->grade_id = $v;
			$this->modifiedColumns[] = UserPeer::GRADE_ID;
		}

		if ($this->aGrade !== null && $this->aGrade->getId() !== $v) {
			$this->aGrade = null;
		}

	} 
	
	public function setDepartmentId($v)
	{

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = UserPeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
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
			$this->modifiedColumns[] = UserPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->fullname = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->username = $rs->getString($startcol + 3);

			$this->password = $rs->getString($startcol + 4);

			$this->admin = $rs->getBoolean($startcol + 5);

			$this->grade_id = $rs->getInt($startcol + 6);

			$this->department_id = $rs->getInt($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(UserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserPeer::DATABASE_NAME);
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


												
			if ($this->aGrade !== null) {
				if ($this->aGrade->isModified()) {
					$affectedRows += $this->aGrade->save($con);
				}
				$this->setGrade($this->aGrade);
			}

			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDepartments !== null) {
				foreach($this->collDepartments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collQuestionGenerators !== null) {
				foreach($this->collQuestionGenerators as $referrerFK) {
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


												
			if ($this->aGrade !== null) {
				if (!$this->aGrade->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrade->getValidationFailures());
				}
			}

			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDepartments !== null) {
					foreach($this->collDepartments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collQuestionGenerators !== null) {
					foreach($this->collQuestionGenerators as $referrerFK) {
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getFullname();
				break;
			case 2:
				return $this->getEmail();
				break;
			case 3:
				return $this->getUsername();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getAdmin();
				break;
			case 6:
				return $this->getGradeId();
				break;
			case 7:
				return $this->getDepartmentId();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFullname(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getUsername(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getAdmin(),
			$keys[6] => $this->getGradeId(),
			$keys[7] => $this->getDepartmentId(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFullname($value);
				break;
			case 2:
				$this->setEmail($value);
				break;
			case 3:
				$this->setUsername($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setAdmin($value);
				break;
			case 6:
				$this->setGradeId($value);
				break;
			case 7:
				$this->setDepartmentId($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFullname($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsername($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdmin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGradeId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDepartmentId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::FULLNAME)) $criteria->add(UserPeer::FULLNAME, $this->fullname);
		if ($this->isColumnModified(UserPeer::EMAIL)) $criteria->add(UserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::ADMIN)) $criteria->add(UserPeer::ADMIN, $this->admin);
		if ($this->isColumnModified(UserPeer::GRADE_ID)) $criteria->add(UserPeer::GRADE_ID, $this->grade_id);
		if ($this->isColumnModified(UserPeer::DEPARTMENT_ID)) $criteria->add(UserPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		$criteria->add(UserPeer::ID, $this->id);

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

		$copyObj->setFullname($this->fullname);

		$copyObj->setEmail($this->email);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setAdmin($this->admin);

		$copyObj->setGradeId($this->grade_id);

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDepartments() as $relObj) {
				$copyObj->addDepartment($relObj->copy($deepCopy));
			}

			foreach($this->getQuestionGenerators() as $relObj) {
				$copyObj->addQuestionGenerator($relObj->copy($deepCopy));
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
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	
	public function setGrade($v)
	{


		if ($v === null) {
			$this->setGradeId(NULL);
		} else {
			$this->setGradeId($v->getId());
		}


		$this->aGrade = $v;
	}


	
	public function getGrade($con = null)
	{
				include_once 'lib/model/om/BaseGradePeer.php';

		if ($this->aGrade === null && ($this->grade_id !== null)) {

			$this->aGrade = GradePeer::retrieveByPK($this->grade_id, $con);

			
		}
		return $this->aGrade;
	}

	
	public function setDepartment($v)
	{


		if ($v === null) {
			$this->setDepartmentId(NULL);
		} else {
			$this->setDepartmentId($v->getId());
		}


		$this->aDepartment = $v;
	}


	
	public function getDepartment($con = null)
	{
				include_once 'lib/model/om/BaseDepartmentPeer.php';

		if ($this->aDepartment === null && ($this->department_id !== null)) {

			$this->aDepartment = DepartmentPeer::retrieveByPK($this->department_id, $con);

			
		}
		return $this->aDepartment;
	}

	
	public function initDepartments()
	{
		if ($this->collDepartments === null) {
			$this->collDepartments = array();
		}
	}

	
	public function getDepartments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDepartmentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDepartments === null) {
			if ($this->isNew()) {
			   $this->collDepartments = array();
			} else {

				$criteria->add(DepartmentPeer::USER_ID, $this->getId());

				DepartmentPeer::addSelectColumns($criteria);
				$this->collDepartments = DepartmentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DepartmentPeer::USER_ID, $this->getId());

				DepartmentPeer::addSelectColumns($criteria);
				if (!isset($this->lastDepartmentCriteria) || !$this->lastDepartmentCriteria->equals($criteria)) {
					$this->collDepartments = DepartmentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDepartmentCriteria = $criteria;
		return $this->collDepartments;
	}

	
	public function countDepartments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDepartmentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DepartmentPeer::USER_ID, $this->getId());

		return DepartmentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDepartment(Department $l)
	{
		$this->collDepartments[] = $l;
		$l->setUser($this);
	}

	
	public function initQuestionGenerators()
	{
		if ($this->collQuestionGenerators === null) {
			$this->collQuestionGenerators = array();
		}
	}

	
	public function getQuestionGenerators($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionGeneratorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestionGenerators === null) {
			if ($this->isNew()) {
			   $this->collQuestionGenerators = array();
			} else {

				$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

				QuestionGeneratorPeer::addSelectColumns($criteria);
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

				QuestionGeneratorPeer::addSelectColumns($criteria);
				if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
					$this->collQuestionGenerators = QuestionGeneratorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;
		return $this->collQuestionGenerators;
	}

	
	public function countQuestionGenerators($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionGeneratorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

		return QuestionGeneratorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestionGenerator(QuestionGenerator $l)
	{
		$this->collQuestionGenerators[] = $l;
		$l->setUser($this);
	}


	
	public function getQuestionGeneratorsJoinQuestion($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionGeneratorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestionGenerators === null) {
			if ($this->isNew()) {
				$this->collQuestionGenerators = array();
			} else {

				$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinQuestion($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinQuestion($criteria, $con);
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;

		return $this->collQuestionGenerators;
	}


	
	public function getQuestionGeneratorsJoinAnswerOption($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseQuestionGeneratorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collQuestionGenerators === null) {
			if ($this->isNew()) {
				$this->collQuestionGenerators = array();
			} else {

				$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::USER_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;

		return $this->collQuestionGenerators;
	}

} 