<?php


abstract class BaseAnswerOption extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $option_name;

	
	protected $collQuestions;

	
	protected $lastQuestionCriteria = null;

	
	protected $collQuestionGenerators;

	
	protected $lastQuestionGeneratorCriteria = null;

	
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

	
	public function getOptionName()
	{

		return $this->option_name;
	}

	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AnswerOptionPeer::ID;
		}

	} 
	
	public function setName($v)
	{

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AnswerOptionPeer::NAME;
		}

	} 
	
	public function setOptionName($v)
	{

		if ($this->option_name !== $v) {
			$this->option_name = $v;
			$this->modifiedColumns[] = AnswerOptionPeer::OPTION_NAME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->option_name = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AnswerOption object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AnswerOptionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AnswerOptionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AnswerOptionPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AnswerOptionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AnswerOptionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collQuestions !== null) {
				foreach($this->collQuestions as $referrerFK) {
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


			if (($retval = AnswerOptionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collQuestions !== null) {
					foreach($this->collQuestions as $referrerFK) {
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
		$pos = AnswerOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOptionName();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AnswerOptionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getOptionName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AnswerOptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOptionName($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AnswerOptionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOptionName($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AnswerOptionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AnswerOptionPeer::ID)) $criteria->add(AnswerOptionPeer::ID, $this->id);
		if ($this->isColumnModified(AnswerOptionPeer::NAME)) $criteria->add(AnswerOptionPeer::NAME, $this->name);
		if ($this->isColumnModified(AnswerOptionPeer::OPTION_NAME)) $criteria->add(AnswerOptionPeer::OPTION_NAME, $this->option_name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AnswerOptionPeer::DATABASE_NAME);

		$criteria->add(AnswerOptionPeer::ID, $this->id);

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

		$copyObj->setOptionName($this->option_name);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getQuestions() as $relObj) {
				$copyObj->addQuestion($relObj->copy($deepCopy));
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
			self::$peer = new AnswerOptionPeer();
		}
		return self::$peer;
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

				$criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->getId());

				QuestionPeer::addSelectColumns($criteria);
				$this->collQuestions = QuestionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->getId());

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

		$criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->getId());

		return QuestionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestion(Question $l)
	{
		$this->collQuestions[] = $l;
		$l->setAnswerOption($this);
	}


	
	public function getQuestionsJoinDepartment($criteria = null, $con = null)
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

				$criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->getId());

				$this->collQuestions = QuestionPeer::doSelectJoinDepartment($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionPeer::ANSWER_OPTION_ID, $this->getId());

			if (!isset($this->lastQuestionCriteria) || !$this->lastQuestionCriteria->equals($criteria)) {
				$this->collQuestions = QuestionPeer::doSelectJoinDepartment($criteria, $con);
			}
		}
		$this->lastQuestionCriteria = $criteria;

		return $this->collQuestions;
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

				$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

				QuestionGeneratorPeer::addSelectColumns($criteria);
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

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

		$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

		return QuestionGeneratorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addQuestionGenerator(QuestionGenerator $l)
	{
		$this->collQuestionGenerators[] = $l;
		$l->setAnswerOption($this);
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

				$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinUser($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinUser($criteria, $con);
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;

		return $this->collQuestionGenerators;
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

				$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinQuestion($criteria, $con);
			}
		} else {
									
			$criteria->add(QuestionGeneratorPeer::ANSWER_OPTION_ID, $this->getId());

			if (!isset($this->lastQuestionGeneratorCriteria) || !$this->lastQuestionGeneratorCriteria->equals($criteria)) {
				$this->collQuestionGenerators = QuestionGeneratorPeer::doSelectJoinQuestion($criteria, $con);
			}
		}
		$this->lastQuestionGeneratorCriteria = $criteria;

		return $this->collQuestionGenerators;
	}

} 