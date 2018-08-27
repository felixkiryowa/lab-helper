<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lab | Helper </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <?php include('php_action/authenticate_users.php');?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Lab | Helper</span></a>
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
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  <li><a id="users"><i class="fa fa-users"></i> Register User </a></li>
                 
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
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['login_user'];?>
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
                  
                    <div class="col-md-12 col-sm-12 col-xs-12" id="div_filter">
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
				
                    </div>
                     <div class="col-md-12 col-sm-12 col-xs-12" id="display_users" style="display:none;">
                         
                         <!-- Content Section -->
                          <div class="container">
                              <div class="row">
                                     <div class="col-md-12">
                                          <h2>Users</h2>
                                          <div class="pull-right">
                                               <button class="btn btn-success" data-toggle="modal" data-target="#add_new_user_modal">Add New Record</button>
                                           </div>
                                      </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <h4>Records:</h4>
                                    <div class="records_content"></div>
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
    
    <!-- Custom Theme Scripts -->
	<script src="build/js/special.js"></script>
  <script src="build/js/custom.min.js"></script>
  <script>
  
  </script>
  </body>
</html>