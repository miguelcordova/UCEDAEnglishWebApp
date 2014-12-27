@extends('Students.layouts.master')

@section('content')
		
<div class="left_nav panel-group" id="accordion">	
	<div class="left_nav_li">
		<div class="left_nav_li_icon"><img src="/core/img/nav_icons/Students/index.png" alt="" /></div>
		<div class="left_nav_li_content">
		<a href="/Students" >Search Student</a>
		</div>
	</div>
		
	<div class="left_nav_li left_nav_li_selected">
		<div class="left_nav_li_icon"><img src="/core/img/nav_icons/Students/add.png" alt="" /></div>
		<div class="left_nav_li_content">
		<a href="/Students/Create" >Add new Student</a>
		</div>
	</div>
</div> <!-- end left_nav-->
	

<div class="body_content_right">

	<ul id="breadcrumb">
	    <li><a href="/"><img src="/core/img/home_icon.png" title="Home" alt="" /></a></li>
		<li><a href="/Students">Students</a></li>
		<li>Add new Student</li>
	</ul>		
	
	<div class="col-md-12 text-right">
		<button class="btn btn-xs btn-primary" disabled="" type="button" onclick="PrintAgreement();">Print Agreement</button>
	</div>
	
	
				
<div id="student" class="content_wrapper ">


	
<div class="form-horizontal">
		
	
<fieldset class="section_break">
	<legend>Information</legend>
	<div class="form-group required">
		{{ Form::label('StudentID', 'Student ID', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-2">
			{{ Form::text('StudentID', null, array('class' => 'form-control', 'disabled' => '')) }}		
		</div>

		{{ Form::label('StudentType', 'Type', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-2">
			{{ Form::select('StudentType', $data['studentTypeList'] , null, array('class' => 'form-control', 'id' => 'StudentType') ) }}
		</div>		
	</div>
		
	<div class="form-group required">						
		{{ Form::label('Email', 'Email', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-6">
			{{ Form::text('Email', null, array('class' => 'form-control')) }}
		</div>
	</div>
		
	<div class="form-group required">	
		{{ Form::label('FirstName', 'First Name', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-6">
			{{ Form::text('FirstName', null, array('class' => 'form-control')) }}
		</div>
	</div>
	
	<div class="form-group required">
		{{ Form::label('MiddleName', 'Middle Name', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-6">
			{{ Form::text('MiddleName', null, array('class' => 'form-control')) }}
		</div>
	</div>
	
	<div class="form-group required">
		{{ Form::label('LastName', 'Last Name', array('class' => 'col-md-2 control-label')) }}
		<div class="col-md-6">
			{{ Form::text('LastName', null, array('class' => 'form-control')) }}
		</div>
	</div>	
	
	<div class="form-group required">
		{{ Form::label('Gender', 'Gender', array('class' => 'col-md-2 control-label')) }}		
		<div class="col-md-2">
			{{ Form::select('Gender', $data['genderList'] , null, array('class' => 'form-control', 'id' => 'Gender') ) }}		
		</div>	
		
		{{ Form::label('DateOfBirth', 'Date of Birth', array('class' => 'col-md-2 control-label')) }}		
		<div class="col-md-2">		
				<div class="input-group date">
                {{ Form::text('DateOfBirth', null, array('class' => 'form-control')) }}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
         		</div>		
		</div>					
	</div>
		
</fieldset>

<div role="tabpanel">

<div class="nav-tabs-custom">


  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#PublicInformation" aria-controls="PublicInformation" role="tab" data-toggle="tab">Public Information</a></li>
    <li role="presentation"><a href="#PersonalInformation" aria-controls="PersonalInformation" role="tab" data-toggle="tab">Personal Information</a></li>
    <li role="presentation"><a href="#Other" aria-controls="Other" role="tab" data-toggle="tab">Other</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="PublicInformation">    
	    <fieldset class="section_break">
		
		<legend>Contact Information</legend>
		
		<div class="form-group required">
			{{ Form::label('USAAddress', 'USA Address', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">			
				{{ Form::textarea('USAAddress', null, ['rows' => '3', 'class' =>'form-control']) }}
			</div>
			
			{{ Form::label('PassportNumber', 'Passport Number', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('PassportNumber', null, array('class' => 'form-control')) }}
			</div>
		</div>
		
		
		<div class="form-group required">			
			{{ Form::label('USAApartment', 'Apartment', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">				
				{{ Form::text('USAApartment', null, array('class' => 'form-control')) }}
			</div>
			
			{{ Form::label('MobileNumber', 'Mobile Number', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('MobileNumber', null, array('class' => 'form-control')) }}
			</div>
			
		</div>
		
		<div class="form-group required">
			{{ Form::label('USACity', 'City', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::select('USACity', $data['usaCityList'] , null, array('class' => 'form-control', 'id' => 'USACity') ) }}
			</div>
			
			{{ Form::label('HomeNumber', 'Home Number', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('HomeNumber', null, array('class' => 'form-control')) }}
			</div>					
		</div>
		
		<div class="form-group required">
			{{ Form::label('USAState', 'State', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::select('USAState', $data['usaStateList'] , null, array('class' => 'form-control', 'id' => 'USAState') ) }}			
			</div>					
		</div>
		
		<div class="form-group required">
			{{ Form::label('USAZipCode', 'Zip Code', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				{{ Form::text('USAZipCode', null, array('class' => 'form-control')) }}
			</div>
			<div class="col-md-2"></div>
						
			{{ Form::label('Comments', 'Comments', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::textarea('Comments', null, ['rows' => '3', 'class' =>'form-control']) }}
			</div>
			
		</div>
		
					
		</fieldset>
		
    </div>
    
    <div role="tabpanel" class="tab-pane" id="PersonalInformation">
    
    	<fieldset class="section_break">
		
		<legend>Contact Information</legend>
		
		<div class="form-group required">
			{{ Form::label('Address', 'Address', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::textarea('Address', null, ['rows' => '3', 'class' =>'form-control']) }}
			</div>
			
			{{ Form::label('PassportNumber2', 'Passport Number', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('PassportNumber2', null, array('class' => 'form-control')) }}
			</div>
		</div>
		
		
		<div class="form-group required">
			
			{{ Form::label('Apartment', 'Apartment', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('Apartment', null, array('class' => 'form-control')) }}
			</div>
			
			{{ Form::label('LevelCareer', 'Level Career', array('class' => 'col-md-2 control-label')) }}			
			<div class="col-md-4">
				{{ Form::select('LevelCareer', $data['levelCareerList'] , null, array('class' => 'form-control', 'id' => 'LevelCareer') ) }}		
			</div>		
			
		</div>
		
		<div class="form-group required">

			{{ Form::label('City', 'City', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('City', null, array('class' => 'form-control')) }}
			</div>
			
			{{ Form::label('Shift', 'Shift', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::select('Shift', $data['shiftList'] , null, array('class' => 'form-control', 'id' => 'Shift') ) }}
			</div>			
					
		</div>
		
		<div class="form-group required">
			{{ Form::label('State', 'State', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::text('State', null, array('class' => 'form-control')) }}
			</div>					
		</div>
		
		<div class="form-group required">		
			{{ Form::label('Country', 'Country', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-4">
				{{ Form::select('Country', $data['countryList'] , null, array('class' => 'form-control', 'id' => 'Country') ) }}
			</div>				
		</div>
				
		<div class="form-group required">				
			{{ Form::label('ZipCode', 'ZipCode', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				{{ Form::text('ZipCode', null, array('class' => 'form-control')) }}
			</div>			
		</div>
		
					
		</fieldset>
    
    
    
    </div>
    <div role="tabpanel" class="tab-pane" id="Other">
    
     <fieldset class="section_break">
		
		<legend>Status</legend>
		
		<div class="form-group required">
			{{ Form::label('Status', 'Status', array('class' => 'col-md-2 control-label')) }}	
			<div class="col-md-2">
				{{ Form::select('Status', $data['statusList'] , null, array('class' => 'form-control', 'id' => 'Status') ) }}		
			</div>
			
			{{ Form::label('StartDate', 'Start Date', array('class' => 'col-md-2 control-label')) }}		
			<div class="col-md-2">		
					<div class="input-group date">
	                {{ Form::text('StartDate', null, array('class' => 'form-control')) }}
	                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	         		</div>		
			</div>
			
			{{ Form::label('Registration', 'Registration', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				<div class="input-group date">
                {{ Form::text('Registration', null, array('class' => 'form-control')) }}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
         		</div>	
			</div>
			
		</div>
		
		<div class="form-group required">
		
			{{ Form::label('I20Date', 'I20 Date', array('class' => 'col-md-2 control-label')) }}		
			<div class="col-md-2">		
				<div class="input-group date">
                {{ Form::text('I20Date', null, array('class' => 'form-control')) }}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
         		</div>		
			</div>
			
			{{ Form::label('SevisID', 'Sevis ID', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				{{ Form::text('SevisID', null, array('class' => 'form-control')) }}
			</div>
						
			{{ Form::label('I20Expiration', 'I20 Expiration', array('class' => 'col-md-2 control-label')) }}		
			<div class="col-md-2">		
				<div class="input-group date">
                {{ Form::text('I20Expiration', null, array('class' => 'form-control')) }}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
         		</div>		
			</div>
						
		</div>
			
		</fieldset>
    
    
    <fieldset class="section_break">
		
		<legend>Source Information</legend>
		
		<div class="form-group required">
					
			{{ Form::label('Source', 'Source', array('class' => 'col-md-2 control-label')) }}		
			<div class="col-md-2">
				{{ Form::select('Source', $data['sourceList'] , null, array('class' => 'form-control', 'id' => 'Source') ) }}		
			</div>
								
		</div>
		
		<div class="form-group required">
			{{ Form::label('SourceName', 'Name', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				{{ Form::text('SourceName', null, array('class' => 'form-control')) }}
			</div>
			
			{{ Form::label('CheckNumber', 'Check #', array('class' => 'col-md-2 control-label')) }}
			<div class="col-md-2">
				{{ Form::text('CheckNumber', null, array('class' => 'form-control')) }}
			</div>
						
			{{ Form::label('SourceDate', 'Date', array('class' => 'col-md-2 control-label')) }}		
			<div class="col-md-2">		
				<div class="input-group date">
                {{ Form::text('SourceDate', null, array('class' => 'form-control')) }}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
         		</div>		
			</div>
			
		</div>
			
		</fieldset>
    
    </div>
  </div>

  </div>
  
</div>


<div class="modal-footer">
    <button class="btn btn-primary" type="button" onclick="submitFormCreateStudent();">Save</button>
</div>




</div>
		
</div> 

</div> <!-- end body_content_right  -->


<script>


function submitFormCreateStudent() {

    var student = {};
    
    student.Email = $("#Email").val();
    student.FirstName = $("#FirstName").val();
    student.MiddleName = $("#MiddleName").val();
    student.LastName = $("#LastName").val();
    student.StudentType = $("#StudentType").val();
    student.Gender = $("#Gender").val();
    student.DateOfBirth = $("#DateOfBirth").val();



    student.USAAddress = $("#USAAddress").val();
    student.USAApartment = $("#USAApartment").val();
    student.USACity = $("#USACity").val();
    student.USAState = $("#USAState").val();
    student.USAZipCode = $("#USAZipCode").val();
    student.PassportNumber = $("#PassportNumber").val();
    student.MobileNumber = $("#MobileNumber").val();
    student.HomeNumber = $("#HomeNumber").val();
    student.Comments = $("#Comments").val();

    student.Address = $("#Address").val();
    student.Apartment = $("#Apartment").val();
    student.City = $("#City").val();
    student.State = $("#State").val();
    student.Country = $("#Country").val();
    student.ZipCode = $("#ZipCode").val();
    student.PassportNumber2 = $("#PassportNumber2").val();
    student.LevelCareer = $("#LevelCareer").val();
    student.Shift = $("#Shift").val();

    student.Status = $("#Status").val();
    student.StartDate = $("#StartDate").val();
    student.Registration = $("#Registration").val();
    student.I20Date = $("#I20Date").val();
    student.SevisID = $("#SevisID").val();
    student.I20Expiration = $("#I20Expiration").val();

    student.Source = $("#Source").val();
    student.SourceName = $("#SourceName").val();
    student.CheckNumber = $("#CheckNumber").val();
    student.SourceDate = $("#SourceDate").val();
    
    
    $.ajax({
        url: "/Students/Store",
        type: "POST",
        dataType: "json",
        async: false,
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(student),
        success: function (data) {
            //called when successful
            
			var studentid = ("0000000000" + data.StudentID).slice(-10)
			
            $("#StudentID").val(studentid);
            
			alert("Register Successfull!! - Student: " + studentid);
        },
        error: function (e) {
            //called when there is an error
            console.log(e.message);
            alert("NOK");
        }
    });

}




$(document).ready(function () {
    $("#StudentType").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#Gender").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#Source").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#Status").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#LevelCareer").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#Country").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#Shift").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#USAState").select2({ allowClear: false, minimumResultsForSearch: 10 });
    $("#USACity").select2({ allowClear: false, minimumResultsForSearch: 10 });


    $('.input-group.date').datepicker({
        pickDate: true,
        language: 'en',
        format: 'yyyy-mm-dd',
        todayHighlight: true
    });


    
    
});


</script>
			
@stop




