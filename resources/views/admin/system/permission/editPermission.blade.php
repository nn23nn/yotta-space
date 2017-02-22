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
                                <a href="">编辑权限</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1>编辑权限</h1>
							</div>
							<div class="tile-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" action="/admin/system/permission/savePermission" method="post">
											{!! csrf_field() !!}
											<input type="hidden" name="id" value="{{ $data['permission']->id }}"/>
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
	                                            <label class="col-sm-3 control-label">权限名称</label>
	                                            <div class="col-sm-9">
	                                                <input type="text" class="form-control" placeholder="权限名称"  value="{{ $data['permission']->name }}" id="name" name="name" datatype="s4-18" errormsg="权限名称至少4个字符，最多18个字符！" nullmsg="请输入权限名称！">
	                                                <p class="help-block mb-0"></p>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">显示名称</label>
	                                            <div class="col-sm-9">
	                                            	<input type="text" class="form-control" placeholder="显示名称" value="{{ $data['permission']->display_name }}" id="display_name" name="display_name" datatype="s4-18" errormsg="显示名称至少4个字符，最多18个字符！" nullmsg="请输入显示名称！">
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">描述</label>
	                                            <div class="col-sm-9">
													<textarea class="form-control" placeholder="描述" id="description" name="description">{{ $data['permission']->description }}</textarea>	   
												</div>
	                                        </div>
	
	                                        <div class="form-group">
	                                            <label class="col-sm-3 control-label">权限分组</label>
	                                            <div class="col-sm-9">
	                                                <select class="form-control" name='group_id'>
	                                                	<option value="">请选择分组</option>
														@foreach($data['groupList'] as $group)
															<option value='{{ $group->id }}' @if($data['groupPermission']->group_id == $group->id) selected @endif >{{ $group->name }}</option>
														@endforeach
	                                                </select>
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
