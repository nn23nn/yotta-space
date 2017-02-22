@if(!empty($errors->all()))
	<div class="alert alert-danger">
		<button data-dismiss="alert" class="close" type="button">
			<i class="ace-icon fa fa-times"></i>
		</button>
		@foreach($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
	</div>
@endif 
{{--
<div class="alert alert-danger hide">
	<button data-dismiss="alert" class="close" type="button">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<span id="errormsg"></span>
	<br>
</div>
--}}