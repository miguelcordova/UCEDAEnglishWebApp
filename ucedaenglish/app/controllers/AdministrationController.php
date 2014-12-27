<?php

class AdministrationController extends BaseController {

	/**
	 * Administration/index  
	 * 
	 */
	public function index()
	{
		return View::make('Administration.index');
	}

}