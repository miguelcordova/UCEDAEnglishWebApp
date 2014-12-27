
@if(count($students) > 0)
<table class="table table-striped table-hover table-bordered">
	
<thead>
	<tr>
		<td>StudentID</td>
		<td>Email</td>
		<td>First Name</td>
		<td>Middle Name</td>
		<td>Last Name</td>
		<td>Type</td>
		<td class="col-md-1 text-center"></td>
	</tr>
</thead>
<tbody>
	@foreach($students as $value)
	<tr>
		<td>{{ str_pad($value->id, 10, "0", STR_PAD_LEFT) }}</td>
		<td>{{ $value->email }}</td>
		<td>{{ $value->firstname }}</td>
		<td>{{ $value->middlename }}</td>
		<td>{{ $value->lastname }}</td>
		<td>{{ $value->StudentType->name }}</td>
		
		<td class="col-md-1 text-center">  <a href="{{'/Students/Edit?id='.$value->id }}">Edit</a> | <a href="{{'/Students/Delete?id='.$value->id }}">Delete</a>
		
		
	</tr>
	@endforeach
</tbody>
</table>

@else
	
	<div class="row text-center">
	    <div class="alert alert-info">
	        <strong>Student not found.</strong>
	    </div>
	</div>

@endif