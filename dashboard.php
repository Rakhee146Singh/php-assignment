<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- designing the home page with responsive -->
<style>
  /* Embedded CSS code */
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(100deg, #FFB6C1 , #DB7093);
}

.topnav {
  overflow: hidden;
  background-color: gray;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color:#FFC0CB;
  color: black;
  opacity: 0.5;
}

.topnav a.active {
  background-color: #DB7093;
  color: white;
}

@media screen and (max-width: 100px) {
  .topnav a:not(:first-child) {display: none;}
}

@media screen and (max-width: 100px) {
  .topnav.responsive {position: relative;}
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  padding-top: 60px;
}
</style>
</head>
<body>
<!-- designing for user interface -->
<div class="topnav" id="myTopnav">
  <a href="dashboard.php" class="active">City Management</a>
  <a href="state.php">State</a>
  <a href="city.php">City</a>
  <a href="user.php">User</a>
</div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</body>
</html>
