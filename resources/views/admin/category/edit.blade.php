<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal center" id="formView" action="/admin/category/save" method="post">
				{!! csrf_field() !!}
				<input type="hidden" id="id" name="id" value="{{ $category->id }}"/>
				<div class="alert alert-danger hide">
					<button data-dismiss="alert" class="close" type="button">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<span id="errormsg"></span>
					<br>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label no-padding-right">父分类：</label>
					<div class="col-sm-8 text-left">
						<select name="pid" id="pid">
							<option value="0">顶级分类</option>
							@foreach($categories as $cat)
							<option value="{{ $cat['id'] }}" @if($category->parent_id == $cat['id']) selected="true" @endif>{{ $cat['html'].$cat['name'] }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label no-padding-right">分类名称：</label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-10" placeholder="分类名称" id="name" name="name" value="{{ $category->name}}" datatype="s4-50" errormsg="分类至少4个字符，最多50个字符！" nullmsg="请输入分类名称！">
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label no-padding-right">别名：</label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-10" placeholder="别名" id="alias" name="alias" value="{{ $category->alias}}" datatype="s4-50" errormsg="分类别名至少4个字符，最多50个字符！" nullmsg="请输入分类别名！">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-4 control-label no-padding-right">状态：</label>
					<div class="col-sm-8 align-left" style="padding-top:8px">
						<input type="checkbox" class="ace ace-switch ace-switch-6" @if($category->status) checked="true" @endif name="status"/>
						<span class="lbl"></span>
					</div>
				</div>

				<div class="clearfix center">
					<button type="submit" class="btn btn-sm btn-info">
						<i class="ace-icon fa fa-check"></i>
						<span id="submsg">提交</span>
					</button>
					&nbsp; &nbsp; &nbsp;
					<button type="reset" class="btn btn-sm">
						<i class="ace-icon fa fa-undo"></i>
						重置
					</button>
				</div>
			</form>
		</div>
	</div>
</div>