<!DOCTYPE html>
<html>
<head>
  <title>CodeIgniter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles_login.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <script src = "<?php echo base_url();?>assets/js/script.js"></script>
  <script src = "<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script src = "<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
  <script src = "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>
<body>

<!--Add Accounts-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"">Products</a>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-4">
  <center>
  <form method="post" id = "kakaibabe">
  <h1> Add Product</h1>
  <br>
    <div class="form-group">
      <input type="text" class="form-control" id="pn" placeholder="Product Name" label = "Product Name" name="pn">
      <?php echo form_error('pn'); ?>
    </div>

    <div class="form-group">
      <input type="text" class="form-control" id="pc" placeholder="Product Code" label = "Product Code" name="pc">
      <?php echo form_error('pc'); ?>
    </div>

    <div class="form-group">
      <input type="number" class="form-control" id="st" placeholder="Stock" label = "stock" name="st">
      <?php echo form_error('st'); ?>
    </div>

    <div class="form-group">
      <input type="number" class="form-control" id="pr" placeholder="Price" label = "Price" name="pr">
      <?php echo form_error('pr'); ?>
    </div>

    <input type="submit" name= "submit" id = "submit" class="btn btn-primary" value = "Submit">
  </div>

<!-- Product Table -->
  <div class="col-sm-8">
          <table class="table table-bordered">
            <thead>
              <tr>
              <td><center>ID</center></td>
                <td><center>Product Name</center></td>
                <td><center>Product Code</center></td>
                <td><center>Stock</center></td>
                <td><center>Price</center></td>
                <td><center>Action</center></td>
              </tr>
            </thead>

            <tbody id ="showdata" style="text-align: center">

            </tbody>
          </table>
      </div>
    </div>
  </div>




  <div class="modal fade" id="editModal11" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <form id = "kakaibabes">
              <div class="form-group">
                <label for="email">Product Name:</label>
                <input type="text" class="form-control"  placeholder="Product Name" label = "Product Name" id="pname" style="width: 47% !important">
              </div>
              <div class="form-group">
                <label for="pcode">Product Code:</label>
                <input type="text" class="form-control"  placeholder="Product Code" label = "Product Code" id="pcode" style="width: 47% !important">
                
              </div>
              <div class="form-group">
                <label for="Stock">Stock:</label>
                <input type="text" class="form-control"  placeholder="Stock" label = "Stock" id="sto" style="width: 47% !important">
              </div>
              <div class="form-group">
                <label for="Price">Price:</label>
                <input type="text" class="form-control"  placeholder="Price" label = "Price" id="pri" style="width: 47% !important">
                
              </div>
              <br>
              <input type="submit" name= "register" id = "register" class="btn btn-primary" value = "Update" style="width: 47% !important">
            </form>
        </div>
      </div>
      
    </div>  


<!-- Add Product -->
<script>
  $(document).ready(function(){
    showAccounts();
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

              swal('Added Succesful');

          }
          else {
            $('#kakaibabe')[0].reset();
            swal("invalid");
          }
          showAccounts();
        }
      })
      
    });

     function showAccounts(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url()?>hello/showAccounts',
        async: false,
        dataType: 'json',
        success: function(data){
          var html = "";
          var i;
          for(i = 0; i < data.length; i++){
            html += '<tr>' +
                  '<td id = "id">'+data[i].product_ID+'</td>' +
                  '<td>'+data[i].productname+'</td>' +
                  '<td>'+data[i].productcode+'</td>' +
                  '<td>'+data[i].stock+'</td>' +
                  '<td>'+data[i].price+'</td>' +
                  '<td>' +
                    '<a href="javascript:;" class="btn btn-info item-edit editbtn"  >Upd</a>'+
                    '<a href="javascript:;" class="btn btn-danger item-delete editdelete" id = "del" data="'+data[i].id+'">Del</a>'+
                  '</td>' +
                '</tr>';
          }
          $('#showdata').html(html);
        },
        error: function(){
          swal('could not load database');
        }
        });
      /*
        $(document).on('click','.editbtn',function(){
        var prodName  = $(this).closest('tr').find('td:eq(0)').text();
        var prodcode = $(this).closest('tr').find('td:eq(1)').text();
        var prodstock = $(this).closest('tr').find('td:eq(2)').text();
        var prodprice   = $(this).closest('tr').find('td:eq(3)').text();

        $('#pname').val(prodName);
        $('#pcode').val(prodcode);
        $('#sto').val(prodstock);
        $('#pri').val(prodprice);
        
        $('#editModal11').modal('show');
        */
      
        }
      });


</script> 

<!-- Delete -->
<script>
function delProduct(pn){

      $.ajax({
          url: '<?php echo base_url() ?>/hello/deleteProd/'+pn,
          type: 'post',
          success: function(data){
            if(data){
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
              showProd("All");
            }else {
              swal("Your imaginary file is safe!");
            }
          }

      });

    }
    $(document).on('click','.editdelete',function(){
         var productname  = $(this).closest('tr').find('td:eq(1)').text();

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                delProduct(id);

        } else {
           swal("Your imaginary file is safe!");
        }
        
      });
    });
</script>








    </div>
  </body>
</html>
