<?php 
        //Including connection file
        include 'connection.php'; 

        //including header file
        include 'menu.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
    //validation for no empty data allowed
function validateForm() {
  var x = document.forms["myForm"]["city_id"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["first_name"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["last_name"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["email"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["password"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["address"].value;
  if (x == "" || x == null) {
    alert("Name must be filled out");
    return false;
  }
}
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Exercise</title>
    <!-- Including CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div align="center" border="1"> 
    <h2> User Page </h2> </div>
    <!-- form designing for user interface -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" required>
        <table border="1" align="center">
            <tr>
                <td> City </td>
                <td>
                <input class="text" name="city_id" id="city_id"> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> 
                <input class="text" name="first_name" id="first_name"> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td>
                <input class="text" name="last_name" id="last_name"> </td>
            </tr>
            <tr>
                <td> Email </td>
                <td>
                <input class="text" name="email" id="email"> </td>
            </tr>
            <tr>
                <td> Password </td>
                <td>
                 <input type="password" name="password" id="password"> </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> 
                <input class="text" name="address" id="address"> </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <button type="submit" name="insert" value="insert">Insert</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    //On click button condition
        if(isset($_POST['insert']))
        {
            //fetching data from table
            $city_id=$_POST['city_id'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $address=$_POST['address'];
            //insert query for table
            $query="insert into user(city_id,first_name,last_name,email,password,address)values($city_id,'$first_name','$last_name','$email','$password','$address')";
            if(mysqli_query($con,$query))
            {
                //echo "Inserted Successfully";
            }
            else
            {
                echo "Not Inserted";
            }
            //function used for not fetching data if refresh again in browser
            unset($_POST['insert']);
        }
        if(isset($_REQUEST['Delete']))
        {
            //fetching data from table
            $id=$_REQUEST['Delete'];
            //delete query for data
            $delete="delete from user where id='$id'";
            $result=mysqli_query($con,$delete);
            if($result)
            {
                //redirecting data to city page
                header("location:user.php");
            }
            else
            {
                echo "<script>alert('Data Not Removed')</script>";
            }
        }
    ?>
    <br>
    <br>
    <!-- Table design for showing data of table -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>City ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email ID</th>
            <th>Password</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        // select query for data
        $fquery="select * from user";
        $result=mysqli_query($con,$fquery);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>";echo $row['id'];echo "</td>";
                    echo "<td>";echo $row['city_id'];echo "</td>";
                    echo "<td>";echo $row['first_name'];echo "</td>";
                    echo "<td>";echo $row['last_name'];echo "</td>";
                    echo "<td>";echo $row['email'];echo "</td>";
                    echo "<td>";echo $row['password'];echo "</td>";
                    echo "<td>";echo $row['address'];echo "</td>";
                    //redirecting page on click button fuction
                    echo "<td>";echo "<a href='u_update.php?update=".$row['id']."'>Update</a>";echo "</td>";
                    echo "<td>";echo "<a href='user.php?Delete=".$row['id']."'>Delete</a>";echo "</td>";
                echo "<tr>";   
            }
        }
        ?>
    </table>
</body>

</html>