<!DOCTYPE html>
<html>
<head>
	<title>CodeIgniter</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles_login.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<script src = "<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src = "<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
	<script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>	

<div class = "container">
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Login -->

<div class="col-sm-12">
  <center>
  <form method="post" id = "kakaiba">
  <h1>Login</h1>
  <br>

    <div class="form-group">
      <input type="text" class="form-control" id="uid" placeholder="Username" label = "Username" name="uid">
      <?php echo form_error('uid'); ?>
    </div>

    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Password" label = "Password" name="pwd">
      <?php echo form_error('pwd'); ?>
    </div>

    		<input type="submit" name= "login" id = "login" class="btn btn-primary" value = "Login">
    <br><br>
    <!--
    <input type="button" class="btn btn-default" data-toggle="modal" data-target="#regmodal" value ="Sign Up">
    -->
  </form>
  </center>
</div>
</div>
<div class="col-sm-4"></div>
</center>




<!-- Login Script-->
<script>
	$(document).ready(function(){
		$(document).on('submit', '#kakaiba', function(e){
			e.preventDefault();
			var username = $('#username').val();
			var password = $('#password').val();

			$.ajax({
				type : "POST",
				url  : "<?php echo base_url();?>hello/login",
				data : new FormData(this),
				contentType: false,
				processData: false,
				beforeSend: function(){

					$empty = $('form#kakaiba').find("input").filter(function(){
						return this.value === "";
					});
					if($empty.length){
						swal('You must fill out all fields');
						return false;
					}
				},
				success: function(data){
					if(data){
							window.location = "home";

					}

					else {
						$('#kakaiba')[0].reset();
						swal("Invalid");
					}

				}
			})
			
		});

	});

</script>


<!-- Register Script-->
<script>
	$(document).ready(function(){
		$(document).on('submit', '#kakaibabe', function(e){
			e.preventDefault();

			$.ajax({
				type : "POST",
				url  : "<?php echo base_url();?>hello/register",
				data : new FormData(this),
				contentType: false,
				processData: false,
				beforeSend: function(){

					$empty = $('form#kakaibabe').find("input").filter(function(){
						return this.value === "";
					});
					if($empty.length){
						swal('You must fill out all fields');
						return false;
					}
				},
				success: function(data){
					if(data){
							swal('Register Succesful');

					}

					else {
						$('#kakaibabe')[0].reset();
						swal("Invalid");
					}

				}
			})
			
		});

	});

</script>






</body>
</html>