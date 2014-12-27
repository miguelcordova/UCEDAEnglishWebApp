<?php

class ReportsController extends BaseController {

	/**
	 * Reports/index  
	 * 
	 */
	public function index()
	{
		return View::make('Reports.index');
	}

}