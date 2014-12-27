<?php


class Student extends Eloquent {

	
	public function StudentType()
	{	
		return $this->belongsTo('StudentType');
	}
	
	public function Gender()
	{
		return $this->belongsTo('Gender');
	}
	
	public function Status()
	{
		return $this->belongsTo('Status');
	}
	
	public function Source()
	{
		return $this->belongsTo('Source');
	}
	
	public function LevelCareer()
	{
		return $this->belongsTo('LevelCareer');
	}
	
}