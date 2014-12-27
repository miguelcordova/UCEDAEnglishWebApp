<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/Students', 'StudentsController@index');
Route::get('/Students/Create', 'StudentsController@create');
Route::post('/Students/Store', 'StudentsController@store');
Route::get('/Students/Search', 'StudentsController@search');
Route::get('/Students/Edit', 'StudentsController@edit');
Route::post('/Students/Update', 'StudentsController@update');


Route::get('/Employees', 'EmployeesController@index');

Route::get('/Classes', 'ClassesController@index');

Route::get('/Books', 'BooksController@index');

Route::get('/Payments', 'PaymentsController@index');

Route::get('/Reports', 'ReportsController@index');

Route::get('/Administration', 'AdministrationController@index');

Route::post('/Students/PrintAgreement', 'StudentsController@printagreement');

Route::get('pdf', function(){

        Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',12);
        Fpdf::Cell(40,8,' ',0);
        Fpdf::Image($_SERVER['DOCUMENT_ROOT'].'/core/img/UCEDA_logo.png',30,10,30,25);
        Fpdf::Cell(150,8,'UCEDA SCHOOL OF ORLANDO OBT (SOUTH CAMPUS)',0,1,'C');
        Fpdf::Ln(0);
        Fpdf::SetFont('Arial','',10);
        Fpdf::Cell(40,5,' ',0);
        Fpdf::Cell(150,5,'Enrollment Agreement',0,1,'C');
        Fpdf::Ln(0);
        Fpdf::Cell(40,5,' ',0);
        Fpdf::Cell(150,5,'12934 Deertrace Ave., Orlando, FL  32837',0,1,'C');
        Fpdf::Ln(0);
        Fpdf::Cell(40,5,' ',0);
        Fpdf::Cell(150,5,'Phone:  (407) 251-2204        Fax:  (407) 251-2206',0,1,'C');
        Fpdf::Ln(5);
        Fpdf::Cell(150,5,' ',0);
        Fpdf::Cell(10,5,'Date:',1,0,'C');
        Fpdf::Cell(30,5,'19/12/2014',1,0,'C');
        
        Fpdf::Ln(10);
        Fpdf::SetFont('Arial','B',10);
        Fpdf::Cell(30,5,'Student\'s Name:',0,0);
        Fpdf::Cell(160,5,'','B',0,'C');
        
        Fpdf::Output('document.pdf','D');
		exit;
});

