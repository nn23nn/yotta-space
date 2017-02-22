
@include('index.layout.head')
</head>
<body class="fixed-header">
	
	@include('index.layout.aside_menu')
	<div class="page-wrap">
	@include('index.layout.header')
		
		<!--- container-wrap start --->
		<div class="container-wrap">
			<!------ 轮播图 start ---------->
			<div id="index-focus">
<!-- 				<a href="javascript:;" class="self-owl-controls prev">
					<span class="control-pic"></span>
					<div class="control-icon">P<br/>R<br/>E<br/>V</div>
				</a>
				<a href="javascript:;" class="self-owl-controls next">
					<div class="control-icon">N<br/>E<br/>X<br/>T</div>
					<span class="control-pic"></span>
				</a> -->
				<div class="owl-carousel owl-theme">
					<div class="item index-focus-item">
						<a class="block w-100 h-100" style="background:url(/assets/pic/2.jpg) no-repeat center;background-size:cover;"></a>
						<div class="index-focus-mark" style="z-index:1;">
							<div class="mark1">万卓商学院致力于给你一个</div>
							<div class="mark2">好的未来</div>
							<div class="mark3">以实践经验为切入点，让你理论实践双丰收！</div>
							<div class="mark4">
								<a href="teacher.php">教师</a>
								<a href="course.php">课程</a>
							</div>
						</div>
						<div class="index-focus-mark" style="width: 100%;height: 30%;opacity: 0.5;background-color:grey;">
							</div>
						</div>
					</div>
