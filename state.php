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
  var x = document.forms["myForm"]["name"].value;
  if (x == "" || x == null) {
    alert(" State Name must be filled");
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
    <!-- form designing for user interface -->
    <form method="POST" name="myForm" onsubmit="return validateForm()" required>
        <table border="1" align="center">
            <tr>
                <td> State Name </td>
                <td>
                 <input class="text" name="name" id="name"> </td>
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
            $name=$_POST['name'];
            //insert query for table
            $query="insert into state(name)values('$name')";
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
            $state_id=$_REQUEST['Delete'];
            //delete query for data
            $delete="delete from state where state_id='$state_id'";
            $result=mysqli_query($con,$delete);
            if($result)
            {
                //redirecting data to city page
                header("location:state.php");
            }
            else
            {
                echo "<script>alert('Data Not Removed')</script>";
            }
        }

       
    ?>
    <br><br>
    <!-- Table design for showing data of table -->
    <table border="1">
        <tr>
            <th>State ID</th>
            <th>State Name</th>
            <th colspan="2"> Action </th>
        </tr>
        <?php
        // select query for data
        $fquery="select * from state";
        $result=mysqli_query($con,$fquery);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<td>";echo $row['state_id'];echo "</td>";
                    echo "<td>";echo $row['name'];echo "</td>";
                    //redirecting page on click button fuction
                    echo "<td>";echo "<a href='s_update.php?update=".$row['state_id']."'>Update</a>";echo "</td>";
                    ?>
                   <td><a href="state.php?Delete=<?php echo $row['state_id'];?>">  Delete </a></td>
                    <?php
                echo "</tr>";
            }
        }
        ?>
        </table>
</body>
</html>