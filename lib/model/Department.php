<?php

/**
 * Subclass for representing a row from the 'kra_department' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Department extends BaseDepartment
{
	public function __toString()
	{
		return $this->getName();
	}
	
	public function getHeadOfDepartment()
	{
			return $this->getUser()->getFullname();

	}
}
