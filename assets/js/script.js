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
            alert('You must fill out all fields');
            return false;
          }
        },
        success: function(data){
          if(data){
              alert('Added Succesful');

          }

          else {
            $('#kakaibabe')[0].reset();
            alert("invalid");
          }

        }
      })
      
    });

  });