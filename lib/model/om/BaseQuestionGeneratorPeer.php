<?php


abstract class BaseQuestionGeneratorPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'kra_question_generator';

	
	const CLASS_DEFAULT = 'lib.model.QuestionGenerator';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'kra_question_generator.ID';

	
	const USER_ID = 'kra_question_generator.USER_ID';

	
	const QUESTION_ID = 'kra_question_generator.QUESTION_ID';

	
	const ANSWER = 'kra_question_generator.ANSWER';

	
	const ANSWER_OPTION_ID = 'kra_question_generator.ANSWER_OPTION_ID';

	
	const CREATED_AT = 'kra_question_generator.CREATED_AT';

	
	const ANSWER_AT = 'kra_question_generator.ANSWER_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'UserId', 'QuestionId', 'Answer', 'AnswerOptionId', 'CreatedAt', 'AnswerAt', ),
		BasePeer::TYPE_COLNAME => array (QuestionGeneratorPeer::ID, QuestionGeneratorPeer::USER_ID, QuestionGeneratorPeer::QUESTION_ID, QuestionGeneratorPeer::ANSWER, QuestionGeneratorPeer::ANSWER_OPTION_ID, QuestionGeneratorPeer::CREATED_AT, QuestionGeneratorPeer::ANSWER_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'user_id', 'question_id', 'answer', 'answer_option_id', 'created_at', 'answer_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'UserId' => 1, 'QuestionId' => 2, 'Answer' => 3, 'AnswerOptionId' => 4, 'CreatedAt' => 5, 'AnswerAt' => 6, ),
		BasePeer::TYPE_COLNAME => array (QuestionGeneratorPeer::ID => 0, QuestionGeneratorPeer::USER_ID => 1, QuestionGeneratorPeer::QUESTION_ID => 2, QuestionGeneratorPeer::ANSWER => 3, QuestionGeneratorPeer::ANSWER_OPTION_ID => 4, QuestionGeneratorPeer::CREATED_AT => 5, QuestionGeneratorPeer::ANSWER_AT => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'user_id' => 1, 'question_id' => 2, 'answer' => 3, 'answer_option_id' => 4, 'created_at' => 5, 'answer_at' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/QuestionGeneratorMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.QuestionGeneratorMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = QuestionGeneratorPeer::getTableMap();
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
		return str_replace(QuestionGeneratorPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(QuestionGeneratorPeer::ID);

		$criteria->addSelectColumn(QuestionGeneratorPeer::USER_ID);

		$criteria->addSelectColumn(QuestionGeneratorPeer::QUESTION_ID);

		$criteria->addSelectColumn(QuestionGeneratorPeer::ANSWER);

		$criteria->addSelectColumn(QuestionGeneratorPeer::ANSWER_OPTION_ID);

		$criteria->addSelectColumn(QuestionGeneratorPeer::CREATED_AT);

		$criteria->addSelectColumn(QuestionGeneratorPeer::ANSWER_AT);

	}

	const COUNT = 'COUNT(kra_question_generator.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT kra_question_generator.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
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
		$objects = QuestionGeneratorPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return QuestionGeneratorPeer::populateObjects(QuestionGeneratorPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			QuestionGeneratorPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = QuestionGeneratorPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinQuestion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAnswerOption(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UserPeer::addSelectColumns($c);

		$c->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addQuestionGenerator($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinQuestion(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		QuestionPeer::addSelectColumns($c);

		$c->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = QuestionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getQuestion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addQuestionGenerator($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAnswerOption(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		AnswerOptionPeer::addSelectColumns($c);

		$c->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

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
										$temp_obj2->addQuestionGenerator($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$criteria->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
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

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol2 = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		QuestionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + QuestionPeer::NUM_COLUMNS;

		AnswerOptionPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + AnswerOptionPeer::NUM_COLUMNS;

		$c->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$c->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$c->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			
			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

				
					
			$omClass = UserPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestionGenerator($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1);
			}

				
					
			$omClass = QuestionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getQuestion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addQuestionGenerator($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj3->initQuestionGenerators();
				$obj3->addQuestionGenerator($obj1);
			}

				
					
			$omClass = AnswerOptionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getAnswerOption(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addQuestionGenerator($obj1); 					break;
				}
			}
			
			if ($newObject) {
				$obj4->initQuestionGenerators();
				$obj4->addQuestionGenerator($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$criteria->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptQuestion(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptAnswerOption(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;
		
				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(QuestionGeneratorPeer::COUNT);
		}
		
				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$criteria->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$rs = QuestionGeneratorPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol2 = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		QuestionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + QuestionPeer::NUM_COLUMNS;

		AnswerOptionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AnswerOptionPeer::NUM_COLUMNS;

		$c->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);

		$c->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = QuestionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getQuestion(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1);
			}

			$omClass = AnswerOptionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAnswerOption(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initQuestionGenerators();
				$obj3->addQuestionGenerator($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptQuestion(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol2 = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		AnswerOptionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + AnswerOptionPeer::NUM_COLUMNS;

		$c->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$c->addJoin(QuestionGeneratorPeer::ANSWER_OPTION_ID, AnswerOptionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = UserPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1);
			}

			$omClass = AnswerOptionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getAnswerOption(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initQuestionGenerators();
				$obj3->addQuestionGenerator($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptAnswerOption(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		QuestionGeneratorPeer::addSelectColumns($c);
		$startcol2 = (QuestionGeneratorPeer::NUM_COLUMNS - QuestionGeneratorPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UserPeer::NUM_COLUMNS;

		QuestionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + QuestionPeer::NUM_COLUMNS;

		$c->addJoin(QuestionGeneratorPeer::USER_ID, UserPeer::ID);

		$c->addJoin(QuestionGeneratorPeer::QUESTION_ID, QuestionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();
		
		while($rs->next()) {

			$omClass = QuestionGeneratorPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);		

			$omClass = UserPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj2->initQuestionGenerators();
				$obj2->addQuestionGenerator($obj1);
			}

			$omClass = QuestionPeer::getOMClass();

	
			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);
			
			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getQuestion(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addQuestionGenerator($obj1);
					break;
				}
			}
			
			if ($newObject) {
				$obj3->initQuestionGenerators();
				$obj3->addQuestionGenerator($obj1);
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
		return QuestionGeneratorPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(QuestionGeneratorPeer::ID); 

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
			$comparison = $criteria->getComparison(QuestionGeneratorPeer::ID);
			$selectCriteria->add(QuestionGeneratorPeer::ID, $criteria->remove(QuestionGeneratorPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(QuestionGeneratorPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(QuestionGeneratorPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof QuestionGenerator) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(QuestionGeneratorPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(QuestionGenerator $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(QuestionGeneratorPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(QuestionGeneratorPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(QuestionGeneratorPeer::DATABASE_NAME, QuestionGeneratorPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = QuestionGeneratorPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(QuestionGeneratorPeer::DATABASE_NAME);

		$criteria->add(QuestionGeneratorPeer::ID, $pk);


		$v = QuestionGeneratorPeer::doSelect($criteria, $con);

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
			$criteria->add(QuestionGeneratorPeer::ID, $pks, Criteria::IN);
			$objs = QuestionGeneratorPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseQuestionGeneratorPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/QuestionGeneratorMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.QuestionGeneratorMapBuilder');
}
