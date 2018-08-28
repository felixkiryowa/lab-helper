<?php
   require_once 'db_connect.php';
   
   session_start();
   $x = "";
   $error = array( 
                   'username' => '',
                    'password' =>'',
                    'login_error' => ''
                 );
   if(isset($_POST['authenticate_users'])) {
     $username = $_POST['username'];
     $password = $_POST['password']; 

     if($username == ''){
       $error['username'] = 'Username field can not be empty';
     }
     if($password == ''){
        $error['password'] = "Password field can not be empty";
     }
 
    if(empty(array_filter($error))){
      
      $sq="SELECT * FROM users WHERE username='$username' AND password='$password' ";
     
      $query = $con ->query($sq);
  
      
      $row = $query->fetch_assoc();
      $count = mysqli_num_rows($query);
      $names = $row['name'];
      if($count == 1) {

              $_SESSION['login_user'] = $names;
         
              header("location: ../dashboard.php");
       
      }
	  else {
         
          // echo '<script>
          //    alert("Your email or Password is invalid");
          //    </script>';
          $error['login_error'] = "Username or password is wrong,Please Try Again !";
      }  
    }
  
   
   }
?>