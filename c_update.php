<?php 
    //including connection file
       include 'connection.php'; 

    // including header file
       include 'menu.php';

    //select query for Update
       $city_id=$_REQUEST['update'];
       $s="Select * from city where city_id=$city_id";
       $q=mysqli_query($con,$s);
       $fetch=mysqli_fetch_array($q);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
    //validation for no empty data allowed
function validateForm() {
  var x = document.forms["myForm"]["state_id"].value;
  if (x == "" || x == null) {
    alert("State ID must be filled");
    return false;
  }
  var x = document.forms["myForm"]["name"].value;
  if (x == "" || x == null) {
    alert("City Name must be filled");
    return false;
  }
  var x = document.forms["myForm"]["pincode"].value;
  if (x == "" || x == null) {
    alert("Pincode must be filled");
    return false;
  }
}
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Exercise</title>
    <!-- including CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div align="center" border="1"> 
    <h2> City Details</h2> </div>
    <!-- form designing for user interface  -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" required>
        <table border="1" align="center">
            <tr>
                <td> State Id </td>
                <td>
                 <input class="text" name="state_id" id="state_id" value="<?php echo $fetch['state_id']?>"> </td>
            </tr>
            <tr>
                <td> City Name </td>
                <td>
                 <input class="text" name="name" id="name" value="<?php echo $fetch['name']?>"> </td>
            </tr>
            <tr>
                <td> Pincode </td>
                <td>
                 <input class="text" name="pincode" id="pincode" value="<?php echo $fetch['pincode']?>"> </td>
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
         $city_id=$_POST['city_id'];
         $state_id=$_POST['state_id'];
         $name=$_POST['name'];
         $pincode=$_POST['pincode'];
         //update query
         $query="update city set state_id=$state_id,name='$name',pincode=$pincode where city_id=$city_id";
         $q1 = mysqli_query($con,$query);
            if($q1)
            {
                //Redirecting data to city page.
                header("location:city.php");
            }
            else
            {
                echo "not okay";
            }
     }
?>
</body>
</html>