<?php 
        //Including connection file
        include 'connection.php'; 

        //including header file
        include 'menu.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <?php
    //validation performed
    $city_idErr  = "";
    $city_id = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (empty($_POST["city_id"])) {
           $city_idErr = "input  is required";
         } else {
           $city_id= input_data($_POST["city_id"]);
           // check that the  is valid or not
            if (!preg_match("/^[a-zA-Z\\d*]{8,20}$/",$city_id)) {
               $city_idErr = "Only numbers  are allowed";
           }
       }
    }
    $first_nameErr  = "";
     $first_name = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $first_nameErr = "input  is required";
          } else {
            $first_name= input_data($_POST["first_name"]);
            // check that the first name is valid
             if (!preg_match("/^[a-z ,.'-]+$/",$first_name)) {
                $first_nameErr = "Only alphabates are allowed";
            }
        }
     }
     $last_nameErr  = "";
     $last_name = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["last_name"])) {
            $last_nameErr = "input  is required";
          } else {
            $last_name= input_data($_POST["last_name"]);
            // check that the lastname is valid
             if (!preg_match("/^[a-z ,.'-]+$/",$last_name)) {
                $last_nameErr = "Only alphabates are allowed";
            }
        }
     }
     $emailErr  = "";
     $email = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "input  is required";
          } else {
            $email= input_data($_POST["email"]);
            // check that the email is valid
             if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Unvalid Email";
            }
        }
     }
     $passwordErr  = "";
     $password = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password"])) {
            $passwordErr = "input  is required";
          } else {
            $password= input_data($_POST["password"]);
            // check that the password is valid
             if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/",$password)) {
                $passwordErr = "Only alphabates and numbers  are allowed";
            }
        }
     }
    $addressErr  = "";
     $address = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["address"])) {
            $addressErr = "input  is required";
          } else {
            $address= input_data($_POST["address"]);
            // check that the address is valid
             if (!preg_match("/^[a-z ,.'-]+$/",$address)) {
                $addressErr = "Only alphabates and numbers  are allowed";
            }
        }
     }

     function input_data($data)
     {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     ?>
    <!-- form designing for user interface -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <table border="1" align="center">
            <tr>
                <td> City </td>
                <td>
                <input class="text" name="city_id" id="city_id">
                <span style="color:yellow">*<?php echo $city_idErr;?></span> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> 
                <input class="text" name="first_name" id="first_name"> 
                <span style="color:yellow">*<?php echo $first_nameErr;?></span></td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td>
                <input class="text" name="last_name" id="last_name"> 
                <span style="color:yellow">*<?php echo $last_nameErr;?></span></td>
            </tr>
            <tr>
                <td> Email </td>
                <td>
                <input class="text" name="email" id="email" >
                <span style="color:yellow">*<?php echo $emailErr;?></span> </td>
            </tr>
            <tr>
                <td> Password </td>
                <td>
                 <input type="password" name="password" id="password">
                <span style="color:yellow">*<?php echo $passwordErr;?></span> </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> 
                <input class="text" name="address" id="address">
                <span style="color:yellow">*<?php echo $addressErr;?></span> </td>
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
            //fetching validation variables
            if($city_idErr=="" && $first_nameErr=="" && $last_nameErr=="" && $emailErr=="" && $passworsErr=="" && $addressErr=="")
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
                    //redirecting page on click button function
                    echo "<td>";echo "<a href='u_update.php?update=".$row['id']."'>Update</a>";echo "</td>";
                    echo "<td>";echo "<a href='user.php?Delete=".$row['id']."'>Delete</a>";echo "</td>";
                echo "<tr>";   
            }
        }
        ?>
    </table>
</body>

</html>