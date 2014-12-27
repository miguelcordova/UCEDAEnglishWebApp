<?php

class PaymentsController extends BaseController {

	/**
	 * Payments/index  
	 * 
	 */
	public function index()
	{
		return View::make('Payments.index');
	}

}