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
<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
	<body class="login-layout" style="background-color:white;" >
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
									<span class="red">Apply on a job</span>
									
								</h1>
								
							</div>

						

							<div class="position-relative" style="width:800px;">
								

								
								<div id="signup-box" class="signup-box  visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New Candidate
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>


                                           {{ Form::open(array('url' => 'apply', 'method' => 'post' , 'files' => true)) }}
                                           
                                           
										
												<fieldset>
												Email
													<label class="block clearfix" style="color:red" >
													
					                      @foreach($errors->get('email')  as $message)
					                       {{ $message }}
                                         @endforeach
					 
														<span class="block input-icon input-icon-right">
														 {{ Form::email('email', '',$attributes = array('placeholder'=>'Example@gmail.com','class'=>"form-control") ) }}
															
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>
                                                      Full Name
													<label class="block clearfix" style="color:red">
													  @foreach($errors->get('username')  as $message)
					                              {{ $message }}
                                                     @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::text('username', '',$attributes = array('placeholder'=>'FullName','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
                                                     Web Address
													<label class="block clearfix" style="color:red">
													  @foreach($errors->get('website')  as $message)
					                                 {{ $message }}
                                                          @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::url('website', '',$attributes = array('placeholder'=>'http://www.myprofile.com','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
                                                    Cover Letter
													<label class="block clearfix"style="color:red">
													  @foreach($errors->get('coverletter')  as $message)
					                                  {{ $message }}
                                                          @endforeach
														<span class="block input-icon input-icon-right">
															 {{ Form::file('coverletter',$attributes = array('placeholder'=>'Cover Leeter','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

                                              Resume
                                            <label class="block clearfix"style="color:red">
													  @foreach($errors->get('resume')  as $message)
					                                  {{ $message }}
                                                          @endforeach
														<span class="block input-icon input-icon-right">
														 {{ Form::file('resume',$attributes = array('placeholder'=>'CV','class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>
													
                                                Do you like working?
                                                <label class="block clearfix" style="color:red">
													  @foreach($errors->get('question')  as $message)
					                              {{ $message }}
                                                     @endforeach
                                                     
														<span class="block input-icon input-icon-right">
													
														 {{ Form::select('question', ['yes' => 'Yes', 'No' => 'No'], 'Yes',$attributes = array('class'=>"form-control") ) }}
														
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>


                       <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                                {!! captcha_image_html('ContactCaptcha') !!}
                                <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">

                                @if ($errors->has('CaptchaCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                    </span>
                                @endif
                                <br/><br/>
                            </div>
                        </div>



													<div class="space-24"></div>
<br/><br/>
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
								<a href="index">Login/Signup</a>
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
