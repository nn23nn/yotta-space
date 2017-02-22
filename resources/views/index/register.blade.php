
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
					<a>注册</a>
				</nav>
			</div>
			<div class="page-w">
				<div class="login-container">
					<div class="self-form-header">
						<div class="text-center "style="font-size:18px;">注<span class="m-l-10" style="color:#ffc722">册</span></div>
						<div class="m-t-15"><img class="block w-100" src="/assets/images/lx-title-bc.png"/></div>
					</div>
					<form id="registerForm" class="self-form login-form">
						<div class="line-form">
							<input name="mobile" placeholder="您的手机号码" type="text" />
						</div>
						<div class="line-form rows">
							<input name="smscode" placeholder="验证码" type="text" />
							<button type="button" id="getCode" class="self-btn">发送验证码</button>
						</div>
						<div class="line-form">
							<input name="username" placeholder="姓名" type="text" />
						</div>
						<div class="line-form">
							<input name="password" placeholder="密码" type="password" />
						</div>
						<div class="line-form text-center">点击注册，即表示您同意<a href="">用户协议</a></div>
						<div class="line-form text-center">
							<button id="doRegister" type="button" class="login-btn self-btn">注册</button>
						</div>
						<div class="line-form text-center" style="margin-top:50px">已有账号？<a href="/index/login">立即登录</a></div>
					</form>
				</div>
			</div>
				@include('index.layout.footer')
		</div>
	</div>
</body>

<script src="/assets/js/login.js"></script>
	<script>
	(function(){
		var privilege = getPrivilege();
		privilege.smsUrl = "/index/sendCode"; //短信验证码url
		var form = document.getElementById("registerForm");
		$("#getCode").on("click",function(){
			privilege.getCode(form.mobile.value,this,{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')});
		});
		privilege.url = "/index/registerEnter"; //注册接口url
		privilege.redirect = "/index/login"; //注册成功跳转到的页面
		$("#doRegister").on("click",function(){
			privilege.register({phone:form.mobile.value,code:form.smscode.value,username:form.username.value,password:form.password.value},this,{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')});
		});
	}());
</script>
