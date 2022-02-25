$(function () {
  		$('[data-toggle="popover"]').popover()
	});
	$(function(){
		$('button.delete').click(function(e){
			e.preventDefault();
			var link = this;
			var deleteModal = $("#deleteModal");
			deleteModal.find('input[name=id]').val(link.dataset.id);
			deleteModal.modal();
		});
	});

	
	$(document).ready(function(){
	/* function for activating modal to show data when click using ajax */
	$(document).on('click', '.view_data', function(){  
		var id = $(this).attr("id");  
		if(id != ''){  
			$.ajax({  
				url:"view_product.php",  
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

