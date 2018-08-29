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
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/special/custom.min.css" rel="stylesheet">
  </head>
  <?php include('php_action/authenticate_users.php');?>
  <body>
    
    <div class="container" style="padding-top:10px;">
       <div class="row" style="border-style: double;">
	        <div class="col-sm-4" style="padding-top:5px;">
             <a href="index.php" class="btn btn-default"><i class="fa fa-arrow-left"></i>   Main Dashboard</a>
          </div>
			<div class="col-sm-4">
			  <h3>Hospital Lab-Helper System</h3>
			</div>
			<div class="col-sm-4"></div>
		</div>
    </div>
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php  if($error['login_error'] != ""){
              ?>
              <div class="alert alert-danger">
               <strong>
               <?php
                  echo $error['login_error'];
                ?>
               </strong>
            </div>
              <?php }?>
           
            <form action="" method="POST">
              <h1>Login</h1>
			        <h1 style="font-size:40px;"><i class="fa fa-h-square"></i></h1>
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username"  />
                <span class="text text-danger">
                  <?php
                    echo $error['username'];
                  ?>
                 </span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password"  />
                  <span class="text text-danger">
                  <?php
                    echo $error['password'];
                  ?>
                 </span>
              </div>
              <div>
                <button class="btn btn-dark btn-lg btn-block "  type="submit" name="authenticate_users">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <br>
                  <p>©2018 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
	<script type="text/javascript" src="build/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="build/js/bootstrap.min.js"></script>
  </body>
</html>
