<html lang="en">
	<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta charset="utf-8">
		<title>后台登陆</title>

		<meta content="User login page" name="description">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">

		<!-- bootstrap & fontawesome -->
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/font-awesome.min.css" rel="stylesheet">

		<!-- text fonts -->
		<link href="/assets/css/ace-fonts.min.css" rel="stylesheet">

		<!-- ace styles -->
		<link href="/assets/css/ace.min.css" rel="stylesheet">

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link href="/assets/css/ace-rtl.min.css" rel="stylesheet">

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/assets/js/html5shiv.min.js"></script>
		<script src="/assets/js/respond.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
		    window.jQuery || document.write("<script src='/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
		    if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red"></span>
									<span id="id-text2" class="grey">运营平台管理系统</span>
								</h1>
								<h4 id="id-company-text" class="blue">&copy; </h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div class="login-box widget-box no-border visible" id="login-box">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												请输入
											</h4>

											<div class="space-6"></div>

											<form id="formView" method="POST" action="/login">
												{!! csrf_field() !!}
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" placeholder="邮箱" class="form-control" id="email" name="email" value="{{ old('email') }}" datatype="e" errormsg="必须是邮箱地址！" nullmsg="请输入邮箱！">
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password" name="password" placeholder="密码" class="form-control" datatype="*8-18" errormsg="密码范围在8~18位之间！" nullmsg="请输入密码！">
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<label class="block clearfix">
													<span class="block input-icon input-icon-right">
													  <input type="text" placeholder="请输入验证码"  id="securityCode" name="captcha" style="margin-right: 13px;" datatype="*" nullmsg="请输入验证码！">
										                <a href="javascript:re_captcha();" >
										                    <img id="c2c98f0de5a04167a9e427d883690ff6"  src="{{ asset('/captcha/getcaptcha/1') }}" alt="" width="90" height="35">
										                </a>
													</span>
													</label>
													<div class="space"></div>

													@include('admin.message')

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" name="remember">
															<span class="lbl"> 记住我</span>
														</label>

														<button class="width-35 pull-right btn btn-sm btn-primary" type="submit">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">登陆</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br>
								&nbsp;
								<a href="#" id="btn-login-dark">暗色</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a href="#" id="btn-login-blur">模糊</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a href="#" id="btn-login-light">明亮</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		@include('admin.layout.script')

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
			 $('#btn-login-dark').on('click', function(e) {
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

			 validForm();
			});
			function re_captcha() {
	 		   $url = "/captcha/getcaptcha";
			    $url = $url + "/" + Math.random();
			    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
			  }

		</script>


</body></html>
