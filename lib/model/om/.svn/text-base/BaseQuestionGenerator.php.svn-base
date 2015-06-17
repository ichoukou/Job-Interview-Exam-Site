<?php


abstract class BaseQuestionGenerator extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $user_id;


	
	protected $question_id;


	
	protected $answer = 0;


	
	protected $answer_option_id;


	
	protected $created_at;


	
	protected $answer_at;

	
	protected $aUser;

	
	protected $aQuestion;

	
	protected $aAnswerOption;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getQuestionId()
	{

		return $this->question_id;
	}

	
	public function getAnswer()
	{

		return $this->answer;
	}

	
	public function getAnswerOptionId()
	{

		return $this->answer_option_id;
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

	
	public function getAnswerAt($format = 'Y-m-d H:i:s')
	{

		if ($this->answer_at === null || $this->answer_at === '') {
			return null;
		} elseif (!is_int($this->answer_at)) {
						$ts = strtotime($this->answer_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [answer_at] as date/time value: " . var_export($this->answer_at, true));
			}
		} else {
			$ts = $this->answer_at;
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
			$this->modifiedColumns[] = QuestionGeneratorPeer::ID;
		}

	} 
	
	public function setUserId($v)
	{

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = QuestionGeneratorPeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

	} 
	
	public function setQuestionId($v)
	{

		if ($this->question_id !== $v) {
			$this->question_id = $v;
			$this->modifiedColumns[] = QuestionGeneratorPeer::QUESTION_ID;
		}

		if ($this->aQuestion !== null && $this->aQuestion->getId() !== $v) {
			$this->aQuestion = null;
		}

	} 
	
	public function setAnswer($v)
	{

		if ($this->answer !== $v || $v === 0) {
			$this->answer = $v;
			$this->modifiedColumns[] = QuestionGeneratorPeer::ANSWER;
		}

	} 
	
	public function setAnswerOptionId($v)
	{

		if ($this->answer_option_id !== $v) {
			$this->answer_option_id = $v;
			$this->modifiedColumns[] = QuestionGeneratorPeer::ANSWER_OPTION_ID;
		}

		if ($this->aAnswerOption !== null && $this->aAnswerOption->getId() !== $v) {
			$this->aAnswerOption = null;
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
			$this->modifiedColumns[] = QuestionGeneratorPeer::CREATED_AT;
		}

	} 
	
	public function setAnswerAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [answer_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->answer_at !== $ts) {
			$this->answer_at = $ts;
			$this->modifiedColumns[] = QuestionGeneratorPeer::ANSWER_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->user_id = $rs->getInt($startcol + 1);

			$this->question_id = $rs->getInt($startcol + 2);

			$this->answer = $rs->getInt($startcol + 3);

			$this->answer_option_id = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->answer_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating QuestionGenerator object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionGeneratorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			QuestionGeneratorPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(QuestionGeneratorPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(QuestionGeneratorPeer::DATABASE_NAME);
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

			if ($this->aQuestion !== null) {
				if ($this->aQuestion->isModified()) {
					$affectedRows += $this->aQuestion->save($con);
				}
				$this->setQuestion($this->aQuestion);
			}

			if ($this->aAnswerOption !== null) {
				if ($this->aAnswerOption->isModified()) {
					$affectedRows += $this->aAnswerOption->save($con);
				}
				$this->setAnswerOption($this->aAnswerOption);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = QuestionGeneratorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += QuestionGeneratorPeer::doUpdate($this, $con);
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


												
			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aQuestion !== null) {
				if (!$this->aQuestion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aQuestion->getValidationFailures());
				}
			}

			if ($this->aAnswerOption !== null) {
				if (!$this->aAnswerOption->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAnswerOption->getValidationFailures());
				}
			}


			if (($retval = QuestionGeneratorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = QuestionGeneratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getQuestionId();
				break;
			case 3:
				return $this->getAnswer();
				break;
			case 4:
				return $this->getAnswerOptionId();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getAnswerAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionGeneratorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getQuestionId(),
			$keys[3] => $this->getAnswer(),
			$keys[4] => $this->getAnswerOptionId(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getAnswerAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = QuestionGeneratorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setQuestionId($value);
				break;
			case 3:
				$this->setAnswer($value);
				break;
			case 4:
				$this->setAnswerOptionId($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setAnswerAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = QuestionGeneratorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setQuestionId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnswer($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnswerOptionId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnswerAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(QuestionGeneratorPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuestionGeneratorPeer::ID)) $criteria->add(QuestionGeneratorPeer::ID, $this->id);
		if ($this->isColumnModified(QuestionGeneratorPeer::USER_ID)) $criteria->add(QuestionGeneratorPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(QuestionGeneratorPeer::QUESTION_ID)) $criteria->add(QuestionGeneratorPeer::QUESTION_ID, $this->question_id);
		if ($this->isColumnModified(QuestionGeneratorPeer::ANSWER)) $criteria->add(QuestionGeneratorPeer::ANSWER, $this->answer);
		if ($this->isColumnModified(QuestionGeneratorPeer::ANSWER_OPTION_ID)) $criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->answer_option_id);
		if ($this->isColumnModified(QuestionGeneratorPeer::CREATED_AT)) $criteria->add(QuestionGeneratorPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(QuestionGeneratorPeer::ANSWER_AT)) $criteria->add(QuestionGeneratorPeer::ANSWER_AT, $this->answer_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(QuestionGeneratorPeer::DATABASE_NAME);

		$criteria->add(QuestionGeneratorPeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setQuestionId($this->question_id);

		$copyObj->setAnswer($this->answer);

		$copyObj->setAnswerOptionId($this->answer_option_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setAnswerAt($this->answer_at);


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
			self::$peer = new QuestionGeneratorPeer();
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

	
	public function setQuestion($v)
	{


		if ($v === null) {
			$this->setQuestionId(NULL);
		} else {
			$this->setQuestionId($v->getId());
		}


		$this->aQuestion = $v;
	}


	
	public function getQuestion($con = null)
	{
				include_once 'lib/model/om/BaseQuestionPeer.php';

		if ($this->aQuestion === null && ($this->question_id !== null)) {

			$this->aQuestion = QuestionPeer::retrieveByPK($this->question_id, $con);

			
		}
		return $this->aQuestion;
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

} 