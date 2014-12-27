

<?php


class StudentType extends Eloquent {

	
	/**
	 * Students
	 */
	public function Students()
	{		
		return $this->hasMany('Student');
	}
	
}