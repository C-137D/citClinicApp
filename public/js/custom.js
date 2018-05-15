$('.addad').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })


  $(document).ready( function () {
    $('#table_id').DataTable({
        
    });
} );

$(document).ready( function () {
    $('#table').DataTable({
        
    });
} );

$('.delete_form').on('submit',function(){
    if(confirm("Are you sure you want to delete it?"))
    {
        return true;
    }
    else
    {
        return false;
    }
});

$(document).ready(function() { $('body').bootstrapMaterialDesign(); });


$(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});