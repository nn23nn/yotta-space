
@include('index.layout.head')
</head>
<body class="fixed-header">
	
	@include('index.layout.aside_menu')
	<div class="page-wrap">
	@include('index.layout.header')
		
		<div class="container-wrap">
			<div><img class="block w-100" src="/assets/11.png"></div>
			<div class="inner-map">
				<nav class="page-w">
					<a href="">首页</a>
					<span>/</span>
					<a>登录</a>
				</nav>
			</div>
			<div class="page-w">
				<div class="login-container">
					<div class="self-form-header">
						<div class="text-center "style="font-size:18px;">登<span class="m-l-10" style="color:#ffc722">录</span></div>
						<div class="m-t-15"><img class="block w-100" src="/assets/images/lx-title-bc.png"/></div>
					</div>
					<form id="loginForm" class="self-form login-form">
						<div class="line-form">
							<input name="mobile" placeholder="您的手机号码" type="text" />
						</div>
						<div class="line-form">
							<input name="password" placeholder="密码" type="password" />
						</div>
						<div class="line-form">
							<label><input name="remember" class="relative" style="top:1px;" type="checkbox"/> 记住账号</label>
							<a href="/index/getback" class="pull-right">忘记密码</a>
						</div>
						<div class="line-form text-center">
							<button id="doLogin" type="button" class="login-btn self-btn">登录</button>
						</div>
						<div class="line-form text-center" style="margin-top:50px">没有账号？<a href="/index/register">立即注册</a></div>
					</form>
				</div>
			</div>
				@include('index.layout.footer')
		</div>
	</div>
</body>
<script src="/assets/js/login.js"></script>
</html>
	<script>
	(function(){
		var privilege = getPrivilege();
		var form = document.getElementById("loginForm");

		privilege.url = "/index/loginEnter"; //登录接口url
		privilege.redirect = "/index/userCenter"; //登录成功跳转到的页面
		$("#doLogin").on("click",function(){
			var data = {phone:form.mobile.value,password:form.password.value,remember:form.remember.checked};
			privilege.login(data,this,{
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			});
		});
	}());
</script>
