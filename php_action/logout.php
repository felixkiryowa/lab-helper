<?php
  session_start();
  if( session_destroy()){
     
	 header("Location:../login.php"); //Redirecting to homepage
  
  
  }  //destroying all sessions
   
?>