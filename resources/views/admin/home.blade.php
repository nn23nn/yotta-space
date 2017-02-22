@include('admin.layout.head')
</head>
<body id="minovate" class="appWrapper">
	<div id="wrap" class="animsition">
		@include('admin.layout.header')
		<div id="controls">
		@include('admin.layout.sidebar')
		</div>
		<section id="content">
			<div class="page page-dashboard">
				<div class="pageheader">
					<h2 style="display:none;">课程管理</h2>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
                                <a href=""><i class="fa fa-home"></i> 首页</a>
                            </li>
                            <li>
                                <a href="">课程管理</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1>添加管理员</h1>
							</div>
							<div class="tile-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" role="form">
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">用户名</label>
	                                            <div class="col-sm-9">
	                                                <input type="email" class="form-control"/>
	                                                <p class="help-block mb-0">Example block-level help text here.</p>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">email地址</label>
	                                            <div class="col-sm-9">
	                                                <input type="password" class="form-control" />
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">密码</label>
	                                            <div class="col-sm-9">
	                                                <input type="password" class="form-control" />
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">确认密码</label>
	                                            <div class="col-sm-9">
	                                                <input type="password" class="form-control" />
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">用户id</label>
	                                            <div class="col-sm-9">
	                                                <input type="text" class="form-control" />
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">角色选择</label>
	                                            <div class="col-sm-9">
	                                                <select class="form-control">
	                                                	<option>请选择</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <div class="col-sm-offset-3 col-sm-9">
	                                                <button type="button" class="btn btn-rounded btn-primary btn-sm">确定</button>
	                                            </div>
	                                        </div>
	                                    </form>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>
@include('admin.layout.sidebar')
</body>
</html>
<script src="/assets/js/main.js"></script>