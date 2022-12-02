<?php 
        //Including Connection file
       include 'connection.php'; 

       // including header file
       include 'menu.php';

       //select query for update 
       $state_id=$_REQUEST['update'];
       $s="Select * from state where state_id=$state_id";
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
    alert("State Name ID must be filled");
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
    <h2> State Details</h2> </div>
    <!-- designing form for user interface -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" require>
        <table border="1" align="center">
            <tr>
                <td> State ID </td>
                <td>
                 <input class="text" name="state_id" id="state_id" value="<?php echo $fetch['state_id']?>"> </td>
            </tr>
            <tr>
                <td> State Name </td>
                <td>
                 <input class="text" name="name" id="name" value="<?php echo $fetch['name']?>"> </td>
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
            $state_id=$_POST['state_id'];
            $name=$_POST['name'];
            //update query
            $query="update state set name='$name' where state_id='$state_id'";
            $q123 = mysqli_query($con,$query);
            if($q123)
            {
                //Redirecting data to city page.
                header("location:state.php");
            }
            else{
                echo "not okay";
            }
        }   
    ?>
</body>
</html>