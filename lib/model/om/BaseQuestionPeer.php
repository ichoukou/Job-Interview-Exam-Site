<?php


abstract class BaseQuestionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'kra_question';

	
	const CLASS_DEFAULT = 'lib.model.Question';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'kra_question.ID';

	
	const DESCRIPTION = 'kra_question.DESCRIPTION';

	
	const ANSWER_A = 'kra_question.ANSWER_A';

	
	const ANSWER_B = 'kra_question.ANSWER_B';

	
	const ANSWER_C = 'kra_question.ANSWER_C';

	
	const ANSWER_D = 'kra_question.ANSWER_D';

	
	const ANSWER_OPTION_ID = 'kra_question.ANSWER_OPTION_ID';

	
	const DEPARTMENT_ID = 'kra_question.DEPARTMENT_ID';

	
	const LEVEL = 'kra_question.LEVEL';

	
	const CREATED_AT = 'kra_question.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Description', 'AnswerA', 'AnswerB', 'AnswerC', 'AnswerD', 'AnswerOptionId', 'DepartmentId', 'Level', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (QuestionPeer::ID, QuestionPeer::DESCRIPTION, QuestionPeer::ANSWER_A, QuestionPeer::ANSWER_B, QuestionPeer::ANSWER_C, QuestionPeer::ANSWER_D, QuestionPeer::ANSWER_OPTION_ID, QuestionPeer::DEPARTMENT_ID, QuestionPeer::LEVEL, QuestionPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'description', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_option_id', 'department_id', 'level', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Description' => 1, 'AnswerA' => 2, 'AnswerB' => 3, 'AnswerC' => 4, 'AnswerD' => 5, 'AnswerOptionId' => 6, 'DepartmentId' => 7, 'Level' => 8, 'CreatedAt' => 9, ),
		BasePeer::TYPE_COLNAME => array (QuestionPeer::ID => 0, QuestionPeer::DESCRIPTION => 1, QuestionPeer::ANSWER_A => 2, QuestionPeer::ANSWER_B => 3, QuestionPeer::ANSWER_C => 4, QuestionPeer::ANSWER_D => 5, QuestionPeer::ANSWER_OPTION_ID => 6, QuestionPeer::DEPARTMENT_ID => 7, QuestionPeer::LEVEL => 8, QuestionPeer::CREATED_AT => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'description' => 1, 'answer_a' => 2, 'answer_b' => 3, 'answer_c' => 4, 'answer_d' => 5, 'answer_option_id' => 6, 'department_id' => 7, 'level' => 8, 'created_at' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/QuestionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.QuestionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = QuestionPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(QuestionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(QuestionPeer::ID);

		$criteria->addSelectColumn(QuestionPeer::DESCRIPTION);

		$criteria->addSelectColumn(QuestionPeer::ANSWER_A);

		$criteria->addSelectColumn(QuestionPeer::ANSWER_B);

		$criteria->addSelectColumn(QuestionPeer::ANSWER_C);

		$criteria->addSelectColumn(QuestionPeer::ANSWER_D);

		$criteria->addSelectColumn(QuestionPeer::ANSWER_OPTION_ID);

		$criteria->addSelectColumn(QuestionPeer::DEPARTMENT_ID);

		$criteria->addSelectColumn(QuestionPeer::LEVEL);

		$criteria->addSelectColumn(QuestionPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(kra_question.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT kra_question.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = QuestionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return QuestionPeer::populateObjects(QuestionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			QuestionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = QuestionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinAnswerOption(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinDepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAnswerOption(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionPeer::addSelectColumns($c);
		$startcol = (QuestionPeer::NUM_COLUMNS - QuestionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AnswerOptionPeer::addSelectColumns($c);

		$c->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = QuestionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = AnswerOptionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getAnswerOption(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addQuestion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initQuestions();
				$obj2->addQuestion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinDepartment(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionPeer::addSelectColumns($c);
		$startcol = (QuestionPeer::NUM_COLUMNS - QuestionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		DepartmentPeer::addSelectColumns($c);

		$c->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = QuestionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = DepartmentPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addQuestion($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initQuestions();
				$obj2->addQuestion($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$criteria->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionPeer::addSelectColumns($c);
		$startcol2 = (QuestionPeer::NUM_COLUMNS - QuestionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AnswerOptionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AnswerOptionPeer::NUM_COLUMNS;

		DepartmentPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$c->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = AnswerOptionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAnswerOption(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestion($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestions();
				$obj2->addQuestion($obj1);
			}

				
					
			$omClass = DepartmentPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getDepartment(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addQuestion($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initQuestions();
				$obj3->addQuestion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptAnswerOption(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptDepartment(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptAnswerOption(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionPeer::addSelectColumns($c);
		$startcol2 = (QuestionPeer::NUM_COLUMNS - QuestionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		DepartmentPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + DepartmentPeer::NUM_COLUMNS;

		$c->addJoin(QuestionPeer::DEPARTMENT_ID, DepartmentPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = DepartmentPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getDepartment(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestion($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestions();
				$obj2->addQuestion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptDepartment(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionPeer::addSelectColumns($c);
		$startcol2 = (QuestionPeer::NUM_COLUMNS - QuestionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		AnswerOptionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + AnswerOptionPeer::NUM_COLUMNS;

		$c->addJoin(QuestionPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = AnswerOptionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getAnswerOption(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestion($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestions();
				$obj2->addQuestion($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return QuestionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(QuestionPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(QuestionPeer::ID);
			$selectCriteria->add(QuestionPeer::ID, $criteria->remove(QuestionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(QuestionPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(QuestionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Question) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(QuestionPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Question $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(QuestionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(QuestionPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(QuestionPeer::DATABASE_NAME, QuestionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = QuestionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(QuestionPeer::DATABASE_NAME);

		$criteria->add(QuestionPeer::ID, $pk);


		$v = QuestionPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(QuestionPeer::ID, $pks, Criteria::IN);
			$objs = QuestionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseQuestionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/QuestionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.QuestionMapBuilder');
}
