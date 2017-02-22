@include('admin.layout.page-header')
<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
	<form action="/category" onsubmit="return tblReload(this)" id="searchForm">
		<input type="hidden" name="page" id="page" value="{{ $categorys->currentPage() }}"/>
		<input type="hidden" name="orderby" id="orderby" value="{{ old('orderby', 'id') }}"/>
		<input type="hidden" name="sort" id="sort" value="{{ old('sort', 'desc') }}"/>
		<div class="row">
			<div class="col-xs-6">
				<div class="dataTables_length">
					<select id="field" name="field" class="form-control" style="height:34px; padding:4px 6px;">
						<option value="name" @if(old('field', 'name') == 'name')selected="selected"@endif>分类名称</option>
						<option value="alias" @if(old('field', 'name') == 'alias')selected="selected"@endif>别名</option>
					</select>
					<div class="input-group">
						<input type="text" placeholder="搜索内容" name="value" value="{{ old('value') }}" class="form-control search-query" style="margin-left: 0">
						<span class="input-group-btn">
							<button class="btn btn-purple btn-sm" type="submit">
								<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
								查询
							</button>
						</span>
					</div>
				</div>
				
			</div>
			<div class="col-xs-6">
				<div class="dataTables_filter">
					<label>每页显示 
					<select name="length" class="form-control input-sm" onchange="this.form.onsubmit()">
						<option value="10" @if(old('length') == 10)selected="selected"@endif>10</option>
						<option value="25" @if(old('length') == 25)selected="selected"@endif>25</option>
						<option value="50" @if(old('length') == 50)selected="selected"@endif>50</option>
						<option value="100" @if(old('length') == 100)selected="selected"@endif>100</option>
					</select> 条</label>
				</div>
			</div>
		</div>
	</form>
	<table class="table table-striped table-bordered table-hover table-sort" id="simple-table">
		<thead>
			<tr>
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace">
						<span class="lbl"></span>
					</label>
				</th>
				<th class="@if(old('orderby', 'id') == 'id') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="id" sort="{{ old('sort', 'desc') }}">ID</th>
				<th class="@if(old('orderby') == 'name') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="name" sort="{{ old('sort', 'desc') }}">分类名称</th>
				<th class="@if(old('orderby') == 'alias') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="alias" sort="{{ old('sort', 'desc') }}">别名</th>
				<th class="@if(old('orderby') == 'parent_id') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="parent_id" sort="{{ old('sort', 'desc') }}">父分类</th>
				<th class="@if(old('orderby') == 'status') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="status" sort="{{ old('sort', 'desc') }}">状态</th>
				<th class="@if(old('orderby') == 'created_at') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="created_at" sort="{{ old('sort', 'desc') }}">
					<i class="ace-icon fa fa-clock-o bigger-110"></i>
					创建日期
				</th>
				<th class="@if(old('orderby') == 'updated_at') sorting_{{ old('sort', 'desc') }} @else sorting @endif" orderby="updated_at" sort="{{ old('sort', 'desc') }}">
					<i class="ace-icon fa fa-clock-o bigger-110"></i>
					更新日期
				</th>
				<th>操作</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($categorys as $category)
			<tr>
				<td class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" name="ids[]" value="{{ $category->id }}">
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->alias }}</td>
				<td>{{ !empty($category->parent->name) ? $category->parent->name : '无' }}</td>
				<td>
					<label>
						<input type="checkbox" class="ace ace-switch ace-switch-6" @if($category->status) checked="true" @endif>
						<span class="lbl"></span>
					</label>
				</td>
				<td>{{ $category->created_at }}</td>
				<td>{{ $category->updated_at }}</td>
				<td>
					<div class="hidden-sm hidden-xs btn-group">
						@if(Entrust::can(['UP_ADMIN']))
						<button class="btn btn-xs btn-info" onclick="popform('/admin/category/edit/{{ $category->id }}', '编辑分类')">
							<i class="ace-icon fa fa-pencil bigger-120"></i>
						</button>
						@endif
						@if(Entrust::can(['DEL_ADMIN']))
						<button class="btn btn-xs btn-danger" onclick="multDel('/admin/category/destroy', {{ $category->id }})">
							<i class="ace-icon fa fa-trash-o bigger-120"></i>
						</button>
						@endif
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-6">
			@if(Entrust::can(['ADD_ADMIN']))
			<button class="btn btn-xs btn-info" onclick="popform('/admin/category/create', '添加分类')">
				<i class="ace-icon fa fa-plus bigger-120"></i>添加
			</button>
			@endif
			@if(Entrust::can(['DEL_ADMIN']))
			<button class="btn btn-xs btn-danger" onclick="multDel('/admin/category/destroy')">
				<i class="ace-icon fa fa-trash-o bigger-120"></i>删除
			</button>
			@endif
			<button class="btn btn-xs btn-success" onclick="tblReload()">
				<i class="ace-icon fa fa-refresh bigger-120"></i>重载
			</button>
			<button class="btn btn-xs btn-primary" onclick="popform('/admin/category/treeview', '树形查看')">
				<i class="ace-icon fa fa-sitemap bigger-120"></i>树形
			</button>
		</div>
		<div class="form-horizontal form-group col-xs-6 text-right">
			<div class="text-center dataTables_paginate pull-right">
				{!! with(new App\Presenter\JQTablePresenter($categorys))->render() !!}
			</div>
			<label class="control-label no-padding-right">显示 {{ $categorys->firstItem() }} 到 {{ $categorys->lastItem() }} 共 {{ $categorys->total() }} 条</label>
		</div>
	</div>
</div>
<script type="text/javascript">
$('.page-content-area[data-ace-ajax-content=true]').ace_ajax('loadScripts', [], function() {});
</script>