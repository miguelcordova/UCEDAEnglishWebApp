<?php

class StudentsController extends BaseController {

	/**
	 * Students/Index  
	 * 
	 */
	public function index()
	{
		
		$students = Student::with('StudentType')
								->with('Gender')
								->with('Status')
								->with('Source')
								->with('LevelCareer')->get();
			
		return View::make('Students.index')->with('students',$students);
	}
	
	/**
	 * Students/Create
	 *
	 */
	public function create()
	{
		
		$studentTypeList = StudentType::lists('name', 'id');
				
		$genderList = Gender::lists('name', 'id');
				
		$statusList = Status::lists('name', 'id');
		
		$sourceList = Source::lists('name', 'id');
		
		$levelCareerList = LevelCareer::lists('name', 'id');
		
		$usaCityList = array(
				
				"1" => "Miami",
				"2" => "NewYork",
				"3" => "Texas"
		);
		
		$usaStateList = array(
		
				"1" => "Florida",
				"2" => "Alabama",
				"3" => "Alaska"
		);
		
		
		$shiftList = array(
		
				"1" => "Other",
				"2" => "Other 2",
				"3" => "Other 3"
		);
		
		
		$countryList = array(
		
				"1" => "Peru",
				"2" => "Argentina",
				"3" => "Brasil"
		);
		
		$data = array(
				'studentTypeList' => $studentTypeList,
				'genderList' => $genderList,
				'statusList' => $statusList,
				'sourceList' => $sourceList,
				'levelCareerList' => $levelCareerList,
				'usaCityList' => $usaCityList,
				'usaStateList' => $usaStateList,
				'shiftList' => $shiftList,
				'countryList' => $countryList
				
		);
		
		
		return View::make('Students.create')->with('data',$data);
	}
		
	/**
	 * Students/Store
	 */
	public function store()
	{
		$t = Input::all();
		
		$student = new Student;
					
		$student->email = $t['Email'];
		$student->firstname = $t['FirstName'];
		$student->middlename = $t['MiddleName'];
		$student->lastname = $t['LastName'];
		$student->student_type_id = $t['StudentType'];
		$student->gender_id = $t['Gender'];
		$student->dateofbirth = new DateTime($t['DateOfBirth']);
		
		$student->usaaddress = $t['USAAddress'];
		$student->usaapartment = $t['USAApartment'];
		$student->usacity_id = $t['USACity'];
		$student->usastate_id = $t['USAState'];
		$student->usazipcode = $t['USAZipCode'];
		$student->passportnumber = $t['PassportNumber'];
		$student->mobilenumber = $t['MobileNumber'];
		$student->homenumber = $t['HomeNumber'];
		$student->comments = $t['Comments'];
				
		$student->address = $t['Address'];
		$student->apartment = $t['Apartment'];
		$student->city = $t['City'];
		$student->state = $t['State'];
		$student->zipcode = $t['ZipCode'];
		$student->passportnumber2 = $t['PassportNumber2'];
		$student->level_career_id = $t['LevelCareer'];
		$student->shift_id = $t['Shift'];
				
		$student->status_id = $t['Status'];
		$student->startdate = new DateTime($t['StartDate']); 
		$student->registration = new DateTime($t['Registration']); 
		$student->i20date = new DateTime($t['I20Date']); 
		$student->sevis_id = $t['SevisID'];
		$student->i20expiration = new DateTime($t['I20Expiration']);

		$student->source_id = $t['Source'];
		$student->checknumber = $t['CheckNumber'];
		$student->sourcename = $t['SourceName'];
		$student->sourcedate =new DateTime($t['SourceDate']);  
				
		$student->save();
		
		$studentID = $student->id;
		
		$response = array(
		'StudentID' => $studentID		
		);
		
		return $response;
		
	}

	/**
	 * Students/Search
	 */	
	public function search()
	{
		$t = Input::all();
		
		$searchBy = $t["SearchBy"];
		$searchInputText = trim($t["SearchInputText"]);
		
		switch( $searchBy )
		{
			case "1":
				
				$students = Student::where('id', '=', $searchInputText)
				->with('StudentType')
				->with('Gender')
				->with('Status')
				->with('Source')
				->with('LevelCareer')
				->get();
				
				break;
			
			case "2":

				$searchInputText = '%'.str_replace(' ','%',trim($t["SearchInputText"])).'%';
				$students = Student::whereRaw('concat(firstname,\' \' ,middlename,\' \',lastname) LIKE ? ', array($searchInputText))
				->with('StudentType')
				->with('Gender')
				->with('Status')
				->with('Source')
				->with('LevelCareer')
				->get();
				break;
				
			case "3":
				$searchInputText = '%'.str_replace(' ','%',trim($t["SearchInputText"])).'%';
				$students = Student::where('email', 'LIKE', '%'.$searchInputText.'%')
				->with('StudentType')
				->with('Gender')
				->with('Status')
				->with('Source')
				->with('LevelCareer')
				->get();
				break;
				
				
				break;				
		}
		
		

		
		return View::make('Students.search')->with('students',$students);
		
	}
	
