<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){
    $('#my_form').on('submit',function(e){
        e.preventDefault(); 
      $.ajax({
            url      : "<?php echo base_url()?>index.php/employee/add_employee",
            method   :"POST",
            data     :new FormData(this),
            dataType :"json",
            processData:false,
            contentType:false,
            cache    :false,
            async    :false,
      beforeSend : function(){     
         $('#information_save').html('Please Wait');
      },
      success    : function(data){
         if(data.error == true){
             if(data.name_error !=""){
              $('#name_error').html(data.name_error);
             }else{
                $('#name_error').html('');
             }
             if(data.email_error !=""){
              $('#email_error').html(data.email_error);
             }else{
                $('#email_error').html('');
             }
             if(data.phone_error !=""){
              $('#phone_error').html(data.phone_error);
             }else{
                $('#phone_error').html('');
             }
             if(data.code_error !=""){
              $('#code_error').html(data.code_error);
             }else{
                $('#code_error').html('');
             }
             if(data.dob_error !=""){
              $('#dob_error').html(data.dob_error);
             }else{
                $('#dob_error').html('');
             }
             if(data.address_error !=""){
              $('#address_error').html(data.address_error);
             }else{
                $('#address_error').html('');
             }
             if(data.status_error !=""){
              $('#status_error').html(data.status_error);
             }else{
                $('#status_error').html('');
             }           
         } if(data.img_error !="" && data.error == true){
            $('#information_save').html('Submit Information');
            $('#img_error').html(data.img_error);
         }else{
            $('#img_error').html('');
         } if(data.error == false && data.message !=""){
             $('#success_message').html(data.message);
             $('#name_error').html('');
             $('#email_error').html('');
             $('#phone_error').html('');
             $('#code_error').html('');
             $('#dob_error').html('');
             $('#status_error').html('');
             $('#address_error').html('');
             $('#my_form')[0].reset();
             $('#information_save').html(data.button);
             $('#information_save').trigger('blur'); 
             $('#information_save').attr('disabled', false);
             if(data.refresh != ""){
               setTimeout(function(){
                  location.reload();
               },500);
             }
         }
      }
            });
  });
});
$(document).ready( function () {
   $("#emp_email" ).keyup(function() {
       var email = $(this).val();
      $.post( "<?php echo base_url()?>index.php/employee/check_email", { email: email},function( data ) {
         if(email !=""){
            $('#email_error').html(data);
            if(data){
               $('#information_save').attr('disabled',true);
            } else{
               $('#information_save').attr('disabled',false);
            }        
         }   
        });
});
} );
$(document).ready( function () {
    $('#myTable').DataTable(); 
} );
</script>
</body>
</html>