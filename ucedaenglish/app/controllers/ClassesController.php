<?php

class ClassesController extends BaseController {

	/**
	 * Classes/index  
	 * 
	 */
	public function index()
	{
		return View::make('Classes.index');
	}

}