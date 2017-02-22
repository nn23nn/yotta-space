<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal center" id="formView" action="/permission/savePermission" method="post">
				{!! csrf_field() !!}
				<div class="alert alert-danger hide">
					<button data-dismiss="alert" class="close" type="button">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<span id="errormsg"></span>
					<br>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label no-padding-right">权限名称：</label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-10" placeholder="权限名称" id="name" name="name" datatype="s4-18" errormsg="权限名称至少4个字符，最多18个字符！" nullmsg="请输入权限名称！">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-4 control-label no-padding-right">显示名称：</label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-10" placeholder="显示名称" id="display_name" name="display_name" datatype="s4-18" errormsg="显示名称至少4个字符，最多18个字符！" nullmsg="请输入显示名称！">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-4 control-label no-padding-right">描述：</label>
					<div class="col-sm-8">
						<textarea class="col-xs-10 col-sm-10" placeholder="描述" id="description" name="description"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-4 control-label no-padding-right">权限分组：</label>
					<div class="col-sm-8">
						<select class="col-xs-10 col-sm-10" placeholder="权限分组" name='group_id'>
						<option value=0>请选择分组</option>
						@foreach($groupList as $group)
							<option value='{{ $group->id }}'>{{ $group->name }}</option>
						@endforeach
						</select>
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