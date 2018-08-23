<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Lab | Helper</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    

        <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="build/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	  <link href="build/css/plugin.css" rel="stylesheet">
	<link href="build/css/lab-helper.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-plus-square"></i> <span>Lab-Helper</span></a>
            </div>

            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section" id="details_section">
                <h3>DETAILS</h3>
                <ul class="nav side-menu">
                   <li><a><i class="fa fa-eye"></i>  Tests In Details  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					                 <?php

                                  require_once 'php_action/db_connect.php';

                                  $sql = "SELECT test FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id";
                                  $query = $con->query($sql);
                                  $test_array = array();
                                 
                                  while ($row = mysqli_fetch_array($query) ) {
                                      if(in_array($row['test'],$test_array)){

                                      }else{
                                        array_push($test_array,$row['test']);
                                      }
                              
                                  }

                                 // echo json_encode($test_array);

                                      
                                  foreach ($test_array as  $value) {
                                      echo '<li><a href="#" id="'.$value.'" class="specific_test" >'.$value.'</a></li>';
                                  }

                              
                              ?>
                      
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
			   <p align="center"><i class="fa fa-calendar"></i>  <span  id='date-part'></span></p>
			</div>
            <div class="col-md- col-sm-4 col-xs-4">
             
			  <p align="center"><i class="fa fa-clock-o"></i> <span id='time-part'></span></p>
              
            </div>
			<div class="col-md-4 col-sm-4 col-xs-4"></div>
            
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-12">
                    <h3>PERFORMED TESTS</h3>
                    <button class="btn btn-info pull-right" data-toggle="modal" data-target=".add_new_test"  id="new_test"><i class="glyphicon glyphicon-calendar fa fa-plus-circle"></i> Add New Test</button>
                  </div>
                 
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div>
				             <table id="lab_test" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>SAMPLE ID</th>
                          <th>TEST</th>
                          <th>RECEPTION TIME AND DATE</th>
                          <th>DISPATCH TIME AND DATE</th>
                          <th>ELAPSED TIME</th>
                          <th>COMPLETE TEST</th>
                        </tr>
                      </thead>

                      <tbody>
                            
                      </tbody>
                    </table>
				  
				          </div>
                </div>
                
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
		  
             </div>
        </div>
        <!-- /page content -->
         <!--modal to add content-->
         <div class="modal fade add_new_test" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">FILL IN RECEPTION DATA</h4>
                        </div>
                        <form role="form" action="php_action/create_test.php" method="POST"  id="createTestForm" >
                        <div class="modal-body">
                         <div class="messages"></div>
                          <div class="row">
                             <div class="col-sm-4"></div>
                             <div class="col-sm-5">
                                  <span id="loader-gif"></span>
                                  <div class="form-group">
                                    <label for="sample_id">Sample id:</label>
                                    <input type="text" class="form-control" id="sample_id" name="sample_id">
                                  </div>
                                   <div class="form-group">
                                      <label for="reception_datetime">Reception Date And Time:</label>
                                      <div class='input-group date' id='reception_datetime'>
                                          <input type='text' class="form-control" id="receptiondatetime" name="receptiondatetime" />
                                          <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                  </div>
                                   <div class="form-group">
                                    <label for="sample_id">Test:</label>
                                    <input type="text" class="form-control" name="test" id="search">
                                    <!-- Suggestions will be displayed in below div. -->
                                    <div id="display" class="forDisplay"></div>
                                  </div>

                             </div>
                             <div class="col-sm-3"></div>
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" id="save_test"  class="btn btn-primary">Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
        <!--modal to add content-->

        <!--model to complete adding a test-->
        <div class="modal fade" id="complete_adding_a_test" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">COMPLETE CAPTURING DATA ABOUT A TEST</h4>
                        </div>
                        <form role="form" action="php_action/complete_test_registration.php" method="POST"  id="completingTestForm" >
                        <div class="modal-body">
                         <div class="completion_messages"></div>
                          <div class="row">
                             <div class="col-sm-4"></div>
                             <div class="col-sm-5">
                               
                                   <div class="form-group">
                                      <label for="reception_datetime">Dispatch Date And Time:</label>
                                      <div class='input-group date' id='dispatch_datetime'>
                                          <input type='text' class="form-control" id="dispatchdatetime" name="dispatchdatetime" />
                                          <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                  </div>
                                 

                             </div>
                             <div class="col-sm-3"></div>
                          </div>
                          
                        </div>
                        <div class="modal-footer test_id">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" id="completion"  class="btn btn-primary">Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
        <!--model to complete adding a test -->
         <!--test details modal-->
        <div class="modal fade" id="details_about_a_test" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title test_title" id="myModalLabel" align="center"></h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                             <div class="col-sm-4"></div>
                             <div class="col-sm-5">
                                <div class="my-progress-bar">
		  
                                 </div> 
                             </div>
                             <div class="col-sm-3"></div>
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" id="completion"  class="btn btn-primary">Save</button> -->
                        </div>
                        
                      </div>
                    </div>
                  </div>
        <!--test details modal -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Lab-Helper System
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

     <!-- Datatables -->
    <script src="vendors/datatables.net-bs/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
     <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
     <script src="build/js/plugin.js"></script>
     <script src="build/js/custom.min.js"></script>
	   <script src="build/js/lab-helper.js"></script>
  </body>
</html>
