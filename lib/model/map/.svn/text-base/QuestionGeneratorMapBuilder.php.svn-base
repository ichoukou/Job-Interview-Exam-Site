<?php


	
class QuestionGeneratorMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.QuestionGeneratorMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('kra_question_generator');
		$tMap->setPhpName('QuestionGenerator');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('USER_ID', 'UserId', 'int', CreoleTypes::INTEGER, 'kra_user', 'ID', false, null);

		$tMap->addForeignKey('QUESTION_ID', 'QuestionId', 'int', CreoleTypes::INTEGER, 'kra_question', 'ID', false, null);

		$tMap->addColumn('ANSWER', 'Answer', 'int', CreoleTypes::INTEGER, true);

		$tMap->addForeignKey('ANSWER_OPTION_ID', 'AnswerOptionId', 'int', CreoleTypes::INTEGER, 'kra_answer_option', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false);

		$tMap->addColumn('ANSWER_AT', 'AnswerAt', 'int', CreoleTypes::TIMESTAMP, true);
				
    } 
} 