<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Monitoring</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('resources/assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('resources/assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('resources/assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

  <!-- toast -->
  <link rel="stylesheet" href="<?=base_url('resources/assets/jquery-toast/dist/jquery.toast.min.css');?>">

  <!-- charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-wind"></i> -->
          <i class="fab fa-pagelines"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Monitoring</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-plus-circle"></i>
          <span>Añadir</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">seleccione el deseado</h6>
            <a class="collapse-item active" href="<?=base_url('sistemas');?>"><i class="fas fa-cogs"></i>  Sistema</a>
            <a class="collapse-item" href="<?=base_url('estaciones');?>"><i class="fas fa-map-marked-alt"></i>  Estacion</a>
            <a class="collapse-item" href="<?=base_url('sensores');?>"><i class="fas fa-assistive-listening-systems"></i>  Sensor</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Mediciones</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('mediciones');?>"><i class="fas fa-ruler-combined"></i>  informacion Completa</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <!-- in case to show a section collpsed to the begining use class="collapsed show" -->
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

            <!-- Nav Item - Messages -->
            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('user_session')->nameUser?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


          <canvas id="myChart" width="400" height="400"></canvas>
          <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>





        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('Login/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('resources/assets/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?= base_url('resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('resources/assets/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- datatable -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('resources/assets/js/sb-admin-2.min.js');?>"></script>

  <!-- toast -->
  <script src="<?=base_url('resources/assets/jquery-toast/dist/jquery.toast.min.js');?>"></script>
  <script src="<?=base_url('resources/assets/jquery-toast/dist/toast.js');?>"></script>

  <!-- charts -->
  <script src="<?=base_url('resources/assets/vendor/chart.js/Chart.min.js');?>"></script>
  <script src="<?=base_url('resources/assets/vendor/chart.js/Chart.js');?>"></script>

</body>

<script type="text/javascript">
	$(function(){

		// begin function get
	    var table_var = $(document).find('#exportTable').DataTable({
	        ajax : {
	          'url':'http://localhost/envirmonitoring/index.php/System/api/system',
	          'dataSrc':'data',
	           headers :{
	            'X-API-KEY':'QWERTY'
	          },
	        },
	        columns : [
	          {data:'nameSystem'}
	        ]

	    });
	    //end function get


	    //begin function get specific
        $(document).find('#exportTable tbody').on('click','tr',function(){
        var variablex = table_var.row(this).data();
        console.info("cgargeTable");
        console.info(table_var.row(this).data());
        $.ajax({
          url:"http://localhost/envirmonitoring/index.php/System/api/system/id/"+variablex.idSystem,
          method: 'get',
          headers: {
            'X-API-KEY':'QWERTY'
          },
          success : function(_response){
            // console.info("llego1");
            if(_response.data == "error"){

              $(document).find('#responseText').html(
              '<div class="alert alert-danger" role="alert">'
              +_response+
              '</div>'
              );
            }else if(_response.status == "success"){
              $(document).find('#universalForm').append(
                '<input type="hidden" id="idSystem" name="idSystem" value="'+_response.data.idSystem+'">'

                  );
                 // console.info("llegos");
              $.each(_response.data,function(key,value){

                 $(document).find('#'+key).val(value);
              });
              $('#universalModal').modal('show')
            $(document).find('.btns').html(
            '<div class="row ">'+
              '<div class="col">'+
                '<button type="button" class="btn btn-danger btn-cancel">Cancel</button>'+

            '</div>'+

              '<div class="col">'+
                '<button type="button" class="btn btn-primary btn-update update-control">Update</button>'+

            '</div>'+

              '<div class="col">'+
                '<button type="button" class="btn btn-warning btn-delete">Delete</button>'+
              '</div>'+
            '</div>'

            );



            }
            setTimeout(function(){
                $(document).find('#responseText').html('');
            }, 3000);
          },
          error: function(error){
            response= JSON.stringify(err.responseText);
            $(document).find('#responseText').html(
              '<div class="alert alert-danger" role="alert">'
              +response+
              '</div>'
            );
            setTimeout(function(){
                $(document).find('#responseText').html('');
            }, 3000);
          }

        });

      });
      // end function get specific


      //begin functions post
      $(document).on('click','.btn-post',function(){
        clearForm('universalForm');
        console.info("llego Post");
        $.ajax({
          url:"http://localhost/envirmonitoring/index.php/System/api/system",
          method: "POST",
          headers : {
            'X-API-KEY':'QWERTY'
          },
          data: $(document).find("#universalForm").serialize(),
          success : function(_response){
            response= JSON.stringify(_response);
            if(_response.status == "error"){
              $.toast({
              heading: 'Error',
              text: 'llene los campos correctamente',
              position: 'top-right',
              loaderBg:'#ff6849',
               icon: 'error',
               hideAfter: 3500

              });
              $.each(_response.validations, function(key,message){
                 $(document).find('#'+key).addClass('is-invalid').after('<div class="invalid-feedback">'+message+'</div>');
                });
            }else{
                $(document).find('#universalModal').modal('hide');
              $.toast({
               heading: 'Success',
               text: "datos registrados satisfactoriamente",
               position: 'top-right',
               loaderBg:'#74C627',
               icon: 'success',
               hideAfter: 4000,
               stack: 6,
                afterHidden: function () {
                  window.location = "<?=base_url('sistemas');?>";
                },

             });
             clearForm('universalForm');
             
            }

          },
          error : function(err){
              response= JSON.stringify(err.responseText);
              $(document).find('#responseText').html(
                '<div class="alert alert-success" role="alert">'
                +response+
                '</div>'
              );
              setTimeout(function(){
                  $(document).find('#responseText').html('');
              }, 3000);

          }
        });
      });
      //end functions post

      //end functions put
      $(document).on('click','.btn-update',function(){
        clearForm('universalForm');
        console.info("llego PUT");
        $.ajax({
          url:"http://localhost/envirmonitoring/index.php/System/api/system/id/"+$(document).find('#idSystem').val(),
          method: "PUT",
          headers : {
            'X-API-KEY':'QWERTY'
          },
          data: $(document).find("#universalForm").serialize(),
          success : function(_response){
            response= JSON.stringify(_response);
            if(_response.status == "error"){
              $.toast({
              heading: 'Error',
              text: 'llene los campos correctamente',
              position: 'top-right',
              loaderBg:'#ff6849',
               icon: 'error',
               hideAfter: 3500

              });
              $.each(_response.validations, function(key,message){
                 $(document).find('#'+key).addClass('is-invalid').after('<div class="invalid-feedback">'+message+'</div>');
                });
            }else{
                $(document).find('#universalModal').modal('hide');
              $.toast({
               heading: 'Success',
               text: "datos actualizados satisfactoriamente",
               position: 'top-right',
               loaderBg:'#74C627',
               icon: 'success',
               hideAfter: 4000,
               stack: 6,
                afterHidden: function () {
                  window.location = "<?=base_url('sistemas');?>";
                },

             });
             clearForm('universalForm');
             
            }

          },
          error : function(err){
              response= JSON.stringify(err.responseText);
              $(document).find('#responseText').html(
                '<div class="alert alert-success" role="alert">'
                +response+
                '</div>'
              );
              setTimeout(function(){
                  $(document).find('#responseText').html('');
              }, 3000);

          }
        });
      });
      //end functions Put







      $(document).on('click','.btn-delete',function(){
            console.info("llego delete");
            $.ajax({
                "url" : "http://localhost/envirmonitoring/index.php/System/api/system/id/"+$(document).find('#idSystem').val(),
                "method" : "DELETE",
                headers : {
                    'X-API-KEY':'QWERTY'
                },
                success : function(_response){

	                response= JSON.stringify(_response);
		            if(_response.status == "error"){
		                $.toast({
		                	heading: 'Error',
		              		text: 'Error',
		              		position: 'top-right',
		              		loaderBg:'#ff6849',
		               		icon: 'error',
		               		hideAfter: 3500

		              		});
		              		$.each(_response.validations, function(key,message){
		                 		$(document).find('#'+key).addClass('is-invalid').after('<div class="invalid-feedback">'+message+'</div>');
		                	});
		            }else{
		                $(document).find('#universalModal').modal('hide');
		             	$.toast({
		               		heading: 'Success',
		               		text: "datos eliminados satisfactoriamente",
		               		position: 'top-right',
		               		loaderBg:'#74C627',
		               		icon: 'success',
		               		hideAfter: 4000,
		               		stack: 6,
		                	afterHidden: function () {
		                  		window.location = "<?=base_url('sistemas');?>";
		                	},

		             	});
		             clearForm('universalForm');
		             
		            }
                }

            });
        });

      $(document).on('click','.btn-cancel',function(){
            $('#universalModal').modal('hide');

      });

      function clearForm(_id){
        $(document).find('#'+_id).find('input,select').each(function(e){
            $(this).removeClass('is-invalid');
            $(this).next('div').remove();

        });
      }

      function cancelForm(_id){
        $(document).find('#'+_id).find('input,select').each(function(e){
          $(this).removeClass('is-invalid');
          $(this).next('div').remove();
          $(this).val('');
          $(document).find('#id').remove();
          $(document).find('.btns').html(
            '<div class="row ">'+
              '<div class="col">'+
                '<button type="submit" class="btn btn-primary btn-block">Send</button>'+

              '</div>'+
            '</div>'
          );
        });
      }

    });
</script>

</html>
