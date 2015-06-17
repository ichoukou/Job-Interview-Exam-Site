<?php


	
class LevelPresetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LevelPresetMapBuilder';	

    
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
		
		$tMap = $this->dbMap->addTable('kra_level_preset');
		$tMap->setPhpName('LevelPreset');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addForeignKey('DEPARTMENT_ID', 'DepartmentId', 'int', CreoleTypes::INTEGER, 'kra_department', 'ID', false, null);

		$tMap->addForeignKey('GRADE_ID', 'GradeId', 'int', CreoleTypes::INTEGER, 'kra_grade', 'ID', false, null);

		$tMap->addColumn('LEVEL', 'Level', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('QUESTION_NO', 'QuestionNo', 'int', CreoleTypes::INTEGER, true);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false);
				
    } 
} 