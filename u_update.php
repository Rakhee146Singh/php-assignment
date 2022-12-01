<?php 
        //Including Connection file
       include 'connection.php'; 

       // including header file
        include 'menu.php';

        //select query for update 
       $id=$_REQUEST['update'];
       $s="Select * from user where id=$id";
       $q=mysqli_query($con,$s);
       $fetch=mysqli_fetch_array($q);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
    //validation for no empty data allowed
function validateForm() {
    var x = document.forms["myForm"]["id"].value;
  if (x == "" || x == null) {
    alert("ID cannot be changed");
    return false;
  }
  var x = document.forms["myForm"]["city_id"].value;
  if (x == "" || x == null) {
    alert("City ID must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["first_name"].value;
  if (x == "" || x == null) {
    alert("First Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["last_name"].value;
  if (x == "" || x == null) {
    alert("Last Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["email"].value;
  if (x == "" || x == null) {
    alert("Email ID must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["password"].value;
  if (x == "" || x == null) {
    alert("Password must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["address"].value;
  if (x == "" || x == null) {
    alert("Address must be filled out");
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
    <!-- designing form for user interface -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" required>
        <table border="1" align="center">
            <tr>
                <td> User Id </td>
                <td>
                 <input class="text" name="id" id="id" value="<?php echo $fetch['id']?>"> </td>
            </tr>
            <tr>
                <td> City  ID</td>
                <td>
                <input class="text" name="city_id" id="city_id" value="<?php echo $fetch['city_id']?>"> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> 
                <input class="text" name="first_name" id="first_name" value="<?php echo $fetch['first_name']?>"> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td>
                <input class="text" name="last_name" id="last_name" value="<?php echo $fetch['last_name']?>"> </td>
            </tr>
            <tr>
                <td> Email </td>
                <td>
                <input class="text" name="email" id="email" value="<?php echo $fetch['email']?>"> </td>
            </tr>
            <tr>
                <td> Password </td>
                <td>
                 <input type="password" name="password" id="password" value="<?php echo $fetch['pincode']?>"> </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> 
                <input class="text" name="address" id="address" value="<?php echo $fetch['address']?>"> </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <input class="submit" type="submit" name="Update" value="Update" id="Update">
                </td>
            </tr>
        </table>
    </form>
    <?php
        //on clicking button statement
        if(isset($_POST['Update']))
        {
            //fetching data from table
            $id=$_POST['id'];
            $city_id=$_POST['city_id'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $address=$_POST['address'];
            //update query
            $query="update user set city_id=$city_id,first_name='$first_name',last_name='$last_name',email='$email',password='$password',address='$address' where id=$id";
            if(mysqli_query($con,$query))
            {
                //Redirecting data to city page.
                header("location:user.php");
                echo "Updated Successfully";
            }
            else
            {
                echo "Not Updated";
            }
        }
    ?>
    
</body>
</html>