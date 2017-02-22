<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal center" id="formView" action="admin/system/permission/saveGroupConfig" method="post">
				{!! csrf_field() !!}
				<input type="hidden" name="id" value="{{ $permission->id }}"/>
				<div class="alert alert-warning hide">
					<button data-dismiss="alert" class="close" type="button">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<span id="errormsg"></span>
					<br>
				</div>
				<div class="form-group">
					<label for="name" class="col-sm-4 control-label no-padding-right">权限分组名称：</label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-10" placeholder="权限名称" id="name" name="name" value="{{ $permission->name }}" datatype="s4-18" errormsg="权限名称至少4个字符，最多18个字符！" nullmsg="请输入权限名称！">
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