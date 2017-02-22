@include('admin.layout.page-header')
<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
	<div style='margin:10px 10px 0px 10px'>
	<table class="table table-striped table-bordered table-hover table-sort" id="simple-table1" >
		
		<thead>
			<tr>
				<th >ID</th>
				<th>权限代码</th>
				<th>显示名称</th>
				<th>描述</th>
				<th>
					<i class="ace-icon fa fa-clock-o bigger-110"></i>
					创建日期
				</th>
				<th >
					<i class="ace-icon fa fa-clock-o bigger-110"></i>
					更新日期
				</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($permissions as $permission)
			<tr>
				<td>{{ $permission->id }}</td>
				<td>{{ $permission->name }}</td>
				<td>{{ $permission->display_name }}</td>
				<td>{{ $permission->description }}</td>
				<td>{{ $permission->created_at }}</td>
				<td>{{ $permission->updated_at }}</td>
				<td style='width:50px'>
					<div class="hidden-sm hidden-xs btn-group">
						
						@if(Entrust::can(['UP_PERMISSION']))
						<a class="green" href="#" onclick="popform('/admin/system/permission/editPermission/{{ $permission->id }}', '编辑权限')">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						@endif
						
						@if(Entrust::can(['DEL_PERMISSION']))
						<a class="red" href="#" onclick="multDel('/admin/system/permission/destoryPermission',{{ $permission->id }})">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
					    @endif
					    
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript">
$('.page-content-area[data-ace-ajax-content=true]').ace_ajax('loadScripts', [], function() {});
</script>