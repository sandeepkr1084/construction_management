<footer class="main-footer" style="text-align: center;">

	

	<strong>Copyright &copy; 2014-2020 <a href="../users">Construction</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.1.0-rc
	</div>
</footer>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="dist/js/demo.js"></script>

 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
	<?php 
	$url_array =  explode('.php', $_SERVER['REQUEST_URI']) ;
  	$url = end($url_array);  
  	
  	if($url==""){ ?>

 	$("#image").hide();
    <?php } ?>
    
 	function readURL(input) {
 		$("#image").show();
 		if (input.files && input.files[0]) {
 			var reader = new FileReader();

 			reader.onload = function (e) {
 				$('#image').attr('src', e.target.result);
 			}
 			reader.readAsDataURL(input.files[0]);
 		}
 	}
 	$("#select_image").change(function(){
 		readURL(this);
 	});
</script>

<script type="text/javascript">
  function delete_check(){
    var t = confirm("Are you sure!... Do you want to delete!"); 
    if(t==true){
      return true;
    }
    return false;
}
</script>


<script>
  ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
    console.error( error );
  } );

</script>




</body>
</html>