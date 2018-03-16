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
  <input type="hidden" id="base_url" value="<?= base_url() ?>">
  <script type="text/javascript"> var base_url = $("#base_url").val();</script>
  <script src="<?= base_url('assets/js')?>/sweetalert2.all.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-fixed">
    <div class="container-fluid">
      <div class="navbar-header">
       <a class="navbar-brand" href="#">Yosi Break</a>
      </div>
    </div>
</nav>

<!-- Add Product Form -->
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<center>
      <form method="post" id = "kakaibabe" style="width: 100% !important">
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

          <div class="form-group">
          <input type="submit" name= "submit" id = "submit" class="btn btn-primary" value = "Submit">
          </div>
          </div>
      </form>


<!-- Product Table -->
<div class="col-sm-8">
  <input type="text" id="myProduct" onkeyup="mySearch()" placeholder="Search Product" style="width: 30% !important"><br>
  <button class = "btn btn-primary" onclick="sortTable()" style="width: 16.5% !important">Sort by Name</button>
          <table class="table table-bordered" id = "ProductTable">
            <thead class="header">
              <tr>
              <td><center>Product ID</center></td>
                <td><center>Product Name</center></td>
                <td><center>Product Code</center></td>
                <td><center>Stock</center></td>
                <td><center>Price</center></td>
                <td><center>Action</center></td>
              </tr>
            </thead>
            <tbody id ="showproduct" style="text-align: center">
            </tbody>
          </table>
    </div>
  </div>
</div>

<!-- Update Product Modal Form -->
<div class="modal fade" id="editModal11" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container">
          <form id = "yayaya">
              <div class="form-group">
                <input type="hidden" class="form-control"  placeholder="Product ID" label = "Product ID" id="pid" name="prodid" style="width: 100% !important">
              </div>
              <div class="form-group">
                <label for="email">Product Name:</label>
                <input type="text" class="form-control"  placeholder="Product Name" label = "Product Name" id="pname" name="prodname" style="width: 100% !important">
              </div>
              <div class="form-group">
                <label for="pcode">Product Code:</label>
                <input type="text" class="form-control"  placeholder="Product Code" label = "Product Code" id="pcode" name="prodcode" style="width: 100% !important">
              </div>
              <div class="form-group">
                <label for="Stock">Stock:</label>
                <input type="number" class="form-control"  placeholder="Stock" label = "Stock" id="sto" name="prodsto" style="width:100% !important">
              </div>
              <div class="form-group">
                <label for="Price">Price:</label>
                <input type="number" class="form-control"  placeholder="Price" label = "Price" id="pri" name="prodpri" style="width:100% !important">
              </div>
              <br>
              <input type="submit" name= "update" id = "updateregister" class="btn btn-primary" value = "Update" style="width:100% !important">
            </form>
        </div>
      </div>
    </div>  
  </div>
</div>

<!-- Scipts -->
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
        });
      });
/* Delete Product*/
  $(document).on('click','.editdelete',function(){
      var product  = $(this).closest('tr').find('td:eq(0)').text();

        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Delete Product'
          }).then((result) => {
          if (result.value) {
                deleteProd(product);
          }
          })
        })

  function deleteProd(product) {
    
      var controller = "hello/deleteProduct";
      var data       = {"product" : product};
      var onsuccess  = function(data) {
          swal('Successfully Deleted'); 
      }
      ajaxCall(controller, data, onsuccess);
      }

  function ajaxCall(controller, data, onsuccess, onerror = '', onfailure = '') {
    
     $.ajax({

      type      : "POST",
      url       : base_url + controller,
      dataType  : "JSON",
      data      : data,

      success   : function(data) {
                  onsuccess();
      },
      error     : function(){
                  onerror();
      },
      failure   : function(){
                  onfailure();
      }
      })
      }
/* Show Product*/
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
                  '<td>'+data[i].product_ID+'</td>' +
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
          $('#showproduct').html(html);
          },
          error: function(){
          swal('could not load database');
        }
      });
      }   
/* Edit Product*/
  $(document).on('click','.editbtn',function(){
        var prid  = $(this).closest('tr').find('td:eq(0)').text();
        var pname  = $(this).closest('tr').find('td:eq(1)').text();
        var pcode = $(this).closest('tr').find('td:eq(2)').text();
        var sto = $(this).closest('tr').find('td:eq(3)').text();
        var pri   = $(this).closest('tr').find('td:eq(4)').text();

        $('#pid').val(prid);
        $('#pname').val(pname);
        $('#pcode').val(pcode);
        $('#sto').val(sto);
        $('#pri').val(pri);
        
        $('#editModal11').modal('show');
        
        });

  $(document).on('submit','#yayaya',function(e){
        e.preventDefault();
        $.ajax({
              url:'<?php echo base_url();?>hello/uppro',
              type: 'post',
              data: new FormData(this),
              contentType: false,
              processData: false,
              success: function(data){
                if(data){
                   swal("Good job!", "Product Updated Successfully", "success");
                   showAccounts();
                }else{
                  alert("Error");
                }
              }
            });
        });    
        
    });
/*Search Product*/
  function mySearch() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("myProduct");
      filter = input.value.toUpperCase();
      table = document.getElementById("ProductTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
/* Sort Product*/
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("ProductTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {

      shouldSwitch = false;

      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];

      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
       
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
  
  </script> 



    </div>
  </body>
</html>
