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
                                <a href="">权限管理</a>
                            </li>
                            <li>
                                <a href="/admin/system/user">管理员列表</a>
                            </li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<section class="tile">
							<div class="tile-header dvd dvd-btm">
								<h1><strong>管理员列表</strong></h1>
								<ul class="controls">
                                        <li class="dropdown">

                                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                                <i class="fa fa-cog"></i>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                                <li>
                                                    <a href="/admin/system/user/create" role="button" tabindex="0">
                                                        <i class="fa fa-plus"></i> 增加管理员
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
	                                            <th class="no-sort">用户名</th>
	                                            <th class="no-sort">Emain地址</th>
	                                            <th data-hide="加入时间">加入时间</th>
	                                            <th data-hide="最后登录时间">最后登录时间</th>
	                                            <th class="no-sort">操作</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    	@foreach($users as $user)
	                                    	<tr>
	                                            <td>{{$user->name}}</td>
	                                            <td>{{$user->email}}</td>
	                                            <td>{{$user->created_at}}</td>
	                                            <td>{{$user->updated_at}}</td>
	                                            <td class="actions">
	                                            	<a role="button" tabindex="0" class="text-uppercase text-strong text-sm mr-10" href="/admin/system/user/edit/{{$user->id}}">更改</a>
	                                            	<a role="button" tabindex="0" class="text-danger text-uppercase text-strong text-sm" href="/admin/system/user/destroy/{{$user->id}}"  onclick="if(!confirm('确定要删除吗?')){return false;}">删除</a>
	                                            </td>
	                                        </tr>
	                                        @endforeach
	                                    </tbody>
									</table>
								</div>
							</div>
							<div class="form-horizontal form-group col-xs-6 text-right">
								<div class="text-center dataTables_paginate pull-right">
									{!! with(new App\Presenter\JQTablePresenter($users))->render() !!}
								</div>
								<label class="control-label no-padding-right">显示 {{ $users->firstItem() }} 到 {{ $users->lastItem() }} 共 {{ $users->total() }} 条</label>
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