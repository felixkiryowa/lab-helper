<?php
 
//Including Database configuration file.
 
include "db_connect.php";
 
//Getting value of "search" variable from "script.js".
 
if (isset($_POST['search'])) {
 
//Search box value assigning to $Name variable.
 
   $test = $_POST['search'];
 
//Search query.
 
   $Query = "SELECT test FROM laboratory_test_menu WHERE test LIKE '%$test%' LIMIT 4";
 
//Query execution
 
   $ExecQuery = mysqli_query($con, $Query);
 
//Creating unordered list to display result.
 
   echo '
 
<table class="table">
 
   ';
 
   //Fetching result from database.
 
   while ($Result = mysqli_fetch_array($ExecQuery)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
 
   <tr onclick='fill("<?php echo $Result['test']; ?>")'>
      <td class="hovering">
        <span>
             <!-- Assigning searched result in "Search box" in "search.php" file. -->
            <?php echo $Result['test']; ?>
        </span>
      </td>
   </tr>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
</table>