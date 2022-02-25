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

