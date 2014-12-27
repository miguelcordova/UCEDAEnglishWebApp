<?php


class Status extends Eloquent {

	
	protected $table = 'status';
	
	/**
	 * Students
	 */
	public function Students()
	{		
		return $this->hasMany('Student');
	}
	
}