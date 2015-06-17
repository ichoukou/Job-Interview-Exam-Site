<?php


abstract class BaseLevelPreset extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $department_id;


	
	protected $grade_id;


	
	protected $level;


	
	protected $question_no;


	
	protected $created_at;

	
	protected $aDepartment;

	
	protected $aGrade;

	
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

	
	public function getDepartmentId()
	{

		return $this->department_id;
	}

	
	public function getGradeId()
	{

		return $this->grade_id;
	}

	
	public function getLevel()
	{

		return $this->level;
	}

	
	public function getQuestionNo()
	{

		return $this->question_no;
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
			$this->modifiedColumns[] = LevelPresetPeer::ID;
		}

	} 
	
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = LevelPresetPeer::NAME;
		}

	} 
	
	public function setDepartmentId($v)
	{

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = LevelPresetPeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
		}

	} 
	
	public function setGradeId($v)
	{

		if ($this->grade_id !== $v) {
			$this->grade_id = $v;
			$this->modifiedColumns[] = LevelPresetPeer::GRADE_ID;
		}

		if ($this->aGrade !== null && $this->aGrade->getId() !== $v) {
			$this->aGrade = null;
		}

	} 
	
	public function setLevel($v)
	{

		if ($this->level !== $v) {
			$this->level = $v;
			$this->modifiedColumns[] = LevelPresetPeer::LEVEL;
		}

	} 
	
	public function setQuestionNo($v)
	{

		if ($this->question_no !== $v) {
			$this->question_no = $v;
			$this->modifiedColumns[] = LevelPresetPeer::QUESTION_NO;
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
			$this->modifiedColumns[] = LevelPresetPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->department_id = $rs->getInt($startcol + 2);

			$this->grade_id = $rs->getInt($startcol + 3);

			$this->level = $rs->getInt($startcol + 4);

			$this->question_no = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating LevelPreset object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LevelPresetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LevelPresetPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LevelPresetPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LevelPresetPeer::DATABASE_NAME);
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

			if ($this->aGrade !== null) {
				if ($this->aGrade->isModified()) {
					$affectedRows += $this->aGrade->save($con);
				}
				$this->setGrade($this->aGrade);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LevelPresetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LevelPresetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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

			if ($this->aGrade !== null) {
				if (!$this->aGrade->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGrade->getValidationFailures());
				}
			}


			if (($retval = LevelPresetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LevelPresetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDepartmentId();
				break;
			case 3:
				return $this->getGradeId();
				break;
			case 4:
				return $this->getLevel();
				break;
			case 5:
				return $this->getQuestionNo();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LevelPresetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDepartmentId(),
			$keys[3] => $this->getGradeId(),
			$keys[4] => $this->getLevel(),
			$keys[5] => $this->getQuestionNo(),
			$keys[6] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LevelPresetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDepartmentId($value);
				break;
			case 3:
				$this->setGradeId($value);
				break;
			case 4:
				$this->setLevel($value);
				break;
			case 5:
				$this->setQuestionNo($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LevelPresetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDepartmentId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGradeId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLevel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQuestionNo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LevelPresetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LevelPresetPeer::ID)) $criteria->add(LevelPresetPeer::ID, $this->id);
		if ($this->isColumnModified(LevelPresetPeer::NAME)) $criteria->add(LevelPresetPeer::NAME, $this->name);
		if ($this->isColumnModified(LevelPresetPeer::DEPARTMENT_ID)) $criteria->add(LevelPresetPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(LevelPresetPeer::GRADE_ID)) $criteria->add(LevelPresetPeer::GRADE_ID, $this->grade_id);
		if ($this->isColumnModified(LevelPresetPeer::LEVEL)) $criteria->add(LevelPresetPeer::LEVEL, $this->level);
		if ($this->isColumnModified(LevelPresetPeer::QUESTION_NO)) $criteria->add(LevelPresetPeer::QUESTION_NO, $this->question_no);
		if ($this->isColumnModified(LevelPresetPeer::CREATED_AT)) $criteria->add(LevelPresetPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LevelPresetPeer::DATABASE_NAME);

		$criteria->add(LevelPresetPeer::ID, $this->id);

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

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setGradeId($this->grade_id);

		$copyObj->setLevel($this->level);

		$copyObj->setQuestionNo($this->question_no);

		$copyObj->setCreatedAt($this->created_at);


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
			self::$peer = new LevelPresetPeer();
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

} 