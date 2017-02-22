
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
					<a>关于我们</a>
				</nav>
			</div>
			<section class="about-section1 page-w">
				<div class="about-section-title">我们是<span>谁</span></div>
				<div class="text-justify about-section1-intro">
					万卓资本一家集财富管理、资产配置、投融资、保险等业务为一体的综合性、多元化投资公司。<br />
					万卓资本以“聚盈万里、卓荦超伦”为企业宗旨，“立足广东，服务金融”的发展战略，以无微不至的精准专业服务为支撑，始终坚持以客户为中心，以市场为导向。凭借良好的声誉、强大的实力、完善的服务以及一支经验丰富的精英管理团队。
				</div>
				<div class="overflow" style="position:relative;">
					<div class="section-right"><img src="./images/about-section1.jpg"></div>
					<div class="section-left">
						<div class="about-do-things">
							<div class="overflow">
								<div class="about-do-thing">
									<div class="overflow">
										<div class="icon icon1"></div>
										<h5>财富管理</h5>
									</div>
									<p>未来，我们会立足于大中华地区，放眼全球，进一步整合与吸纳全球最佳投资策略与投资工具，以中国经济的腾飞为契机，展望未来。</p>
								</div>
								<div class="about-do-thing">
									<div class="overflow">
									<div class="icon icon2"></div>
									<h5>资产配置</h5>
									</div>
									<p>未来，我们会立足于大中华地区，放眼全球，进一步整合与吸纳全球最佳投资策略与投资工具，以中国经济的腾飞为契机，展望未来。</p>
								</div>
							</div>
							<div class="overflow">
								<div class="about-do-thing">
									<div class="overflow">
									<div class="icon icon3"></div>
									<h5>投融资</h5>
									</div>
									<p>未来，我们会立足于大中华地区，放眼全球，进一步整合与吸纳全球最佳投资策略与投资工具，以中国经济的腾飞为契机，展望未来。</p>
								</div>
								<div class="about-do-thing">
									<div class="overflow">
									<div class="icon icon4"></div>
									<h5>保险</h5>
									</div>
									<p>未来，我们会立足于大中华地区，放眼全球，进一步整合与吸纳全球最佳投资策略与投资工具，以中国经济的腾飞为契机，展望未来。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="about-section2">
				<div class="about-section2-top">
					<div class="page-w relative overflow">
						<div class="pull-left">
							<div class="about-section-title">我们的<span>目的</span></div>
							<div class="m-t-8 text-justify" style="color:#d5d5d5;">万卓商学院是一个为学生提供商学院教育以及帮助学生关注现实世界的网站。商学院提供全身心投入或闲时投入的商学院课程。</div>
						</div>
						<a class="join-us">加入我们</a>
					</div>
				</div>
				<div class="page-w about-section2-2">
					<div class="about-section2-body">
						<div class="about-section-title">我们的<span>亮点</span></div>
						<div class="text-justify about-section2-intro">
							基础知识<br />
							在学生迈入工作之前，了解基本的知识是很重要的一件事。我们在万卓商学院为学生提供基础课程,以确保学生在工作生活中有足够的知识面去覆盖各种需要领导力
						</div>
						<div class="us-ld">
							<h5>国际范围和全球情报</h5>
							<ul class="list-unstyled overflow">
								<li>国内努力为学生带来最好</li>
								<li>为学生带来世界上最好</li>
								<li>为你带来来自世界的各种文化</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			@include('index.layout.footer')
		</div>
		<!--- container-wrap end ----->
	</div>
</body>
</html>
