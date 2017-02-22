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
					<h2>权限管理</h2>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
                                <a href=""><i class="fa fa-home"></i> 首页</a>
                            </li>
                            <li>
                                <a href="/admin/system/user">权限管理</a>
                            </li>
                            <li>
                                <a href="/admin/system/role">角色列表</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1><strong>角色列表</strong> </h1>
								<ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a href="/admin/system/role/create" role="button" tabindex="0">
                                                        <i class="fa fa-plus"></i> 增加角色
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
							</div>
							<div class="tile-body">
								<div class="table-responsive">
									<table data-filter="#filter" data-page-size="5" id="editable-usage" class="table table-custom">
										<thead>
	                                        <tr>
	                                            <th class="no-sort">角色名</th>
	                                            <th class="no-sort">角色描述</th>
	                                            <th data-hide="添加时间">添加时间</th>
	                                            <th data-hide="修改时间">修改时间</th>
	                                            <th class="no-sort">操作</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($roles as $role)
	                                    	<tr>
												<td>{{ $role->name }}</td>
												<td>{{ $role->description }}</td>
												<td>{{ $role->created_at }}</td>
												<td>{{ $role->updated_at }}</td>
												<td class="actions">
	                                            	<a role="button" tabindex="0" class="text-uppercase text-strong text-sm mr-10" href="/admin/system/role/edit/{{$role->id}}">更改</a>
	                                            	<a role="button" tabindex="0" class="text-danger text-uppercase text-strong text-sm" href="/admin/system/role/destroy/{{$role->id}}">删除</a>
	                                            </td>
	                                        </tr>
	                                        @endforeach
	                                    </tbody>
									</table>
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
