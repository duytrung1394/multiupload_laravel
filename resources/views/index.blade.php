
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.row{
			margin-top: 50px;
		}
		
		.box-preview-img {width: 130px; height: 80px; border: 1px solid #e5e5e5; margin-right: 5px; margin-top: 5px;}
		#them{ margin: 20px 0px; }
		input[type='file']{
			margin: 5px 0px;
		}
	</style>
</head>
<body>	
	<div class="container">
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="btn btn-primary" id="them">Thêm</div>
				<form action="" method="POST" role="form" id="formUpload" enctype="multipart/form-data">
					<legend>Form Upload</legend>
					<div class='form-group' id="divUpload">
						<input type='file' class='form-control upload-1 file-upload' name='image[]' data-inputid="1" >
					</div>
					{{csrf_field()}}
					<button type="submit" class="btn btn-primary" name='submit'>Submit</button>
				</form>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div id="preview"><p class="hihi-1"></p><img class='box-preview-img img-1'/></div>
			</div>
		</div>
		 
	
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#them").click(function () {
				if($("#divUpload input").length<9){
					// console.log($("#divUpload input").length);
					var i = $("#divUpload input").length + 1;
					$("#divUpload").append("<input type='file' class='form-control upload-"+i+" file-upload'  name='image[]'  data-inputid='"+i+"'>");
					$("#preview").append("<img class='box-preview-img img-"+i+"'/>");
				}else{
					alert('Số ảnh cần upload đã quá nhiều');
				}
			});
			//phải sự dụng delagate để bát sự kiện live, khi input upload được tạo ra khi thêm input bằng jquery
			$("#formUpload").delegate(".file-upload","change",function (event){
				var id = $(this).attr('data-inputid'); 
				console.log(id);
				$('#preview .img-'+id).attr('src', URL.createObjectURL(event.target.files[0]));
			});
		});
	</script>
</body>
</html>