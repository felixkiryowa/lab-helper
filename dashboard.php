<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>Lab | Helper </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
    <link href="build/css/lab-helper.css" rel="stylesheet">
  </head>
  <?php include('php_action/authenticate_users.php');?>
  <?php //include('php_action/trash.php');?>
  <body class="nav-md">
    <?php
    if($_SESSION['login_user'] == null)
     { 
       header("location: login.php");
      } else{
     ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-h-square"></i></i> <span>Lab | Helper</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['login_user'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin Dashboard</h3>
                <ul class="nav side-menu">
                  <li><a id="home"><i class="fa fa-home"></i> Home</a></li>
                  <li><a id="users"><i class="fa fa-users"></i> Register User </a></li>
                  <li><a id="trash"><i class="fa fa-trash"></i> Trash Data </a></li>
                  <li><a id="tests_manager"><i class="fa fa-file-text-o"></i> Manage Tests </a></li>
                  <li><a id="tests_graph"><i class="fa fa-bar-chart"></i>Chart</a></li>
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

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['login_user'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="php_action/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                  <!--generate chart-->
                    <div class="col-md-12 col-sm-12 col-xs-12" id="div_grahp" style="display:none;">
                      <h3 align="center">Generate analysis</h3>
                       <br>
                        <br>
                        <br>
                        <br>
                      <form  class="form-horizontal form-label-left">
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="filter">Filter Data By Month<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="favourite_month" name="month" class="form-control col-md-7 col-xs-12">
                            <option value="0">- Select -</option>
                          </select>
                        </div>
                        <!-- <button class="btn btn-sm btn-primary" type="submit" name="filter">Filter</button> -->
                        </div>
                        
                      </form>
				               <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <!-- generate chart -->
                  
                    <div class="col-md-12 col-sm-12 col-xs-12" id="div_filter">
                      <h3 align="center">Filter Data By Month</h3>
                       <br>
                        <br>
                        <br>
                        <br>
                      <form id="demo-form2" action="filter.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="filter">Filter Data By Month<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="sel_month" name="month" class="form-control col-md-7 col-xs-12">
                            <option value="0">- Select -</option>
                          </select>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit" name="filter">Filter</button>
                        </div>
                        
                      </form>
				               <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <!--manage test -->
                    <div class="col-md-12 col-sm-12 col-xs-12" id="div_manage_tests" style="display:none;">
                      <h3 align="center">Manage Tests</h3>
                      <br>
                      <br>
                       <table id="manage_tests" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>SAMPLE ID</th>
                              <th>TEST</th>
                              <th>RECEPTION TIME AND DATE</th>
                              <th>DISPATCH TIME AND DATE</th>
                              <th>ELAPSED TIME</th>
                              <th>COMPLETE TEST</th>
                              <th>EDIT</th>
                              <th>DELETE</th>
                            </tr>
                          </thead>

                          <tbody>
                                
                          </tbody>
                    </table>
                    </div>
                    <!--manage tests -->
                    <!--delete data from the database -->
                     <div class="col-md-12 col-sm-12 col-xs-12" id="div_delete_data" style="display:none;">
                      <h3 align="center">Delete Data By Month</h3>
                       <br>
                        <br>
                        <br>
                      <form id="demo-form3" action="php_action/trash.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="filter">Filter Data By Month<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="selected_month" name="selected_month" class="form-control col-md-7 col-xs-12">
                            <option value="0">- Select -</option>
                          </select>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit" name="delete">Trash Data</button>
                        </div>
                        
                      </form>
				               <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <!-- delete data from the database -->
                     <div class="col-md-12 col-sm-12 col-xs-12" id="display_users" style="display:none;">
                         
                         <!-- Content Section -->
                          <div class="container">
                              <div class="row">
                                     <div class="col-md-12">
                                          <h2>Users</h2>
                                          <div class="pull-right">
                                               <button class="btn btn-success" data-toggle="modal" data-target="#add_new_user_modal"><i class="glyphicon glyphicon-calendar fa fa-plus-circle"></i> Add New User</button>
                                           </div>
                                      </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <h4>User Records:</h4>
                                    <div class="records_content table-responsive"></div>
                                </div>
                             </div>
                          </div>
                          <!-- /Content Section -->
                     </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->
        
<!-- Bootstrap Modal - To Add New Record -->
		<!-- Modal -->
		<div class="modal fade" id="add_new_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel">Add New User</h4>
					</div>
					<div class="modal-body">
					 
						<div class="form-group">
							<label for="names">Name :</label>
							<input type="text" id="names" name="names" placeholder="Names" class="form-control" />
						</div>
						 
						<div class="form-group">
							<label for="username">Username :</label>
							<input type="text" id="username" placeholder="Username" class="form-control" />
						</div>
						 
						<div class="form-group">
							<label for="password">Password :</label>
							<input type="password" id="password" placeholder="Password" class="form-control" />
						</div>
					 
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="adding_users">Add User</button>
					</div>
				</div>
			</div>
		</div>

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update User Information</h4>
            </div>
            <div class="modal-body">
 
                <div class="form-group">
                    <label for="update_first_name">Names</label>
                    <input type="text" id="update_names" placeholder="Names" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_last_name">Username</label>
                    <input type="text" id="update_username" placeholder="Username" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_email">Password</label>
                    <input type="text" id="update_password" placeholder="Password" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Modal - Update test details -->
<div class="modal fade" id="update_test_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Test Information</h4>
            </div>
            <div class="modal-body">
              <form action="php_action/updateTestDetails.php" method="POST">
                <div class="form-group">
                    <label for="update_sample_id">Sample Id</label>
                    <input type="text" id="update_sample_id" name="update_sample_id" placeholder="Sample Id" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="update_test">Test</label>
                    <input type="text" id="update_test" name="update_test" placeholder="Test" class="form-control"/>
                     <!-- Suggestions will be displayed in below div. -->
                     <div id="display" class="forDisplay"></div>
                </div>
                <div class="form-group">
                    <label for="update_reception_datetime">Reception Date And Time:</label>
                    <div class='input-group date' id='reception_datetime'>
                        <input type='text' class="form-control" id="update_receptiondatetime" name="receptiondatetime" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update_dispatch_datetime">Dispatch Date And Time:</label>
                    <div class='input-group date' id='dispatch_datetime'>
                        <input type='text' class="form-control" id="update_dispatchdatetime" name="dispatchdatetime" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button  class="btn btn-primary" type="submit" >Save Changes</button>
                <input type="hidden" name="specific_test_id" id="hidden_test_id">
            </div>
            </form>
        </div>
    </div>
</div>
<!-- // Modal -->

<!-- Analysis of Tests -->
<!-- <div class="modal fade" id="analysis_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" align="center" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
               <div id="my-chart"></div>
            </div>
    </div>
    <div class="modal-footer">
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Cancel</button>
     </div>
</div> -->
<!-- // Modal -->

<!--modal to add content-->
         <div class="modal fade" id="analysis_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        
                        <div class="modal-body">
                           <div id="my-chart"></div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                          
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
        <!--modal to add content-->


        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Lab | Helper
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
      <?php } ?>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
  
    <!-- jQuery Sparklines -->
    <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
    
    <!-- Custom Theme Scripts -->

	<script src="build/js/highcharts.js"></script>
  <script src="build/js/exporting.js"></script>
  <script src="build/js/custom.min.js"></script>
  <script src="build/js/special.js"></script>
  <script>
 
   function fill(Value) {

        //Assigning value to "search" div in "search.php" file.

        $('#update_test').val(Value);

        //Hiding "display" div in "search.php" file.

        $('#display').hide();

    }

    function DeleteTest(id) {
         var conf = confirm("Are you sure, do you really want to delete a test?");
        if (conf == true) {
            $.post("php_action/delete_test.php", {
                id: id
            },
                function (data, status) {
                    // reload Users by using readRecords();
                    //readRecords();
                    window.location.href="dashboard.php";
                }
            );
        }
    }

      function GetTestDetails(id) {
      // Add User ID to the hidden field for furture usage
      $("#hidden_test_id").val(id);
      $.post("php_action/read_specific_test.php", {
              id: id
          },
          function (data, status) {
              // PARSE json data
              var test = JSON.parse(data);
              // var reception_datetime = test.reception_time;
              // var dispatch_datetime = test.dispatch_time;
              // alert(reception_datetime);
              // alert(dispatch_datetime);
              // Assing existing values to the modal popup fields
              $("#update_sample_id").val(test[0]);
              $("#update_test").val(test[1]);
              $("#update_receptiondatetime").val(test[2]);
              $("#update_dispatchdatetime").val(test[3]);
          }
      );
      // Open modal popup
      $("#update_test_modal").modal("show");
    }

  
      
      // READ records
    function readRecords() {
        $.get("php_action/users/read_records.php", {}, function (data, status) {
            $(".records_content").html(data);
        });
    }

    $('#adding_users').click(function(){
        // get values
        var name = $("#names").val();
        var username = $("#username").val();
        var password = $("#password").val();

        // Add record
        $.post("php_action/users/add_user.php", {
            name: name,
            username: username,
            password: password
        }, function (data, status) {
            // close the popup
            alert("Successfully Added a new user");
            $("#add_new_user_modal").modal("hide");

            // read records again
            readRecords();

            // clear fields from the popup
            $("#names").val("");
            $("#username").val("");
            $("#password").val("");
        });
    });

     function DeleteUser(id) {
        var conf = confirm("Are you sure, do you really want to delete User?");
        if (conf == true) {
            $.post("php_action/users/delete_user.php", {
                id: id
            },
                function (data, status) {
                    // reload Users by using readRecords();
                    readRecords();
                }
            );
        }
    }
    
    function GetUserDetails(id) {
      // Add User ID to the hidden field for furture usage
      $("#hidden_user_id").val(id);
      $.post("php_action/users/read_specific_user.php", {
              id: id
          },
          function (data, status) {
              // PARSE json data
              var user = JSON.parse(data);
              // Assing existing values to the modal popup fields
              $("#update_names").val(user.name);
              $("#update_username").val(user.username);
              $("#update_password").val(user.password);
          }
      );
      // Open modal popup
      $("#update_user_modal").modal("show");
    }

    function UpdateUserDetails() {
    // get values
    var name = $("#update_names").val();
    var username = $("#update_username").val();
    var password = $("#update_password").val();
 
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("php_action/users/updateUserDetails.php", {
            id: id,
            name: name,
            username: username,
            password: password
        },
        function (data, status) {

            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            alert("Successfully Updated User Information");
            readRecords();
        }
    );
}
  </script>
  </body>
</html>