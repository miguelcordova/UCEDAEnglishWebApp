<?php


class Source extends Eloquent {
		
	/**
	 * Students
	 */
	public function Students()
	{		
		return $this->hasMany('Student');
	}
	
}