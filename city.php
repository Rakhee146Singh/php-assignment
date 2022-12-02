<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
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
    <!-- Including CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div align="center" border="1"> 
    <h2> City Details</h2> </div>
    <!-- form designing for user interface -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" required>
        <table border="1" align="center">
            <tr>
                <td> State Id </td>
                <td>
                  <input class="text" name="state_id" id="state_id"> </td>
            </tr>
            <tr>
                <td> City Name </td>
                <td>
                 <input class="text" name="name" id="name"> </td>
            </tr>
            <tr>
                <td> Pincode </td>
                <td>
                 <input class="text" name="pincode" id="pincode"> </td>
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
        $state_id=$_POST['state_id'];
        $name=$_POST['name'];
        $pincode=$_POST['pincode'];

        //insert query for table 
        $query="insert into city(state_id,name,pincode)values($state_id,'$name',$pincode)";
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
    if(isset($_REQUEST['delete']))
        {
            //fetching data from table
            $city_id=$_REQUEST['delete'];
            //delete query for data
            $delete="delete from city where city_id='$city_id'";
            $result=mysqli_query($con,$delete);
            if($result)
            {
                //redirecting data to city page
                header("location:city.php");
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
            <th>City ID</th>
            <th>State ID</th>
            <th>City Name</th>
            <th>Pincode</th>
            <th colspan="2"> Action </th>
        </tr>
        <?php
        // select query for data
        $fquery="select * from city";
        $result=mysqli_query($con,$fquery);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>";echo $row['city_id'];echo "</td>";
                    echo "<td>";echo $row['state_id'];echo "</td>";
                    echo "<td>";echo $row['name'];echo "</td>";
                    echo "<td>";echo $row['pincode'];echo "</td>";

                    //redirecting page on click button fuction
                    echo "<td>";echo "<a href='c_update.php?update=".$row['city_id']."'>Update</a>";echo "</td>";
                    echo "<td>";echo "<a href='city.php?delete=".$row['city_id']."'>Delete</a>";echo "</td>";
                echo "<tr>";
            }
        }
        ?>
    </table>
    
</body>
</html>
