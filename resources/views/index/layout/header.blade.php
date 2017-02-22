<!------ 头部 start ------------>
		<div id="site-header">
			<div id="site-top">
				<div class="page-w overflow">
					<div class="site-top-login-line">
						<ul class="list-unstyled" id="site-login">
							@if(Session::get('uid'))
								<li><a href="/index/userCenter">{{Session::get('username')}}</a></li>
							@else
								<li><a href="/index/login">登入</a></li>
								<li><a href="/index/register">注册</a></li>
							@endif


							<li><a href="">中文</a></li>
						</ul>
						<div id="top-contact">
							<span>
								<i class="iconfont">&#xe603;</i>
								<span>(0086) 020-87576035</span>
							</span>
							<span class="email">
								<i class="iconfont">&#xe6bf;</i>
								<span>admin@hkmcg.cn</span>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div id="site-navs">
				<div class="overflow page-w">

					<ul class="list-unstyled" id="site-nav">
						<li><a href="/index/index">首页</a></li>
						<li><a href="/index/course">课程</a></li>
						<li><a href="/index/activity">课后活动</a></li>
						<!--<li><a href="discuss.php">课后聊</a></li>-->
						<li><a href="/index/about">关于我们</a></li>
						<li><a href="/index/contact">联系我们</a></li>
						<li><a href="javascript:;" class="iconfont">&#xe601;</a></li>
					</ul>
					<nav id="mobile-menu"><di/index/activity></div></nav>
				</div>
			</div>
			<div id="site-logo-div">
				<a id="site-logo">
					<img src="/assets/pic/logo.png" style="width:40%;"/>
				</a>
			</div>
		</div>
		<script>
			(function(){
				//滚动导航效果
				$(window).scroll(function(){
					var scrollTop = $(document).scrollTop();
					if(scrollTop > 0){
						$("#site-navs").addClass("scroll-active");
						if(scrollTop >= $("#site-top").outerHeight()){
							$("#site-header").addClass("up-hide");
						}else{
							$("#site-header").removeClass("up-hide");
						}
					}else{
						$("#site-navs").removeClass("scroll-active");
					}
				});
				$("#mobile-menu").on("click",function(){
					$(this).toggleClass("active");
					$("body").toggleClass("open-menu");
				});
			}())
		</script>
		<!------ 头部 end   ------------>