<?php


class LevelCareer extends Eloquent {

	
	/**
	 * Students
	 */
	public function Students()
	{		
		return $this->hasMany('Student');
	}
	
}