	/**
	 * Students/Edit
	 */
	public function edit()
	{
		$t = Input::all();
		
		$id = $t["id"];
				
		$student = Student::findOrFail($id);
		/*
				->with('Gender')
				->with('Status')
				->with('Source')
				->with('LevelCareer')->first();
				*/
		
		$studentTypeList = StudentType::lists('name', 'id');
		
		$genderList = Gender::lists('name', 'id');
		
		$statusList = Status::lists('name', 'id');
		
		$sourceList = Source::lists('name', 'id');
		
		$levelCareerList = LevelCareer::lists('name', 'id');
		
		$usaCityList = array(
		
				"1" => "Miami",
				"2" => "NewYork",
				"3" => "Texas"
		);
		
		$usaStateList = array(
		
				"1" => "Florida",
				"2" => "Alabama",
				"3" => "Alaska"
		);
		
		
		$shiftList = array(
		
				"1" => "Other",
				"2" => "Other 2",
				"3" => "Other 3"
		);
		
		
		$countryList = array(
		
				"1" => "Peru",
				"2" => "Argentina",
				"3" => "Brasil"
		);
		
		$data = array(
				'studentTypeList' => $studentTypeList,
				'genderList' => $genderList,
				'statusList' => $statusList,
				'sourceList' => $sourceList,
				'levelCareerList' => $levelCareerList,
				
				'usaCityList' => $usaCityList,
				'usaStateList' => $usaStateList,
				'shiftList' => $shiftList,
				'countryList' => $countryList,
				
				'student' => $student
		
		);
		
			
		return View::make('Students.edit')->with('data',$data);
		
		
	}

	
	/**
	 * Students/Update
	 */
	public function update()
	{
		$t = Input::all();
		
		$id = $t["StudentID"];
		
		$student = Student::findOrFail($id);
		
		if($student)
		{
			
		$student->email = $t['Email'];
		$student->firstname = $t['FirstName'];
		$student->middlename = $t['MiddleName'];
		$student->lastname = $t['LastName'];
		$student->student_type_id = $t['StudentType'];
		$student->gender_id = $t['Gender'];
		$student->dateofbirth = new DateTime($t['DateOfBirth']);
		
		$student->usaaddress = $t['USAAddress'];
		$student->usaapartment = $t['USAApartment'];
		$student->usacity_id = $t['USACity'];
		$student->usastate_id = $t['USAState'];
		$student->usazipcode = $t['USAZipCode'];
		$student->passportnumber = $t['PassportNumber'];
		$student->mobilenumber = $t['MobileNumber'];
		$student->homenumber = $t['HomeNumber'];
		$student->comments = $t['Comments'];
				
		$student->address = $t['Address'];
		$student->apartment = $t['Apartment'];
		$student->city = $t['City'];
		$student->state = $t['State'];
		$student->zipcode = $t['ZipCode'];
		$student->passportnumber2 = $t['PassportNumber2'];
		$student->level_career_id = $t['LevelCareer'];
		$student->shift_id = $t['Shift'];
				
		$student->status_id = $t['Status'];
		$student->startdate = new DateTime($t['StartDate']); 
		$student->registration = new DateTime($t['Registration']); 
		$student->i20date = new DateTime($t['I20Date']); 
		$student->sevis_id = $t['SevisID'];
		$student->i20expiration = new DateTime($t['I20Expiration']);

		$student->source_id = $t['Source'];
		$student->checknumber = $t['CheckNumber'];
		$student->sourcename = $t['SourceName'];
		$student->sourcedate =new DateTime($t['SourceDate']);  
						
			$student->save();
			
			$studentID = $student->id;
			
			$response = array(
					'StudentID' => $studentID
			);
			
			return $response;
			
		}
		
		
	}
	
	/**
	 * Students/PrintAgreement
	 */
	public function printagreement()
	{
		$t = Input::all();
		
		$id = $t["StudentID"];
		
		$student = Student::findOrFail($id);
		
		if($student)
		{
			$fullname = $student->lastname.' '.$student->firstname;			
		}
		
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
		Fpdf::SetFont('Arial','',10);
		Fpdf::Cell(160,5,utf8_decode($fullname),'B',0,'L');
		
		Fpdf::Output('EnrollmentAgreement-'.$student->id.'.pdf','I');
		exit;
		
	
	}
	
	
}