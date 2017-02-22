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
                                <a href="/admin/system/user">权限管理</a>
                            </li>
                            <li>
                                <a href="/admin/system/role/create">添加角色</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1>添加角色</h1>
							</div>
							<div class="tile-body">
								<div class="row">
									<div class="col-md-10">
										<form class="form-horizontal center" id="formView" action="/admin/system/role/save" method="post">
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
											@endif	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">角色名</label>
	                                            <div class="col-sm-6">
	                                                <input type="text" class="form-control" placeholder="角色名称" id="name" name="name" datatype="s4-18" errormsg="显示名称至少4个字符，最多18个字符！" nullmsg="请输入角色名称！"/>
	                                            </div>
	                                        </div><!-- 
											<div class="form-group">
												<label class="col-sm-2 control-label">描述</label>
												<div class="col-sm-8">
													<textarea class="form-control" placeholder="描述" id="description" name="description"></textarea>
												</div>
											</div> -->
	                                        <div class="form-group">
	                                        	@foreach ($groupList as $group)
	                                        	<label class="col-sm-2 control-label">{{ $group->name }}</label>
	                                        	<input type="hidden" name="group_ids[]" value="{{ $group->group_id }}">
	                                        	<div class="col-sm-2">
	                                        		@foreach($group->permission as $key=>$permission)
													@if($key == 0 || $key % 4 == 0)
													<p class="pos-rel">
													@endif
	                                        		<label class="checkbox checkbox-custom-alt">
	                                                    <input type="checkbox"  name="permissions[]"  value="{{ $permission->id }}"  @if($permission->checked) checked="checked" @endif><i></i> {{ $permission->display_name }}
	                                                </label>
	                                                @if(($key + 1) % 4 == 0)
														</p>
													@endif	
													@endforeach
	                                                
	                                        	</div>
	                                        	@endforeach
	                                        	
	                                        </div>
	                                        <div class="form-group">
	                                            <div class="col-sm-offset-2 col-sm-9">
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
