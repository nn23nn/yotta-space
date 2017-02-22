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
                                <a href="">权限列表</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1><strong>权限列表</strong></h1>
								<ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a href="/admin/system/permission/createPermission" role="button" tabindex="0">
                                                        <i class="fa fa-plus"></i> 添加权限
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
	                                            <th class="no-sort">权限代码</th>
	                                            <th class="no-sort">显示名称</th>
	                                            <th class="no-sort">描述</th>
	                                            <th data-hide="创建日期">创建日期</th>
	                                            <th data-hide="更新日期">更新日期</th>
	                                            <th class="no-sort">操作</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($permissions as $permission)
	                                    	<tr>
												<td>{{ $permission->name }}</td>
												<td>{{ $permission->display_name }}</td>
												<td>{{ $permission->description }}</td>
												<td>{{ $permission->created_at }}</td>
												<td>{{ $permission->updated_at }}</td>
	                                            <td class="actions">
	                                            	<a role="button" tabindex="0" class="text-uppercase text-strong text-sm mr-10" href="/admin/system/permission/editPermission/{{$permission->id}}">编辑</a>
	                                            	<a role="button" tabindex="0" class="text-danger text-uppercase text-strong text-sm" href="/admin/system/permission/destoryPermission/{{$permission->id}}"  onclick="if(!confirm('确定要删除吗?')){return false;}">删除</a>
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
