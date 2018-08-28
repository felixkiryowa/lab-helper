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

        <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="build/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <?php include('php_action/authenticate_users.php');?>
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
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a>
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
                  
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h2 align="center">Summary Of Tests Done In <b style="color:red;"><?php  echo $_POST['month'];?></b></h2>
                        <br>
                        <div class="clearfix"></div>
                         <table id="summary" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>TEST</th>
                                <th>DONE IN TIME</th>
                                <th>NOT DONE IN TIME</th>
                                </tr>
                            </thead>

                            <tbody>
                               <?php

                                    require_once 'php_action/db_connect.php';
                                    if(isset($_POST['filter'])){
                                    $month = $_POST['month'];
                                    $sql = "SELECT * FROM laboratory_test_menu INNER JOIN performed_tests ON laboratory_test_menu.id=performed_tests.test_id ORDER BY test_id";
                                    $query = $con->query($sql);
                                    $current_cat = null;
                                    $test_array = array();
                                    $all_test_data = array();
                                    $fine_array = array();
                                    $not_fine_array = array();
                                    $save_fine =array();
                                    $save_not_fine = array();
                                    while($row = $query->fetch_assoc())
                                        {
                                          if($row['dispatch_time'] == null){

                                          }else{
                                            if(in_array($row['test'],$test_array)){

                                            }else{
                                            array_push($test_array,$row['test']);
                                            }
                                          }
                                           

                                    }
                                    
                                        foreach ($test_array as $value) {
                                                $sql1 = "SELECT * FROM laboratory_test_menu WHERE test = '$value'";
                                                $query1 = $con -> query($sql1);
                                                $row2 = $query1->fetch_assoc();
                                                $test_id = $row2['id'];
                                                $turn_around_time = $row2['turn_around_time'];
                                                //echo $turn_around_time."<br>";
                                                $sql = "SELECT * FROM performed_tests WHERE test_id = $test_id  AND month='$month'";

                                                //echo $sql."<br>";
                                                $query = $con->query($sql);
                                                while ($row = $query->fetch_assoc()){
                                                $stella =  $row['elapsed_time'];
                                                
                                                if($stella <= $turn_around_time){
                                                        array_push($fine_array,$row['elapsed_time']);
                                                }else{
                                                        array_push($not_fine_array,$row['elapsed_time']);
                                                }
                                                    
                                                }
                                            $fine_array_count = count($fine_array);
                                            $not_fine_array_count = count($not_fine_array);
                                            array_push($save_fine,$fine_array_count);
                                            array_push($save_not_fine,$not_fine_array_count);

                                            //unset($not_fine_array);
                                            array_splice($fine_array,0);
                                            array_splice($not_fine_array,0);
                                            
                                        

                                        }


                                    for($i=0;$i < count($test_array);$i++){
                                         echo "<tr>";
                                         echo "<td>".$test_array[$i]."</td>";
                                         echo "<td>".$save_fine[$i]."</td>";
                                         echo "<td>".$save_not_fine[$i]."</td>";
                                         echo "</tr>";
                                    }
                                       
                                        }
                                     ?>
                                    
                            </tbody>
                         </table>
					   
				            	</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

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
    <?php }?>
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
   
    <script src="build/js/custom.min.js"></script>
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
	<script src="build/js/special.js"></script>

  <script>
         $('#summary').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });
  </script>
  </body>
</html>