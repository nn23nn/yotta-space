(function(window,document,$){
	var win = window,doc = document;
	win.js = {
		ajax : function(url,fn,data,type,async){
			if((typeof fn).toLowerCase() !== "function" || fn === ""){
				fn = function(){};
			}
			if((typeof data).toLowerCase() === "undefined" || data === ""){
				data = {};
			}
			if((typeof async).toLowerCase() === "undefined" || async === ""){
				async = true;
			}
			if((typeof type).toLowerCase() === "undefined" || type === ""){
				type = "post";
			}
			
			$.ajax({
				url : url,
				type : type,
				data : data,
				dataType : "json",
				async : async,
				success : fn
			});
		}
	}
}(window,document,jQuery))
