<!DOCTYPE html PUBLIC>
<html>
<head>
<title>{{ $title }} |  Faculty Evaluation </title>
<link rel="stylesheet" href=<?php echo asset("css/style.css")?> type="text/css" media="screen,projection" />
<script src=<?php echo asset("js/function.js")?>></script>
</head>
<body>
<div id="container">
  <div id="header">
    <h1> Faculty Evaluation </h1>

  </div>
   <div id="navigation">
    <ul>
     <li>{{ HTML::linkRoute('home','Home') }}</li>
     <li>{{ HTML::linkRoute('ssurvey','Survey') }}</li>
      <li>{{ HTML::linkRoute('instructors','Instructors') }}</li>

	  <li>{{ HTML::linkRoute('systemUsers','User Accounts') }}</li> 
	   <li>{{ HTML::linkRoute('survey','Survey Question') }}</li> 
    <li>{{ HTML::linkRoute('login','Logout') }}</li> 
    </ul>
  </div>
  <div id="content">

  		@yield('content')

			
		  
    </div>
   
  
  <div id="footer">
    <p>&copy;  Faculty Evaluation System  |  <a href="#">Log out</a></p>
  </div>
</div>

</body>
</html>
