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
                                <a href="/admin/system/role/edit/{{$data['role']->id}}">编辑角色</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1>编辑角色</h1>
							</div>
							<div class="tile-body">
								<div class="row">
									<div class="col-md-10">
										<form class="form-horizontal center" id="formView" action="/admin/system/role/save" method="post">
											{!! csrf_field() !!}
											<div class="alert alert-danger hide">
												<button data-dismiss="alert" class="close" type="button">
													<i class="ace-icon fa fa-times"></i>
												</button>
												<span id="errormsg"></span>
												<br>
											</div>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">角色名</label>
	                                            <div class="col-sm-6">
	                                                <input type="text" class="form-control" placeholder="角色名称" id="display_name" name="display_name" datatype="s4-18" errormsg="显示名称至少4个字符，最多18个字符！" nullmsg="请输入角色名称！"  value="{{ $data['role']->name }}"/>
	                                                <p class="help-block mb-0">Example block-level help text here.</p>
	                                            </div>
	                                        </div>
	                                        <div class="form-group">
	                                        	@foreach ($data['groupList'] as $group)
	                                        	<label class="col-sm-2 control-label">{{ $group->name }}</label>
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
