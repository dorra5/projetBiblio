<?php
session_start();
include 'includes/connect.php';
require_once 'valid.php';
?>
<html lang = "eng">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {  margin:0; padding:0; box-sizing: border-box;}
        body {font-family: Arial, Helvetica, sans-serif;}
        /******************************header******************/
        #header{
            width: 100%;
            height: 60px;
            position: relative;
            overflow: hidden;
            background-color: #fff;
            display: block;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);}
        #header p{
            text-align: center;
            color:darkred;
            font-size: 40px;  
            font-weight: bold;
        }
        .imgLogo{
            width:60px;
            height: 60px;
            vertical-align: middle;  
        }
        /******************************sidenav******************/
        /* avaatar image*/
        .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;  
        }

        /* Avatar image */
        img.avatar {
          width: 80px;
          border-radius: 50%;
        }
        .imgcontainer h2{
            margin-top:8px;
            color:#fff;
        }
        
       /* Fixed sidenav, full height */
        .sidenav {
            position: relative;
            overflow: hidden;
            height: 100%;
            width: 250px;
            z-index: 1;
            top: 0;
            left: 0;
            float: left;
            overflow-x: hidden;
            background-image:url(images/image.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
         #opacity{
           /* border: 3px solid #f1f1f1;*/
            position: absolute;
            overflow: hidden;
            background-color:  rgba(0, 0, 0, 0.5);
            height: 100%;
            width: 100%;
            display: block;
        }
        /* Style the sidenav links and the dropdown button */
        .sidenav a {
          padding: 20px 8px 20px 16px;
          text-decoration: none;
          font-size: 20px;
          color: #fff;
          display: block;
          background-color: rgba(0, 0, 0, 0.9);
          width: 100%;
          text-align: left;
          cursor: pointer;
          outline: none;
        }
        .dropdown-btn {
          padding: 20px 8px 20px 16px;
          text-decoration: none;
          font-size: 20px;
          color: #fff;
          display: block;
          background-color: rgba(0, 0, 0, 0.9);
          width: 100%;
          text-align: left;
          cursor: pointer;
          outline: none;
          border:none;
        }


        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover {
          /*color: darkred;
          background-color: burlywood;*/
            color: burlywood;
          
        font-weight: bold;
        }

        /* Main content */
        .main {
          height: 100%;
          background-color: #f1f1f1;
          position: relative;
          overflow: hidden;
          margin-left: 250px; /* Same as the width of the sidenav */
          font-size: 20px; /* Increased text to enable scrolling */
          
        }

        /* Add an active class to the active dropdown button */
        .active {
          background-color: green;
          color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
          display: none;
          background-color: #262626;
          padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
          float: right;
          padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
        .books{
             position: relative;
             overflow: hidden;
             width:90%;
             display:block;
             margin: 50px auto 0px auto;       
        }
        .book{
            border:2px solid red;
            width:25%; 
        }
        .book img{
       
            display: block;
            border:2px solid green;
            margin:5px auto 10px auto;
        }

</style>
</head>
<body>
    
    
    
    <div class="sidenav">
        <div id="opacity">
            <div class="imgcontainer">
                <img src="images/avatar.png" alt="Avatar" class="avatar">
                <h2> user name </h2>
            </div>
            <a href="student_home.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home </a>
            
            <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Books </a>
            
            <button class="dropdown-btn"><i class="fa fa-th" aria-hidden="true"></i>&nbsp;&nbsp;Transaction
            <i class="fa fa-caret-down"></i>
            </button>
                <div class="dropdown-container">
                <a href="#"> <i class="fa fa-book" aria-hidden="true"></i> &nbsp;Books Details</a>
                <a href="#"> <i class="fa fa-book" aria-hidden="true"></i> &nbsp;Books Status</a>

                </div>
            <button class="dropdown-btn"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Settings
            <i class="fa fa-caret-down"></i>
            </button>
                <div class="dropdown-container">
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a>
                </div>
        </div>
    </div>
    <div class="main">
        <div id="header">
            <p>&nbsp;&nbsp;&nbsp;<img src="images/logo1.png" alt="logo" class="imgLogo">&nbsp; Book's Library System</p>
        </div>
        <div class="books">
            <div class="book">
                <img src="images/anglais1.jpg" alt="book" > 
                <button id="add_admin" type="submit" name="add_admin" class="addNew" ><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New  </button>
                <button type="submit" name="edit" class="edit" ><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;&nbsp;See more </button>
            </div>
            
        </div>
       
    </div>
    
</body>
    
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
</script>
    
</html>