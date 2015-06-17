<?php

/**
 * Subclass for representing a row from the 'kra_grade' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Grade extends BaseGrade
{
	public function __toString()
	{
		return $this->getDescription();
	}
}
