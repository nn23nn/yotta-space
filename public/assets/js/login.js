(function($,window,document){
	var win = window,doc=document;
	var pattern = /^1[3|5|7|8]\d{9}$/;
	var Privilege = function(){
		this.redirect = ""; //重定向
		this.smsUrl = ""; //短信验证码url
		this.url = ""; //请求的url

		var _this = this;
		this.getCode = function(phone,evt,headers){
			var headers = headers || {};
			if(!pattern.test(phone)){
				alert("请输入正确的手机号码");
				return;
			}
			var _evt = evt;
			_evt.setAttribute("disabled","disabled");
			$.ajax({
				url : _this.smsUrl,
				dataType : "json",
				data : {phone:phone},
				type : "post",
				headers : headers,
				success : function(res){
					if(res.errCode == 1){ //获取成功
						var t = 59;
						var st = setInterval(function(){
							t --;
							if(t <= 0){
								clearInterval(st);
								_evt.removeAttribute("disabled");
							}
							_evt.innerHTML = t+"s后重发";
						},1000);
					}else{
						alert(res.msg);
						_evt.removeAttribute("disabled");
					}
				}
			});
		}
		this.register = function(data,evt,headers){
			var headers = headers || {};
			if(!pattern.test(data.phone)){
				alert("请输入正确的手机号码");
				return;
			}
			if(data.code === undefined || data.code === ""){
				alert("请输入短信验证码");
				return;
			}
			if(data.username === undefined || data.username === ""){
				alert("请输入您的姓名");
				return;
			}
			if(data.password === undefined || data.password === ""){
				alert("请输入密码");
				return;
			}
			var _evt = evt;
			_evt.setAttribute("disabled","disabled");
			$.ajax({
				url : _this.url,
				dataType : "json",
				data : data,
				type : "post",
				headers : headers,
				success : function(res){
					if(res.errCode == 1){
						win.location.href = _this.redirect;
					}else{
						alert(res.msg);
						_evt.removeAttribute("disabled");
					}
				}
			});
		}
		this.login = function(data,evt,headers){
			var headers = headers || {};
			if(!pattern.test(data.phone)){
				alert("请输入正确的手机号码");
				return;
			}
			if(data.password === undefined || data.password === ""){
				alert("请输入密码");
				return;
			}
			var _evt = evt;
			_evt.setAttribute("disabled","disabled");
			$.ajax({
				url : _this.url,
				dataType : "json",
				data : data,
				type : "post",
				headers : headers,
				success : function(res){
					if(res.errCode == 1){
						win.location.href = _this.redirect;
					}else{
						alert(res.msg);
						_evt.removeAttribute("disabled");
					}
				}
			});
		}
		this.getback = function(data,evt,headers){
			if(!pattern.test(data.phone)){
				alert("请输入正确的手机号码");
				return;
			}
			if(data.code === undefined || data.code === ""){
				alert("请输入短信验证码");
				return;
			}
			if(data.password === undefined || data.password === ""){
				alert("请输入新密码");
				return;
			}
			var _evt = evt;
			_evt.setAttribute("disabled","disabled");
			$.ajax({
				url : _this.url,
				dataType : "json",
				data : data,
				type : "post",
				headers : headers,
				success : function(res){
					if(res.errCode == 1){
						win.location.href = _this.redirect;
					}else{
						alert(res.msg);
						_evt.removeAttribute("disabled");
					}
				}
			});
		}
	}
	var instance = null;
	win.getPrivilege = function(){
		if(!(instance instanceof Privilege)){
			instance = new Privilege();
		}
		return instance;
	};
}(jQuery,window,document));