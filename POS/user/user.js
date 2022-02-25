function out(){
    var lag = "logout";
    swal({
        title: "Logout?",
        icon: "warning",
        buttons: ["Cancel","Yes"],
        dangerMode: true,
      })
      .then((value) => {
        if(value){
          if(lag){
              $.ajax({
                type: 'post',
                data: {
                  logout:lag
                },
                url: 'includes/db_con.php',
                success: function (data){
                  window.location.href='index.php';
                }
              });
          }
        }
      })
  };
$(function () {
  $('[data-toggle="popover"]').popover()
});
    $(function () {
    $('[data-toggle="popover"]').popover()
    });
    $(document).ready(function(){
    /* function for activating modal to show data when click using ajax */
    $(document).on('click', '.view_data', function(){  
        var id = $(this).attr("id");  
        if(id != ''){  
            $.ajax({  
                url:"../user/view.php",  
                method:"POST",  
                data:{id:id},  
                success:function(data){  
                    $('#Contact_Details').html(data);  
                    $('#dataModal').modal('show');  
                }  
            });  
        }            
    });   
}); 
$(document).ready(function() {
    $('#userdata').DataTable( {
        scrollY:        '35vh',
        scrollCollapse: true,
        paging:        false,
    } );
} );

    $(function(){
        $('button.delete').click(function(e){
            e.preventDefault();
            var link = this;
            var deleteModal = $("#deleteModal");
            deleteModal.find('input[name=id]').val(link.dataset.id);
            deleteModal.modal();
        });
    });

    function out(){
        var lag = "logout";
        swal({
            title: "Logout?",
            icon: "warning",
            buttons: ["Cancel","Yes"],
            dangerMode: true,
          })
          .then((value) => {
            if(value){
              if(lag){
                  $.ajax({
                    type: 'post',
                    data: {
                      logout:lag
                    },
                    url: 'includes/db_con.php',
                    success: function (data){
                      window.location.href='./index.php';
                    }
                  });
              }
            }
          })
      };