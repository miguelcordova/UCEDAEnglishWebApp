@extends('Students.layouts.master')

@section('content')
		
<div class="left_nav panel-group" id="accordion">
	<div class="left_nav_li left_nav_li_selected">
		<div class="left_nav_li_icon"><img src="/core/img/nav_icons/Students/index.png" alt="" /></div>
		<div class="left_nav_li_content">
		<a href="/Students" >Search Student</a>
		</div>
	</div>

	<div class="left_nav_li">
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
		<li>Search Student</li>
	</ul>		
	
	<div id="searchStudent" class="content_wrappper">
	
		<div class="form-horizontal">
				
				<fieldset class="section_break">
			<legend>Search Information</legend>
				
			<div class="form-group">
			
				<label for="SearchBy" class="col-md-2 control-label">Search By</label>
				<div class="col-md-2">
					<select name="SearchBy" class="form-control" id="SearchBy" >
						<option value="1">Student ID</option>
						<option value="2" selected="selected">Full Name</option>
						<option value="3">Email</option>
					</select>
				</div>
				
				<div class="col-md-6">			
					<input id="SearchInputText" name="SearchInputText" class="form-control" placeholder="John Doe">			
				</div>
			
				<div class="col-md-2">			
					<button class="btn btn-xs btn-primary" type="button" onclick="submitFormSearch();">Search</button>			
				</div>
			
			</div>
			</fieldset>
		</div>
	
	</div>	
	
		
	<div id="studentList" class="content_wrapper ">

		

	</div> <!-- end student -->
				
</div> <!-- end body_content_right -->


<script>

	$('#SearchBy').on('change', function() {

		var opt = $(this).val();

		switch(opt)
		{
			case "1":
				$("#SearchInputText").attr("placeHolder","0000000258");
				break;

			case "2":
				$("#SearchInputText").attr("placeHolder","John Doe");
				break;

			case "3":
				$("#SearchInputText").attr("placeHolder","john.doe@mail.com");
				break;				

			default:
				alert("error");
				break;
		}

	});


	function submitFormSearch() {

		var data = {};
		data.SearchBy =  $('#SearchBy').val();
		data.SearchInputText = $('#SearchInputText').val();

		var url = "/Students/Search?SearchBy=" + data.SearchBy + "&SearchInputText=" + data.SearchInputText;
		
		$("#studentList").load(encodeURI(url));

	};



	    
	$(document).ready(function () {
		
	    $("#SearchBy").select2({ allowClear: false, minimumResultsForSearch: 10 });
	
	
	});


</script>



	
@stop

