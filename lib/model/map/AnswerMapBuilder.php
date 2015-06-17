<?php


	
class AnswerMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AnswerMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('kra_answer');
		$tMap->setPhpName('Answer');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('QUESTION_ID', 'QuestionId', 'int', CreoleTypes::INTEGER, 'kra_question', 'ID', false, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, true);

		$tMap->addColumn('THE_ANSWER', 'TheAnswer', 'boolean', CreoleTypes::BOOLEAN, true);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false);
				
    } 
} 