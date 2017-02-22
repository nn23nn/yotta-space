@include('admin.layout.page-header')
<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
	<div style='margin:10px 10px 0px 10px'>
	<table class="table table-striped table-bordered table-hover table-sort" id="simple-table1" >
		
		<thead>
			<tr>
				<th >ID</th>
				<th >昵称</th>
				<th >邮箱</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($roleUserList as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
			
				<td>
					<div class="hidden-sm hidden-xs btn-group">
						@if(Entrust::can(['DEL_USER_ROLE']))
						<a class="red" href="#" onclick="multDel('/role/destoryUser/{{ $user->role_id }}', {{ $user->id }})">
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