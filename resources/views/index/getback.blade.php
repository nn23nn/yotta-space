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
					<a>找回密码</a>
				</nav>
			</div>
			<div class="page-w">
				<div class="login-container">
					<div class="self-form-header">
						<div class="text-center "style="font-size:18px;">找回<span class="m-l-10" style="color:#ffc722">密码</span></div>
						<div class="m-t-15"><img class="block w-100" src="/assets/images/lx-title-bc.png"/></div>
					</div>
					<form id="getbackForm" class="self-form login-form">
						<div class="line-form">
							<input name="mobile" placeholder="您的手机号码" type="text" />
						</div>
						<div class="line-form rows">
							<input name="smscode" placeholder="验证码" type="text" />
							<button type="button" id="getCode" class="self-btn">发送验证码</button>
						</div>
						<div class="line-form">
							<input name="password" placeholder="设置新密码" type="password" />
						</div>
						<div class="line-form overflow">
							<button id="doGetback" type="button" style='width:43%' class="login-btn self-btn pull-left">提交</button>
							<a href="/index/index">
							<button type="button" style='width:43%' class="login-btn self-btn pull-right">返回上一页</button>
								</a>
						</div>
					</form>
				</div>
			</div>
			@include('index.layout.footer')
		</div>
	</div>
</body>
</html>
<script src="/assets/js/login.js"></script>
<script>
	(function(){
		var privilege = getPrivilege();
		privilege.smsUrl = "/index/sendCode"; //短信验证码url
		var form = document.getElementById("getbackForm");
		$("#getCode").on("click",function(){
			privilege.getCode(form.mobile.value,this,{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')});
		});
		privilege.url = "/index/updatePassword"; //注册接口url
		privilege.redirect = "/index/login"; //登录页
		$("#doGetback").on("click",function(){
			privilege.getback({phone:form.mobile.value,code:form.smscode.value,password:form.password.value},this,{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')});
		});
	}());
</script>