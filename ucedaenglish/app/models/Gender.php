<?php


class Gender extends Eloquent {

	
	/**
	 * Students
	 */
	public function Students()
	{		
		return $this->hasMany('Student');
	}
	
}