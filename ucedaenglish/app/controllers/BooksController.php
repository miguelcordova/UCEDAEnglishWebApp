<?php

class BooksController extends BaseController {

	/**
	 * Books/index  
	 * 
	 */
	public function index()
	{
		return View::make('Books.index');
	}

}