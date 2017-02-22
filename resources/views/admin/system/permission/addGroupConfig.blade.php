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
					<h2 style="display:none;">权限管理</h2>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
                                <a href=""><i class="fa fa-home"></i> 首页</a>
                            </li>
                            <li>
                                <a href="/admin/system/user/">权限管理</a>
                            </li>
                            <li>
                                <a href="/admin/system/user/create">添加管理员</a>
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
										<form class="form-horizontal" action="/admin/system/permission/saveGroupConfig" method="post">
											{!! csrf_field() !!}
											@if(!empty($errors->all()))
												<div class="alert alert-danger">
													<button data-dismiss="alert" class="close" type="button">
														<i class="ace-icon fa fa-times"></i>
													</button>
													@foreach($errors->all() as $error)
														{{ $error }} <br>
													@endforeach
												</div>
											@endif
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">权限分组名称</label>
	                                            <div class="col-sm-9">
													<input type="text" class="form-control" placeholder="权限分组名称" id="name" name="name" datatype="s4-18" errormsg="权限名称至少4个字符，最多18个字符！" nullmsg="请输入权限分组名称！">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <div class="col-sm-offset-3 col-sm-9">
	                                                <input type="submit" class="btn btn-rounded btn-primary btn-sm" value="确定">
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

@include('admin.layout.footer')
</body>
</html>
<script src="/assets/js/main.js"></script>