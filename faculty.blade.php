@extends('layouts.default')
@section('content')
	<h1>Add New User</h1>
		@if($errors->has())
		<ul>
			{{ $errors->first('su_username','<li>:message</li>') }}
			{{ $errors->first('su_password','<li>:message</li>') }}
			{{ $errors->first('su_lname','<li>:message</li>') }}
			{{ $errors->first('su_fname','<li>:message</li>') }}
		</ul>
	@endif
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	{{ Form::open(array('url' => "sysusers/createnew",'method' => "post")) }}


	<p>
		{{ Form::label('firstname','First Name*') }}<br />
		{{ Form::text('su_fname',Input::old('su_fname')) }}<br />
	</p>

	<p>
		{{ Form::label('middlename','Middle Name') }}<br />
		{{ Form::text('su_mname',Input::old('su_mname')) }}<br />
	</p>
	
	<p>
		{{ Form::label('lastname','Last Name*') }}<br />
		{{ Form::text('su_lname',Input::old('su_lname')) }}<br />

	</p>
	
	<p>
		{{ Form::label('coursename','Course Name*') }}<br />
		{{ Form::text('su_cname',Input::old('su_cname')) }}<br />

	</p>

	<p>
		{{ Form::label('deptid','Department') }}<br />
		{{ Form::select('su_deptid', array('1' => 'CSE', '2' => 'BBA','3' => 'CSC','4' => 'ETE','5' => 'EEE'))}}
	</p>

	
	{{ Form::submit('Add User', ['class' => 'btn btn-primary']) }}

	{{ Form::close()}}
	
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
@endsection