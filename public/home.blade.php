<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <title>Login | Faculty Evaluation</title>
        <meta name="description" content="Login | Faculty Evaluation" />
        <meta name="author" content="Tipu Sultan" />
		<link rel="stylesheet" href=<?php echo asset("css/style.css")?> type="text/css" media="screen,projection" />
		<script src=<?php echo asset("js/function.js")?>></script>
    </head>
    <body>
        <div class="container">					
			<header>			
				<h1><strong>Faculty Evaluation</strong> </h1>
				<h1>Log in</h1>
							
			</header>			
			<section class="main">
				<form class="form-1" action='auth' method='post'>
					<span class="field">
						<input type="text" name="username" placeholder="Username or E-mail">
						<i class="icon-user icon-large"></i>
					</span>
						<span class="field">
							<input type="password" name="password" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</span>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
					
				</form>
				 <center><span class='loginE'><i><?php echo $data['loginE'];?></i></span></center>
			</section>
			
        </div>
    </body>
</html>