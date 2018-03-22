<!DOCTYPE html>
<html>
<head>
  <title>CodeIgniter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles_login.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <script src = "<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src = "<?php echo base_url();?>assets/js/angular.min.js"></script>
  <script src = "<?php echo base_url();?>assets/js/angular-animate.js"></script>
  <input type="hidden" id="base_url" value="<?= base_url() ?>">
  <script type="text/javascript"> var base_url = $("#base_url").val();</script>
  <script src="<?= base_url('assets/js')?>/sweetalert2.all.js"></script>
</head>
</style>
<body style = "background-color: #cccccc !important;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="Pmanage">Product Management</a></li>
      <li><a href="">Product View</a></li>
    </ul>
    </div>
  </div>
</nav>

<!--Product-->
<div class = "container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="well well-lg" style="font-size: 24px"><center style = "color: blue"> Sing tamis at sing sarap ng luto ng nanay mo!</center></div>

<div class="col-sm-12">
<input type="text" id="myProduct" onkeyup="mySearch()" placeholder="Search Product" style="width: 50% !important"><br> 
<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Cake</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/ck.jpeg">
      </div>
      <div class="panel-footer">
        <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
        <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">
      </div>
  </div>
</div>
</div>

<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Cake</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/ck.jpeg">
      </div>
  <div class="panel-footer">
   <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
    <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">
  </div>
</div>
</div>
</div>

<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Cake</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/ck.jpeg">
      </div>
  <div class="panel-footer">
   <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
        <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">

      </div>
   </div>
  </div>
</div>


<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Foods</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/fds.jpg">
      </div>
  <div class="panel-footer">
   <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
    <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">
      </div>
    </div>
  </div>
</div>


<div class = "container-fluid">
<div class="row">

<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Foods</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/fds.jpg">
      </div>
      <div class="panel-footer">
        <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
        <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">
      </div>
  </div>
</div>
</div>

<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">Foods</div>
      <div class="panel-body">
      <div class="thumbnail">
        <img class="img-responsive"  src="<?php echo base_url();?>assets/img/fds.jpg">
      </div>
  <div class="panel-footer">
   <input type ="submit" class="btn btn-primary" value = "Buy" style="width: 49% !important">
    <input type ="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger" value = "Description" style="width: 49% !important">
  </div>
</div>
</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <center><p><h1>Yummy</h1></p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




</body>
</html>
