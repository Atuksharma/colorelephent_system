<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Color Elephent</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


  
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}
    {{HTML::style('assets/css/fonts.googleapis.com.css')}}
    {{HTML::style('assets/css/ace.min.css')}} 
    {{HTML::style('assets/css/ace-rtl.min.css')}}
   
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
		
					
           
				@if (session('confirm'))
                   <div class="alert alert-success">
                   {{ session('confirm') }}
                         </div>
					@endif
					
					
					<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Candidate Evaluation</span>
									<span class="white" id="id-text2">&copy; Color Elephent</span>
								</h1>
								
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box <?php if(count($errors) > 0){echo "";}else {echo "visible";} ?> widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger" style="color: red;">
													@if (session('message'))
												 {{ session('message') }}
                                                   @endif
											</h4>

											<div class="space-6"></div>

										
											  {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
                                         	<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
														
														 {{ Form::email('useremail', '',$attributes = array('placeholder'=>'Username','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 {{ Form::password('password', $attributes = array('placeholder'=>'Password','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

                                                 {{ Form::submit('Login',$attributes = array('class'=>"width-35 ") ) }}
                                                       </div>

													<div class="space-4"></div>
												</fieldset>
											{{Form::close()}}

											<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box <?php if(count($errors) > 0){echo "visible";} ?> widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>


                                           {{ Form::open(array('url' => 'signup', 'method' => 'post')) }}
                                           
                                           
											<form>
												<fieldset>
													<label class="block clearfix" style="color:red" >
													
					                      @foreach($errors->get('email')  as $message)
					                       {{ $message }}
                                         @endforeach
					 
														<span class="block input-icon input-icon-right">
														 {{ Form::email('email', '',$attributes = array('placeholder'=>'Example@gmail.com','class'=>"form-control") ) }}
															
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix" style="color:red">
													  @foreach($errors->get('username')  as $message)
					                              {{ $message }}
                                                     @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::text('username', '',$attributes = array('placeholder'=>'FullName','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix" style="color:red">
													  @foreach($errors->get('password')  as $message)
					                                 {{ $message }}
                                                          @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::password('password',$attributes = array('placeholder'=>'Password','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix"style="color:red">
													  @foreach($errors->get('repassword')  as $message)
					                                  {{ $message }}
                                                          @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::password('repassword',$attributes = array('placeholder'=>'Repeat password','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" name='accept' class="ace" required />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>
 {{ Form::submit('Register',$attributes = array('class'=>"width-65 pull-right btn btn-sm btn-success") ) }}
														
														
													</div>
												</fieldset>
											{{ Form::close() }}
											
											
											
											
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
							
							
							
							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a href="job-apply">Candidate job Apply</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a href="#">Login/Signup</a>
								&nbsp;
								
								
							</div>
							
							
                            <!--
							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
							-->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->


 {{HTML::script('assets/js/jquery-2.1.4.min.js')}}
		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>