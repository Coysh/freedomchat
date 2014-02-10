		<div class="jumbotron">
			<h1>Welcome to</h1>
			<p class="lead">A secure chatting website</p>
		</div>

		<div class="row" style="margin-top:20px">
			<div class="col-xs-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
					<li><a href="#register" data-toggle="tab">Create Account</a></li>
					<li><a href="#about" data-toggle="tab">About</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active in" id="login">
						<form role="form" action="CGI-BIN/account-process.php" method="post">
							<fieldset>
								<h2>Login</h2>
								<hr class="chatcolours">
								<div class="form-group">
									<input type="username" name="username" id="username" class="form-control input-lg" placeholder="Username">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
								</div>
								<hr class="chatcolours">
								<input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Login">
							</fieldset>
						</form>
					</div>
					<div class="tab-pane fade" id="register">
						<form role="form" action="CGI-BIN/account-process.php" method="post">
							<fieldset>
								<h2>Register</h2>
								<hr class="chatcolours">
								<div class="form-group">
									<h3>Pick a display picture</h3>
									<div class="row face-grid">
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-1" value="1" checked/>
											<label class="head-selected"  for="head-1" ><img class="head-pic"  src="/img/head-1.png" /></label class="head-not-selected" >
										</div>	
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-2" value="2" />
											<label class="head-not-selected"  for="head-2" ><img class="head-pic"  src="/img/head-2.png" /></label class="head-not-selected" >
										</div>
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-3" value="3" />
											<label class="head-not-selected"  for="head-3" ><img class="head-pic"  src="/img/head-3.png" /></label class="head-not-selected" >
										</div>
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-4" value="4" />
											<label class="head-not-selected"  for="head-4" ><img class="head-pic"  src="/img/head-4.png" /></label class="head-not-selected" >
										</div>
									</div>
									<div class="row face-grid">
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-5" value="5" />
											<label class="head-not-selected"  for="head-5" ><img class="head-pic"  src="/img/head-5.png" /></label class="head-not-selected" >
										</div>	
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-6" value="6" />
											<label class="head-not-selected"  for="head-6" ><img class="head-pic"  src="/img/head-6.png" /></label class="head-not-selected" >
										</div>
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-7" value="7" />
											<label class="head-not-selected"  for="head-7" ><img class="head-pic"  src="/img/head-7.png" /></label class="head-not-selected" >
										</div>
										<div class="col-xs-3">
											<input type="radio" name="head" id="head-8" value="8" />
											<label class="head-not-selected"  for="head-8" ><img class="head-pic"  src="/img/head-8.png" /></label class="head-not-selected" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="username" name="username" id="username" class="form-control input-lg" placeholder="Username">
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<input type="password" name="cpassword" id="cpassword" class="form-control input-lg" placeholder="Confirm Password">
										</div>
									</div>
								</div>
								<div class="notice">									
									<div class="alert alert-danger">
										<a class="close" data-dismiss="alert" href="#">×</a>
										<span class="error">Passwords do not match!</span>
									</div>								
								</div>
								<hr class="chatcolours">
								<input type="submit" name="register" class="btn btn-lg btn-success btn-block" value="Register">
							</fieldset>
						</form>
					</div>
					<div class="tab-pane fade" id="about">
						<form role="form" action="CGI-BIN/account-process.php" method="post">
							<fieldset>
								<h2>About</h2>
								<hr class="chatcolours">
								<p> Freedom Chat has been set up as a secure communication service, which ensures your messages are transmitted and kept in a way that means only you and the recipient can see them. We wanted to provide a way for people to talk to each other securely with minimal server interaction which means your messages are only stored until you receive them. We also keep everything secure by letting you choose and encryption key for your messages that isn’t stored on our servers this ensures that there is no chance of someone finding the key to decrypt your messages. </p>
								<hr class="chatcolours">
							</fieldset>
						</form>
					</div>
				</div>				
			</div>
		</div>
