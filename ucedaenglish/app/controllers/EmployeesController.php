<?php

class EmployeesController extends BaseController {

	/**
	 * Employees/index  
	 * 
	 */
	public function index()
	{
		return View::make('Employees.index');
	}

}