<!-- 					<div class="item index-focus-item">
						<a class="block w-100 h-100" style="background:url(pic/2.jpg) no-repeat center;background-size:cover;"></a>
					</div> -->
				</div>
			</div>
			<!------ 轮播图 end   ---------->
			<!------ 三块 start ------------>
			<div id="small-link-3">
				<ul class="list-unstyled small-link-items">
					<li>
						<div class="title">
							<img src="/assets/8.jpg" />
							<img src="/assets/9.jpg" />
							<h4>专业资格的老师</h4>
						</div>
						<ul class="list-unstyled"><li>你能告訴我如去芝麻街來敲我們的門</li><li><a>[...]</a></li></ul>
					</li>
					<li>
						<div class="title">
							<img src="/assets/8.jpg" />
							<img src="/assets/9.jpg" />
							<h4>专业资格的老师</h4>
						</div>
						<ul class="list-unstyled"><li>你能告芝麻街來敲我們的門</li><li><a>[...]</a></li></ul>
					</li>
					<li>
						<div class="title">
							<img src="/assets/8.jpg" />
							<img src="/assets/9.jpg" />
							<h4>专业资格的老师</h4>
						</div>
						<ul class="list-unstyled"><li>你能告訴何去芝麻街來敲我們的門</li><li><a>[...]</a></li></ul>
					</li>
				</ul>
			</div>
			<!------ 三块 end -------------->
			<!------- 老师模块 start---------------->
			<div class="page-w">
				<div class="module-block teacher-module">
					<div class="module-title">
						<h3>教师</h3>
						<div class="teacher-words">实践经验丰富的教师们</div>
						<div class="teacher-toggles">
							<a href="javascript:;" class="prev iconfont">&#xe600;</a>
							<a href="javascript:;" class="next iconfont">&#xe717;</a>
						</div>
					</div>
					<div class="module-body">
						<div id="teacher-block" class="owl-carousel owl-theme">
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/pic/3-1.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>DR. Paul Lam 林旭博士</h4>
									<div class="teacher-title">香港万卓集团董事长兼执行总裁</div>
								</div>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/pic/3-2.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>Raymond Leung 梁培基</h4>
									<div class="teacher-title">香港万卓集团副董事长暨总裁</div>
								</div>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/pic/3-3.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>Mike Lu 卢志烽</h4>
									<div class="teacher-title">香港万卓集团副总裁暨创富项目总监</div>
								</div>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/pic/3-4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>Rome Chan 陈昊君</h4>
									<div class="teacher-title">香港万卓集团传承学院总监</div>
								</div>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/pic/3-5.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>Brandon Cheung 张濠慈</h4>
									<div class="teacher-title">海通国际证券市场推广副总裁</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				(function(){
					var towl = $("#teacher-block");
					towl.owlCarousel({
						autoPlay: false, //Set AutoPlay to 3 seconds
						  itemsCustom : [
							[1024,4],
							[768,3],
							[0,1]
						  ],
						  pagination : false,
						  navigation : false
					});
					$(".teacher-toggles").on("click","a",function(){
				  		if($(this).hasClass("prev")){
				  			towl.trigger("owl.prev");
				  		}else{
				  			towl.trigger("owl.next");
				  		}
				  	});
				}())
			</script>
			<!------- 老师模块 end---------------->
			<!------- 精品课程 start ------------>
			<div id="best-course-section">
				<div class="page-w">
					<div class="module-block">
						<h5 class="module-title color-white">精品课程</h5>
						<div class="module-body">
							<div class="best-course relative">
								<div id="course-select" class="course-select owl-carousel">
									<div class="item">传承学院</div>
									<div class="item">传承学院</div>
									<div class="item">传承学院</div>
									<div class="item">传承学院</div>
									<div class="item">传承学院</div>
								</div>
								<script>
									$("#course-select").owlCarousel({
										  //autoPlay: false, //Set AutoPlay to 3 seconds
										  itemsCustom : [
											[0,4],
											[768,7]
										  ],
										  pagination : false,
										  navigation : false
									 });
								</script>
								<ul class='list-unstyled pc-course-select'>
									<li class="active"><i class="iconfont">&#xe715;</i>IBOSS</li>
									<li><i class="iconfont">&#xe715;</i>传承学院</li>
									<li><i class="iconfont">&#xe715;</i>商学院</li>
									<li><i class="iconfont">&#xe715;</i>专业考试</li>
								</ul>
								<div class='course-container'>
									<div class="course-items">
										<div class='course-item'>
											<div class="overflow">
												<a class='block course-pic'>
													<img class='block w-100' src="/assets/pic/4.jpg"/>
												</a>
												<div class="course-detail color-white">
													<h5 class='course-name color-white'>丰盛人生</h5>
													<div class="course-teacher">香港万卓集團傳承學院總監<span>陈旭军</span></div>
													<p class='text-justify color-white'>本课程帮助你找到人生的出口，如何实现财富自由；帮助你建立良好的人脉关系，赢得名声；帮助你保持一种积极进取的心境，认识自己、悦纳自己；帮助你描绘出快意的人生蓝图，让生活......</p>
													<ul class="course-datas overflow list-unstyled">
														<li>
															<i class="iconfont">&#xe715;</i>
															<div>已有10人参加</div>
														</li>
														<li>
															<i class="iconfont">&#xe715;</i>
															<div>课程共21周，进行至第10周</div>
														</li>
														<li>
															<i class="iconfont">&#xe715;</i>
															<div>已发布：10个章节5个测验1个考试</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!------- 精品课程 end ------------>
			<!------- 精品活动 start ------------>
			<div class="page-w">
				<div class="module-block">
					<h3 class="module-title">精品活动</h3>
					<div class="module-body">
						<div class="overflow" id="best-activity">
							<div class="best-activity-main">
								<a class="block"><img class="w-100 block" src="/assets/pic/6.jpg"/></a>
								<div class='act-infos'>
									<h5>香港游学</h5>
									<div>参与人数：12.6万</div>
								</div>
							</div>
							<div class="best-activity-others">
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-1.jpg"/></a>
										<div class='act-infos'>
										<h5>贵金属交易大赛</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-2.jpg"/></a>
										<div class='act-infos'>
										<h5>模拟外汇交易大赛</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-3.jpg"/></a>
										<div class='act-infos'>
										<h5>日本游学</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-4.jpg"/></a>
										<div class='act-infos'>
										<h5>创业交流讲座</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-5.jpg"/></a>
										<div class='act-infos'>
										<h5>职业规划分享</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
								<div class="best-activity-other">
									<a class="block"><img class="w-100 block" src="/assets/pic/7-6.jpg"/></a>
										<div class='act-infos'>
										<h5>营销时间分享</h5>
										<div>参与人数：12.6万</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!------- 精品活动 end -------------->
	
			@include('index.layout.footer')
		</div>
		<!--- container-wrap end ------>
	</div>
</body>
</html>
<script>
	(function(){
		var owl = $("#index-focus .owl-carousel");
		var thumbSlides = ["7.jpg","77.jpg"];
		owl.owlCarousel({
			singleItem:true,
			pagination : false,
			navigation : false,
			beforeInit : function(){
				var h = $(window).height();
				$(".index-focus-item").css({height:h+"px"});
				$(".control-pic").css({backgroundImage:"url("+thumbSlides[0]+")"});
				
				var dstH = $("#small-link-3").outerHeight();
				$("#small-link-3").css({top:h - dstH - 20+"px"});
			},
			beforeUpdate : function(){
				var h = $(window).height();
				$(".index-focus-item").css({height:h+"px"});
				
				var dstH = $("#small-link-3").outerHeight();
				$("#small-link-3").css({top:h - dstH - 20+"px"});
			},
			afterMove : function(e){
				$(".control-pic").css({backgroundImage:"url("+thumbSlides[e.currentItem]+")"});
			}
		});
		
	}());
</script>