
@include('index.layout.head')
</head>
<body class="fixed-header">
	
	@include('index.layout.aside_menu')
	<div class="page-wrap">
	@include('index.layout.header')
		
		<div class="container-wrap">
			<!-- <div><img class="block w-100" src="11.png"></div> -->
			<div class="inner-map">
				<nav class="page-w">
					<a href="">首页</a>
					<span>/</span>
					<a>联系我们</a>
				</nav>
			</div>
			<div class="page-w">
				<section class="lx-section1">
					<ul class="list-unstyled overflow">
						<li><div class="relative"><img src="/assets/images/lx-address.png"/></div></li>
						<li><div class="relative"><img src="/assets/images/lx-mobile.png"/></div></li>
						<li><div class="relative"><img src="/assets/images/lx-email.png"/></div></li>
					</ul>
				</section>
			</div>
			<div><img class="block w-100" src="/assets/11.png"></div>
			<div class="page-w">
				<div class="lx-form-container">
					<div class="self-form-header">
						<div class="text-center "style="font-size:18px;">联系<span class="m-l-10" style="color:#ffc722">我们</span></div>
						<div class="m-t-15"><img class="block w-100" src="/assets/images/lx-title-bc.png"/></div>
					</div>
					<form class="lx-form self-form">
						<div class="line-form">
							<div class="form-ctrl">
								<input placeholder="姓名" type="text" />
							</div>
							<div class="form-ctrl">
								<input placeholder="电话" type="text" />
							</div>
						</div>
						<div class="line-form m-t-20">
							<div class="form-ctrl">
								<input placeholder="邮箱" type="text" />
							</div>
							<div class="form-ctrl">
								<input placeholder="主题" type="text" />
							</div>
						</div>
						<div class="line-form m-t-20">
							<textarea placeholder="内容"></textarea>
						</div>
						<div class="line-form m-t-20 text-center">
							<button type="button">发送</button>
						</div>
					</form>
				</div>
			</div>
			@include('index.layout.footer')
		</div>
		<!--- container-wrap end ----->
	</div>
</body>
</html>
