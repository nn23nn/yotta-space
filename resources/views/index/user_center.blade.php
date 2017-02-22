
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
					<a>个人中心</a>
				</nav>
			</div>
			<div class="inner-body page-w user-center my-center" style="margin-top:20px">
				<div class="inner-left">
					<div class="overflow relative">
						<div class="user-header">
							<div><div></div></div>
						</div>
						<h4 class="user-mobile-name">{{Session::get('username')}}</h4>
						<div class="user-intro">
							<h4>{{Session::get('username')}}</h4>
							<form>
								<textarea></textarea>
								<button class="self-btn m-t-5">提交</button>
							</form>
						</div>
						<div class="user-other">
							<div class="user-balance">余额<div>$1200</div></div>
							<div class="overflow do-buys"><a class="self-btn">充值</a><a class="self-btn">提现</a></div>
						</div>
					</div>
					<!--------- 手机端显示 start ---------------->
					<div id="mobile-area">
						<div class="user-harvest">
							<header>
								<i class="iconfont">&#xe61c;</i>
								<div class="pull-left">获得成就</div>
							</header>
							<section>
								<div id="user-achieve-mobile" class="user-achieve">
									<div id="achieve-items-mobile" class="achieve-items">
										<div class="item">
											<img src="/assets/0.jpg" />
											<p class="ellipsis">完成学时24小时</p>
										</div>
										<div class="item">
											<img src="/assets/0.jpg" />
											<p class="ellipsis">完成学时24小时</p>
										</div>
										<div class="item">
											<img src="/assets/0.jpg" />
											<p class="ellipsis">完成学时24小时</p>
										</div>
										<div class="item">
											<img src="/assets/0.jpg" />
											<p class="ellipsis">完成学时24小时</p>
										</div>
									</div>
								</div>
								<script>
									(function(){
										var aowl = $("#achieve-items-mobile");
										aowl.owlCarousel({
											autoPlay: false,
											itemsCustom : [
												[350,3],
												[320,2]
											],
											pagination : false,
											navigation : false
										});
									}())
								</script>
							</section>
						</div>
						<div class="user-harvest m-t-35">
							<header>
								<i class="iconfont">&#xe606;</i>
								<div class="pull-left">我的证书</div>
							</header>
							<section>
								<ul class="list-unstyled user-certificate">
									<li><span>1</span>完成实战营销课程</li>
									<li><span>2</span>完成实战营销课程</li>
									<li><span>3</span>完成实战营销课程</li>
									<li><span>4</span>完成实战营销课程</li>
								</ul>
							</section>
						</div>
						<div class="rank-container m-t-35">
							<ul class="list-unstyled rank-toggle">
								<li class="item active">关注&nbsp;&nbsp;20</li>
								<li class="item">粉丝&nbsp;&nbsp;10</li>
							</ul>
							<div class="rank-body">
								<div class="rank-item">
									<div class="news-list">
										<a>
											<span>1</span>
											<span class="ellipsis">中大</span>
										</a>
										<a>
											<span>2</span>
											<span class="ellipsis">中大</span>
										</a>
										<a>
											<span>2</span>
											<span class="ellipsis">中大</span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--------- 手机端显示 end------------------->
					<div class="module-block teacher-module">
						<div class="module-title">
							<h3>课程</h3>
						</div>
						<ul class="inner-filter-nav list-unstyled">
							<li><a>全部（120）</a></li>
							<li class="active"><a>正在进行</a></li>
							<li><a>即将开始</a></li>
							<li><a>已结束</a></li>
						</ul>
						<div class="inner-main">
							<div class="overflow">
								<ul class="list-unstyled">
									<li class="inner-item">
										<div class="image-text">
											<a class="overflow block relative">
												<div class="date-icon">
													<div>12<br><span>JAV</span></div>
												</div>
												<img src="t.jpg" />
												<div class="text">
													<h5 class="theacher-name">Mkie Lu 卢只想</h5>
													<div class="theacher-title">香港万卓集团副总裁暨创富项目总监</div>
													<p class="theacher-desc">中国国家高级贵金属分析师,中国私人财富高级咨询师,香港国际投资协会特邀讲师。近十年来频繁被邀请自全国各地巡回授课，曾任多家投资理财媒体客座讲师同时担任国内多家知名投资企业的长期签约顾问</p>
												</div>
											</a>
										</div>
										<div class="data-items">
											<div class="data-item data-location">
												<div class="iconfont">&#xe715;</div>
												<div class="data-text"><span>地点：</span><br/>全国</div>
											</div>
											<div class="data-item data-time">
												<div class="iconfont">&#xe629;</div>
												<div class="data-text"><span>时间：</span><br/>进行至第2周</div>
											</div>
											<div class="data-item data-persons">
												<div class="iconfont">&#xe604;</div>
												<div class="data-text"><span>参加人数：</span><br/>333333人</div>
											</div>
										</div>
									</li>
									<li class="inner-item">
										<div class="image-text">
											<a class="overflow block relative">
												<div class="date-icon">
													<div>12<br><span>JAV</span></div>
												</div>
												<img src="/assets/t.jpg" />
												<div class="text">
													<h5 class="theacher-name">Mkie Lu 卢只想</h5>
													<div class="theacher-title">香港万卓集团副总裁暨创富项目总监</div>
													<p class="theacher-desc">中国国家高级贵金属分析师,中国私人财富高级咨询师,香港国际投资协会特邀讲师。近十年来频繁被邀请自全国各地巡回授课，曾任多家投资理财媒体客座讲师同时担任国内多家知名投资企业的长期签约顾问</p>
												</div>
											</a>
										</div>
										<div class="data-items">
											<div class="data-item data-location">
												<div class="iconfont">&#xe715;</div>
												<div class="data-text"><span>地点：</span><br/>全国</div>
											</div>
											<div class="data-item data-time">
												<div class="iconfont">&#xe629;</div>
												<div class="data-text"><span>时间：</span><br/>进行至第2周</div>
											</div>
											<div class="data-item data-persons">
												<div class="iconfont">&#xe604;</div>
												<div class="data-text"><span>参加人数：</span><br/>333333人</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="inner-right">
					<div class="user-harvest">
						<header>
							<i class="iconfont">&#xe61c;</i>
							<div class="pull-left">获得成就</div>
						</header>
						<section>
							<div id="user-achieve" class="user-achieve">
								<a href="javascript:;" class="iconfont prev">&#xe716;</a>
								<a href="javascript:;" class="iconfont next">&#xe612;</a>
								<div id="achieve-items" class="achieve-items">
									<div class="item">
										<img src="/assets/0.jpg" />
										<p class="ellipsis">完成学时24小时</p>
									</div>
									<div class="item">
										<img src="/assets/0.jpg" />
										<p class="ellipsis">完成学时24小时</p>
									</div>
									<div class="item">
										<img src="/assets/0.jpg" />
										<p class="ellipsis">完成学时24小时</p>
									</div>
									<div class="item">
										<img src="/assets/0.jpg" />
										<p class="ellipsis">完成学时24小时</p>
									</div>
								</div>
							</div>
							<script>
								var aowl = $("#achieve-items");
								aowl.owlCarousel({
									autoPlay: false, //Set AutoPlay to 3 seconds
									singleItem:true, 
									pagination : false,
									navigation : false
								});
								$("#user-achieve").on("click",".iconfont",function(){
							  		if($(this).hasClass("prev")){
							  			aowl.trigger("owl.prev");
							  		}else{
							  			aowl.trigger("owl.next");
							  		}
							  	});
							</script>
						</section>
					</div>
					<div class="user-harvest m-t-35">
						<header>
							<i class="iconfont">&#xe606;</i>
							<div class="pull-left">我的证书</div>
						</header>
						<section>
							<ul class="list-unstyled user-certificate">
								<li><span>1</span>完成实战营销课程</li>
								<li><span>2</span>完成实战营销课程</li>
								<li><span>3</span>完成实战营销课程</li>
								<li><span>4</span>完成实战营销课程</li>
							</ul>
						</section>
					</div>
					<div class="rank-container m-t-35">
						<ul class="list-unstyled rank-toggle">
							<li class="item active">关注&nbsp;&nbsp;20</li>
							<li class="item">粉丝&nbsp;&nbsp;10</li>
						</ul>
						<div class="rank-body">
							<div class="rank-item">
								<div class="news-list">
									<a>
										<span>1</span>
										<span class="ellipsis">中大</span>
									</a>
									<a>
										<span>2</span>
										<span class="ellipsis">中大</span>
									</a>
									<a>
										<span>2</span>
										<span class="ellipsis">中大</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="page-w">
				<div class="module-block teacher-module">
					<div class="module-title">
						<h3>动态</h3>
						<div class="teacher-toggles">
							<a href="javascript:;" class="prev iconfont">&#xe600;</a>
							<a href="javascript:;" class="next iconfont">&#xe717;</a>
						</div>
					</div>
					<div class="module-body">
						<div id="teacher-block" class="owl-carousel owl-theme">
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>ROMWS 陈老师</h4>
									<div class="teacher-title">香港大学动手</div>
								</div>
								<ul class="teacher-data list-unstyled">
									<li>
										<span><i class="iconfont">&#xe604;</i>48</span>
										<span style="margin:0 8px">|</span>
										<span><i class="iconfont">&#xe602;</i>32</span>
									</li>
									<li>
										<a>Join Now</a>
									</li>
									<li>$150</li>
								</ul>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>ROMWS 陈老师</h4>
									<div class="teacher-title">香港大学动手</div>
								</div>
								<ul class="teacher-data list-unstyled">
									<li>
										<span><i class="iconfont">&#xe604;</i>48</span>
										<span style="margin:0 8px">|</span>
										<span><i class="iconfont">&#xe602;</i>32</span>
									</li>
									<li>
										<a>Join Now</a>
									</li>
									<li>$150</li>
								</ul>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>ROMWS 陈老师</h4>
									<div class="teacher-title">香港大学动手</div>
								</div>
								<ul class="teacher-data list-unstyled">
									<li>
										<span><i class="iconfont">&#xe604;</i>48</span>
										<span style="margin:0 8px">|</span>
										<span><i class="iconfont">&#xe602;</i>32</span>
									</li>
									<li>
										<a>Join Now</a>
									</li>
									<li>$150</li>
								</ul>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>ROMWS 陈老师</h4>
									<div class="teacher-title">香港大学动手</div>
								</div>
								<ul class="teacher-data list-unstyled">
									<li>
										<span><i class="iconfont">&#xe604;</i>48</span>
										<span style="margin:0 8px">|</span>
										<span><i class="iconfont">&#xe602;</i>32</span>
									</li>
									<li>
										<a>Join Now</a>
									</li>
									<li>$150</li>
								</ul>
							</div>
							<div class="item teacher-item">
								<div class="block overflow">
									<img src="/assets/4.jpg" class="w-100 block"/>
								</div>
								<div class="teacher-infos">
									<h4 class='teacher-name'>ROMWS 陈老师</h4>
									<div class="teacher-title">香港大学动手</div>
								</div>
								<ul class="teacher-data list-unstyled">
									<li>
										<span><i class="iconfont">&#xe604;</i>48</span>
										<span style="margin:0 8px">|</span>
										<span><i class="iconfont">&#xe602;</i>32</span>
									</li>
									<li>
										<a>Join Now</a>
									</li>
									<li>$150</li>
								</ul>
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
			@include('index.layout.footer')
		</div>
		<!--- container-wrap end ----->
	</div>
</body>
</html>
