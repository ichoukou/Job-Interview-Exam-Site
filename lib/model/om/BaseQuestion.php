<?php


abstract class BaseQuestion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $description;


	
	protected $answer_a;


	
	protected $answer_b;


	
	protected $answer_c;


	
	protected $answer_d;


	
	protected $answer_option_id;


	
	protected $department_id;


	
	protected $level;


	
	protected $created_at;

	
	protected $aAnswerOption;

	
	protected $aDepartment;

	
	protected $collQuestionGenerators;

	
	protected $lastQuestionGeneratorCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getAnswerA()
	{

		return $this->answer_a;
	}

	
	public function getAnswerB()
	{

		return $this->answer_b;
	}

	
	public function getAnswerC()
	{

		return $this->answer_c;
	}

	
	public function getAnswerD()
	{

		return $this->answer_d;
	}

	
	public function getAnswerOptionId()
	{

		return $this->answer_option_id;
	}

	
	public function getDepartmentId()
	{

		return $this->department_id;
	}

	
	public function getLevel()
	{

		return $this->level;
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
			$this->modifiedColumns[] = QuestionPeer::ID;
		}

	} 
	
	public function setDescription($v)
	{

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = QuestionPeer::DESCRIPTION;
		}

	} 
	
	public function setAnswerA($v)
	{

		if ($this->answer_a !== $v) {
			$this->answer_a = $v;
			$this->modifiedColumns[] = QuestionPeer::ANSWER_A;
		}

	} 
	
	public function setAnswerB($v)
	{

		if ($this->answer_b !== $v) {
			$this->answer_b = $v;
			$this->modifiedColumns[] = QuestionPeer::ANSWER_B;
		}

	} 
	
	public function setAnswerC($v)
	{

		if ($this->answer_c !== $v) {
			$this->answer_c = $v;
			$this->modifiedColumns[] = QuestionPeer::ANSWER_C;
		}

	} 
	
	public function setAnswerD($v)
	{

		if ($this->answer_d !== $v) {
			$this->answer_d = $v;
			$this->modifiedColumns[] = QuestionPeer::ANSWER_D;
		}

	} 
	
	public function setAnswerOptionId($v)
	{

		if ($this->answer_option_id !== $v) {
			$this->answer_option_id = $v;
			$this->modifiedColumns[] = QuestionPeer::ANSWER_OPTION_ID;
		}

		if ($this->aAnswerOption !== null && $this->aAnswerOption->getId() !== $v) {
			$this->aAnswerOption = null;
		}

	} 
	
	public function setDepartmentId($v)
	{

		if ($this->department_id !== $v) {
			$this->department_id = $v;
			$this->modifiedColumns[] = QuestionPeer::DEPARTMENT_ID;
		}

		if ($this->aDepartment !== null && $this->aDepartment->getId() !== $v) {
			$this->aDepartment = null;
		}

	} 
	
	public function setLevel($v)
	{

		if ($this->level !== $v) {
			$this->level = $v;
			$this->modifiedColumns[] = QuestionPeer::LEVEL;
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
			$this->modifiedColumns[] = QuestionPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->description = $rs->getString($startcol + 1);

			$this->answer_a = $rs->getString($startcol + 2);

			$this->answer_b = $rs->getString($startcol + 3);

			$this->answer_c = $rs->getString($startcol + 4);

			$this->answer_d = $rs->getString($startcol + 5);

			$this->answer_option_id = $rs->getInt($startcol + 6);

			$this->department_id = $rs->getInt($startcol + 7);

			$this->level = $rs->getInt($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Question object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			QuestionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(QuestionPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionPeer::DATABASE_NAME);
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


												
			if ($this->aAnswerOption !== null) {
				if ($this->aAnswerOption->isModified()) {
					$affectedRows += $this->aAnswerOption->save($con);
				}
				$this->setAnswerOption($this->aAnswerOption);
			}

			if ($this->aDepartment !== null) {
				if ($this->aDepartment->isModified()) {
					$affectedRows += $this->aDepartment->save($con);
				}
				$this->setDepartment($this->aDepartment);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = QuestionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += QuestionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aAnswerOption !== null) {
				if (!$this->aAnswerOption->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnswerOption->getValidationFailures());
				}
			}

			if ($this->aDepartment !== null) {
				if (!$this->aDepartment->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDepartment->getValidationFailures());
				}
			}


			if (($retval = QuestionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = QuestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDescription();
				break;
			case 2:
				return $this->getAnswerA();
				break;
			case 3:
				return $this->getAnswerB();
				break;
			case 4:
				return $this->getAnswerC();
				break;
			case 5:
				return $this->getAnswerD();
				break;
			case 6:
				return $this->getAnswerOptionId();
				break;
			case 7:
				return $this->getDepartmentId();
				break;
			case 8:
				return $this->getLevel();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescription(),
			$keys[2] => $this->getAnswerA(),
			$keys[3] => $this->getAnswerB(),
			$keys[4] => $this->getAnswerC(),
			$keys[5] => $this->getAnswerD(),
			$keys[6] => $this->getAnswerOptionId(),
			$keys[7] => $this->getDepartmentId(),
			$keys[8] => $this->getLevel(),
			$keys[9] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = QuestionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDescription($value);
				break;
			case 2:
				$this->setAnswerA($value);
				break;
			case 3:
				$this->setAnswerB($value);
				break;
			case 4:
				$this->setAnswerC($value);
				break;
			case 5:
				$this->setAnswerD($value);
				break;
			case 6:
				$this->setAnswerOptionId($value);
				break;
			case 7:
				$this->setDepartmentId($value);
				break;
			case 8:
				$this->setLevel($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescription($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnswerA($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnswerB($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnswerC($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnswerD($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnswerOptionId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDepartmentId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLevel($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(QuestionPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuestionPeer::ID)) $criteria->add(QuestionPeer::ID, $this->id);
		if ($this->isColumnModified(QuestionPeer::DESCRIPTION)) $criteria->add(QuestionPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(QuestionPeer::ANSWER_A)) $criteria->add(QuestionPeer::ANSWER_A, $this->answer_a);
		if ($this->isColumnModified(QuestionPeer::ANSWER_B)) $criteria->add(QuestionPeer::ANSWER_B, $this->answer_b);
		if ($this->isColumnModified(QuestionPeer::ANSWER_C)) $criteria->add(QuestionPeer::ANSWER_C, $this->answer_c);
		if ($this->isColumnModified(QuestionPeer::ANSWER_D)) $criteria->add(QuestionPeer::ANSWER_D, $this->answer_d);
		if ($this->isColumnModified(QuestionPeer::ANSWER_OPTION_ID)) $criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->answer_option_id);
		if ($this->isColumnModified(QuestionPeer::DEPARTMENT_ID)) $criteria->add(QuestionPeer::DEPARTMENT_ID, $this->department_id);
		if ($this->isColumnModified(QuestionPeer::LEVEL)) $criteria->add(QuestionPeer::LEVEL, $this->level);
		if ($this->isColumnModified(QuestionPeer::CREATED_AT)) $criteria->add(QuestionPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(QuestionPeer::DATABASE_NAME);

		$criteria->add(QuestionPeer::ID, $this->id);

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

		$copyObj->setDescription($this->description);

		$copyObj->setAnswerA($this->answer_a);

		$copyObj->setAnswerB($this->answer_b);

		$copyObj->setAnswerC($this->answer_c);

		$copyObj->setAnswerD($this->answer_d);

		$copyObj->setAnswerOptionId($this->answer_option_id);

		$copyObj->setDepartmentId($this->department_id);

		$copyObj->setLevel($this->level);

		$copyObj->setCreatedAt($this->created_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new QuestionPeer();
		}
		return self::$peer;
	}

	
	public function setAnswerOption($v)
	{


		if ($v === null) {
			$this->setAnswerOptionId(NULL);
		} else {
			$this->setAnswerOptionId($v->getId());
		}


		$this->aAnswerOption = $v;
	}


	
	public function getAnswerOption($con = null)
	{
				include_once 'lib/model/om/BaseAnswerOptionPeer.php';

		if ($this->aAnswerOption === null && ($this->answer_option_id !== null)) {

			$this->aAnswerOption = AnswerOptionPeer::retrieveByPK($this->answer_option_id, $con);

			
		}
		return $this->aAnswerOption;
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

				$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

				QuestionGeneratorPeer::addSelectColumns($criteria);
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

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

		$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

		return QuestionGeneratorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestionGenerator(QuestionGenerator $l)
	{
		$this->collQuestionGenerators[] = $l;
		$l->setQuestion($this);
	}


	
	public function getQuestionGeneratorsJoinUser($criteria = null, $con = null)
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

				$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinUser($criteria, $con);
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

				$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinAnswerOption($criteria, $con);
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;

		return $this->collQuestionGenerators;
	}

} 