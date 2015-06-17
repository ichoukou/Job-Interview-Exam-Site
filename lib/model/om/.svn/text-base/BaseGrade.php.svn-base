<?php


abstract class BaseGrade extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;


	
	protected $department_id;


	
	protected $created_at;

	
	protected $aDepartment;

	
	protected $collUsers;

	
	protected $lastUserCriteria = null;

	
	protected $collLevelPresets;

	
	protected $lastLevelPresetCriteria = null;

	
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

	
	public function getDescription()
	{

		return $this->description;
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
			$this->modifiedColumns[] = GradePeer::ID;
		}

	} 
	
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = GradePeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = GradePeer::DESCRIPTION;
		}

	} 
	
	public function setDepartmentId($v)
	{

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = GradePeer::DEPARTMENT_ID;
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
			$this->modifiedColumns[] = GradePeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->department_id = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Grade object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GradePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GradePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(GradePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GradePeer::DATABASE_NAME);
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


												
			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GradePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GradePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collUsers !== null) {
				foreach($this->collUsers as $referrerFK) {
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


												
			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}


			if (($retval = GradePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsers !== null) {
					foreach($this->collUsers as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GradePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescription();
				break;
			case 3:
				return $this->getDepartmentId();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GradePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getDepartmentId(),
			$keys[4] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GradePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescription($value);
				break;
			case 3:
				$this->setDepartmentId($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GradePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDepartmentId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GradePeer::DATABASE_NAME);

		if ($this->isColumnModified(GradePeer::ID)) $criteria->add(GradePeer::ID, $this->id);
		if ($this->isColumnModified(GradePeer::NAME)) $criteria->add(GradePeer::NAME, $this->name);
		if ($this->isColumnModified(GradePeer::DESCRIPTION)) $criteria->add(GradePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(GradePeer::DEPARTMENT_ID)) $criteria->add(GradePeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(GradePeer::CREATED_AT)) $criteria->add(GradePeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GradePeer::DATABASE_NAME);

		$criteria->add(GradePeer::ID, $this->id);

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

		$copyObj->setDescription($this->description);

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getUsers() as $relObj) {
				$copyObj->addUser($relObj->copy($deepCopy));
			}

			foreach($this->getLevelPresets() as $relObj) {
				$copyObj->addLevelPreset($relObj->copy($deepCopy));
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
			self::$peer = new GradePeer();
		}
		return self::$peer;
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

				$criteria->add(UserPeer::GRADE_ID, $this->getId());

				UserPeer::addSelectColumns($criteria);
				$this->collUsers = UserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UserPeer::GRADE_ID, $this->getId());

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

		$criteria->add(UserPeer::GRADE_ID, $this->getId());

		return UserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addUser(User $l)
	{
		$this->collUsers[] = $l;
		$l->setGrade($this);
	}


	
	public function getUsersJoinDepartment($criteria = null, $con = null)
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

				$criteria->add(UserPeer::GRADE_ID, $this->getId());

				$this->collUsers = UserPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(UserPeer::GRADE_ID, $this->getId());

			if (!isset($this->lastUserCriteria) || !$this->lastUserCriteria->equals($criteria)) {
				$this->collUsers = UserPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastUserCriteria = $criteria;

		return $this->collUsers;
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

				$criteria->add(LevelPresetPeer::GRADE_ID, $this->getId());

				LevelPresetPeer::addSelectColumns($criteria);
				$this->collLevelPresets = LevelPresetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LevelPresetPeer::GRADE_ID, $this->getId());

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

		$criteria->add(LevelPresetPeer::GRADE_ID, $this->getId());

		return LevelPresetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLevelPreset(LevelPreset $l)
	{
		$this->collLevelPresets[] = $l;
		$l->setGrade($this);
	}


	
	public function getLevelPresetsJoinDepartment($criteria = null, $con = null)
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

				$criteria->add(LevelPresetPeer::GRADE_ID, $this->getId());

				$this->collLevelPresets = LevelPresetPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(LevelPresetPeer::GRADE_ID, $this->getId());

			if (!isset($this->lastLevelPresetCriteria) || !$this->lastLevelPresetCriteria->equals($criteria)) {
				$this->collLevelPresets = LevelPresetPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastLevelPresetCriteria = $criteria;

		return $this->collLevelPresets;
	}

} 