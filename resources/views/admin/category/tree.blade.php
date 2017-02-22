<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<ul id="cattree"></ul>
		</div>
	</div>
</div>
<script src="/assets/js/fuelux/fuelux.tree.min.js"></script>
<script type="text/javascript">
	var tree = $('#cattree').ace_tree({
		dataSource: function(options, callback) {
			var parentId = 0;
			if("type" in options && options.type == "folder") {
				if ("attr" in options) {
					parentId = options.attr['id'];
				}
				if ("children" in options) {
					callback({data: options.children});
					return;// 直接返回不从服务器请求数据
				}
			}
			var success = function(data) {
				$(data).each(function() {
					if (this.attr.selected) {
		                this.attr.className = 'tree-selected';
		                this.attr['data-icon'] = 'ace-icon fa fa-check';
					}
	                return this;
		        });
				callback({data: data});
			}
			ajax("/category/treedata", "pid="+parentId, "get", success);
		},
		multiSelect: false,
		cacheItems: true,
		folderSelect: true,// 该选项在ace style里失效，这里导致不能选中父类
		'open-icon' : 'ace-icon tree-minus',
		'close-icon' : 'ace-icon tree-plus',
		'selectable' : true,
		'selected-icon' : 'ace-icon fa fa-check',
		'unselected-icon' : 'ace-icon fa fa-times',
		loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>'
	});
/*	$('#cattree').on('selected.fu.tree', function(event, data) {
		var target = data.target;
		$("#pid").val(target.attr.id);
	});
	$('#cattree').on('deselected.fu.tree', function(event, data) {
		var target = data.target;
		console.log(target);
		return;
	})*/
</script>