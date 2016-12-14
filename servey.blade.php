
@extends('layouts.default')
@section('content')
	<h1>Evaluate Your Faculty</h1>
		@if($errors->has())
		<ul>
			{{ $errors->first('course_name','<li>:message</li>') }}
			{{ $errors->first('question_01','<li>:message</li>') }}
			{{ $errors->first('question_02','<li>:message</li>') }}
			{{ $errors->first('question_03','<li>:message</li>') }}
			{{ $errors->first('question_04','<li>:message</li>') }}
			{{ $errors->first('question_05','<li>:message</li>') }}
		</ul>
	@endif
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	{{ Form::open(array('url' => "sysusers/createnew",'method' => "post")) }}

	

	<p>
		{{ Form::label('coursename','Course Name') }}<br />
		{{ Form::select('course_name', array('1' => 'CSC 101', '2' => 'CSC 203', '3' => 'CSC 306', '4' => 'CSC 401','5' => 'CSC 405','6' => 'CSC 455'))}}
	</p>
	<p>
		{{ Form::label('question01','Is the lecture of the instructor good quality?') }}<br />
		{{ Form::select('question_01', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>
	
	<p>
		{{ Form::label('question02','Does the instructor provide materials for the course?') }}<br />
		{{ Form::select('question_02', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>

	<p>
		{{ Form::label('question03','Is the instructor available for consultant?') }}<br />
		{{ Form::select('question_03', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>

	<p>
		{{ Form::label('question04','How do you rate this instructor overall?') }}<br />
		{{ Form::select('question_04', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>

	<p>
		{{ Form::label('question05','How do you rate this course overall?') }}<br />
		{{ Form::select('question_05', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>
	
	

	


	{{ Form::submit('Add User', ['class' => 'btn btn-primary']) }}

	{{ Form::close()}}
	
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
@endsection