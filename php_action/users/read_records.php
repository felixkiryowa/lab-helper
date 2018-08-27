<?php
    // include Database connection file
    require_once("../db_connect.php");
 
    // Design initial table header
    $data = '<table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>No.</th>
                            <th>Names</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
    $query = "SELECT * FROM users";
 
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
 
    // if query results contains rows then featch those rows
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['username'].'</td>
                <td>'.$row['password'].'</td>
                <td>
                    <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning btn-sm">Update</button>
                </td>
                <td>
                    <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>';
            $number++;
        }
    }
    else
    {
        // records now found
        $data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>
