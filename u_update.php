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
           $city_idErr = "input is required";
         } else {
           $city_id= input_data($_POST["city_id"]);
           // check that the id is valid or not
            if (!preg_match("/^[a-zA-Z\\d*]{8,20}$/",$city_id)) {
               $city_idErr = "Only alphabates and numbers  are allowed";
           }
       }
    }
    $first_nameErr  = "";
     $first_name = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["first_name"])) {
            $first_nameErr = "input is required";
          } else {
            $first_name= input_data($_POST["first_name"]);
            // check that the first name is valid
             if (!preg_match("/^[a-z ,.'-]+$/",$first_name)) {
                $first_nameErr = "Only alphabates and numbers  are allowed";
            }
        }
     }
     $last_nameErr  = "";
     $last_name = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["last_name"])) {
            $last_nameErr = "input is required";
          } else {
            $last_name= input_data($_POST["last_name"]);
            // check that the lastname is valid
             if (!preg_match("/^[a-z ,.'-]+$/",$last_name)) {
                $last_nameErr = "Only alphabates and numbers  are allowed";
            }
        }
     }
     $emailErr  = "";
     $email = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "input is required";
          } else {
            $email= input_data($_POST["email"]);
            // check that the email is valid
             if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Only alphabates and numbers  are allowed";
            }
        }
     }
     $passwordErr  = "";
     $password = "";
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["password"])) {
            $passwordErr = "input is required";
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
            $addressErr = "input is required";
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
    <!-- designing form for user interface -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1" align="center">
            <tr>
                <td> User Id </td>
                <td>
                 <input class="text" name="id" id="id" value="<?php echo $fetch['id']?>">
                  </td>
            </tr>
            <tr>
                <td> City  ID</td>
                <td>
                <input class="text" name="city_id" id="city_id" value="<?php echo $fetch['city_id']?>"> 
                <span style="color:yellow">*<?php echo $city_idErr;?></span></td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> 
                <input class="text" name="first_name" id="first_name" value="<?php echo $fetch['first_name']?>"> 
                <span style="color:yellow">*<?php echo $first_nameErr;?></span></td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td>
                <input class="text" name="last_name" id="last_name" value="<?php echo $fetch['last_name']?>">
                <span style="color:yellow";>*<?php echo $last_nameErr;?></span></td>
            </tr>
            <tr>
                <td> Email </td>
                <td>
                <input class="text" name="email" id="email" value="<?php echo $fetch['email']?>">
                <span style="color:yellow";>*<?php echo $emailErr;?></span> </td>
            </tr>
            <tr>
                <td> Password </td>
                <td>
                 <input type="password" name="password" id="password" value="<?php echo $fetch['pincode']?>"> 
                 <span style="color:yellow";>*<?php echo $passwordErr;?></span> </td>
            </tr>
            <tr>
                <td> Address </td>
                <td> 
                <input class="text" name="address" id="address" value="<?php echo $fetch['address']?>"> 
                <span style="color:yellow";>*<?php echo $addressErr;?></span></td>
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
            // fetching validation variables
            if($city_idErr=="" && $first_nameErr=="" && $last_nameErr=="" && $emailErr=="" && $passwordErr=="" && $addressErr=="" ){
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
    }
    ?>
    
</body>
</html>