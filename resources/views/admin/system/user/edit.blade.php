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
                                <a href="/admin/system/user/edit/{{ $data['user']->id }}">编辑管理员</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1>编辑管理员</h1>
							</div>
							<div class="tile-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" role="form" id="formView" action="/admin/system/user/save" method="post">
											{!! csrf_field() !!}
											<input type="hidden" name="id" value="{{ $data['user']->id }}"/>
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
											<div class="alert alert-warning">
												<button data-dismiss="alert" class="close" type="button">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<span id="errormsg">如果不更新密码，请将密码项留空！</span>
												<br>
											</div>
											<div class="alert alert-danger hide">
												<button data-dismiss="alert" class="close" type="button">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<span id="errormsg"></span>
												<br>
											</div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">用户名</label>
	                                            <div class="col-sm-9">
	                                                <input type="text" class="form-control" placeholder="昵称" id="name" name="name" datatype="s4-18" errormsg="昵称至少4个字符，最多18个字符！" nullmsg="请输入昵称！"  value="{{ $data['user']->name }}"/>
	                                                <p class="help-block mb-0">Example block-level help text here.</p>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">email地址</label>
	                                            <div class="col-sm-9">
	                                                <input type="text" class="form-control"  placeholder="邮箱" id="email" name="email" datatype="e" errormsg="必须是邮箱地址！" nullmsg="请输入邮箱！"  value="{{ $data['user']->email }}"/>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">密码</label>
	                                            <div class="col-sm-9">
	                                                <input type="password" class="form-control"  placeholder="密码" id="password" name="password" datatype="*6-18" errormsg="密码范围在6~18位之间！" nullmsg="请输入密码！"  ignore="ignore"/>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">确认密码</label>
	                                            <div class="col-sm-9">
	                                                <input type="password" class="form-control"  placeholder="再输一次密码" id="repassword" name="repassword" datatype="*" recheck="password" errormsg="两次输入的密码不一致！" nullmsg="请填写与上面一致的密码！"  ignore="ignore"/>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">角色选择</label>
	                                            <div class="col-sm-9">
	                                                <select class="form-control"   name="role_id">
	                                                	<option value="">请选择角色</option>
														@foreach($data['roles'] as $role)
														<option value="{{ $role->id }}" @if($role->selected) selected="selected" @endif>{{ $role->name }}</option>
														@endforeach
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <div class="col-sm-offset-3 col-sm-9">
	                                                <button type="submit" class="btn btn-rounded btn-primary btn-sm">确定</button>
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
