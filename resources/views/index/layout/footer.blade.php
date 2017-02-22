<!------- 联系 start ---------------->
			<div class="overflow;" style="background:black;margin-top:20px;">
				<div class="page-w">
					<ul class="list-unstyled" id="contact-items">
						<li class="contact-item">
							<img src="/assets/pic/logo.png" style="width: 20%;"/>
							<!-- <div class='contact-type-text'>這開始我的方式到空氣是甜的，你可以告訴我怎麼得到</div> -->
							<ul class="list-unstyled email-tel">
								<li>
									<span class="iconfont middle">&#xe715;</span>
									<div>中国广东省广州市天河区维多利广场A塔3601-3602</div>
								</li>
								<li>
									<span class="iconfont middle">&#xe603;</span>
									<div>(0086) 020 - 87576035</div>
									<div>(0086) 020 - 87572634</div>	
								</li>
								<li>
									<span class="iconfont middle">&#xe6bf;</span>
									<div>admin@hkmcg.cn</div>	
								</li>
							</ul>
						</li>
						<li class="contact-item">
							<dl class="support-files">
								<dt class="dt">友情链接</dt>
								<dd><a class="color-white" href="http://www.majestyhk.com/index.html">万卓集团</a></dd>
							</dl>
						</li>
						<li class="contact-item">
							<div class="weibos">
								<div class="dt">媒体</div>
								<div class="overflow">
									<div class="weibo-item"><img src="/assets/pic/8-1.png"/></div>
									<div class="weibo-item"><img src="/assets/pic/8-2.png"/></div>
									<div class="weibo-item"><img src="/assets/pic/8-3.png"/></div>
									<div class="weibo-item" id="wechat" style="float: none;width: 200px;display: none;"><img src="/assets/pic/8-3.png"></div>
								</div>
							</div>
						</li>
						<li class="contact-item">
							<div class="order-read">
								<div class="dt">订阅</div>
								<p class="color-white">获取更多关于我们的信息</p>
								<form>
									<input placeholder="email地址" type=""/>
									<button><i class="iconfont">&#xe605;</i></button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<!------- 联系 end ------------------>
			<script>
				$(document).ready(function(){
					$(".weibo-item").mouseover(function(){
						$("#wechat").show();
							$(".weibo-item").mouseout(function(){
								$("#wechat").hide();
							});
					});
				})
			</script>
			