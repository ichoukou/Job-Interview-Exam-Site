<?php


	
class QuestionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.QuestionMapBuilder';	

    
    private $dbMap;

	
    public function isBuilt()
    {
        return ($this->dbMap !== null);
    }

	
    public function getDatabaseMap()
    {
        return $this->dbMap;
    }

    
    public function doBuild()
    {
		$this->dbMap = Propel::getDatabaseMap('propel');
		
		$tMap = $this->dbMap->addTable('kra_question');
		$tMap->setPhpName('Question');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addColumn('ANSWER_A', 'AnswerA', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addColumn('ANSWER_B', 'AnswerB', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addColumn('ANSWER_C', 'AnswerC', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addColumn('ANSWER_D', 'AnswerD', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addForeignKey('ANSWER_OPTION_ID', 'AnswerOptionId', 'int', CreoleTypes::INTEGER, 'kra_answer_option', 'ID', false, null);

		$tMap->addForeignKey('DEPARTMENT_ID', 'DepartmentId', 'int', CreoleTypes::INTEGER, 'kra_department', 'ID', false, null);

		$tMap->addColumn('LEVEL', 'Level', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false);
				
    } 
} 