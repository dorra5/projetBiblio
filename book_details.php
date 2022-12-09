<?php
session_start();
include 'includes/connect.php';
require_once 'valid.php';
?>
<html lang = "eng">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            background-repeat: no-repeat;}
         #opacity{
           /* border: 3px solid #f1f1f1;*/
            position: absolute;
            overflow: hidden;
            background-color:  rgba(0, 0, 0, 0.5);
            height: 100%;
            width: 100%;
            display: block;}
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
          outline: none;}
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
          border:none;}


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
          background-color: #f5f5f5;
          position: relative;
          overflow-y: scroll;
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
        .home{
             position: relative;
             overflow: hidden;
             width:80%;
             display: block;
             margin: 70px auto 50px auto;
             border: 10px solid darkred;  }
        .imgHome{
            display: block;
            width: 100%;
            height: 600px;
            text-align: center; }
        table {
            display:block;
            width:80%;
            margin: 20px auto 0px auto ;
            border-collapse: collapse;
        }
        th{
           width:200px;
           color: #3c763d;
           background-color: #dff0d8;
           border-top: 1px solid #cecfd5;
           border-bottom: 1px solid black;
           border-left: 1px solid #cecfd5;
           border-right: 1px solid #cecfd5;
           text-align: center;
           
        }
        td {
           border-top: 1px solid black;
           border-bottom: 1px solid black;
           border-left: 1px solid #cecfd5;
           border-right: 1px solid #cecfd5;
           padding: 0px 10px;
           text-align: left;
        }
        #action{
           width:300px;
           padding: 20px 10px; 
        }
        #msgEtat{
            width:79.5%;
            position: relative;
            overflow: hidden;
            color: #31708f;
            background-color: #d9edf7;
            border:1px solid #bce8f1;
            padding:23px;
            margin:40px 80px 0px 163px;
            border-radius: 4px;
        }
        #msgEtat p{
            font-size: 18px;
            vertical-align: middle;
        }
        .addNew{
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            display: block;
            padding: 8px 12px;
            margin: 35px 60px 15px 163px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;}
        .delete{
            float: left;
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
            display: block;
            padding: 8px 12px;
            margin: 10px 10px 10px 60px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .edit{
            float: left;
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
            display: block;
            padding: 8px 12px;
            margin: 10px 40px 10px 10px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .back{
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
            display: block;
            padding: 8px 12px;
            margin: 35px 60px 40px 163px;
            font-size: 15px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;}
       #myInput {
          vertical-align: middle;
          background-image: url('images/search.png'); /* Add a search icon to input */
          background-size: 25px 25px;
          background-position: 10px 12px; /* Position the search icon */
          background-repeat: no-repeat; /* Do not repeat the icon image */
          width:15%; /* Full-width */
          font-size: 16px; /* Increase font-size */
          padding: 12px 20px 12px 40px; /* Add some padding */
          border: 1px solid #ddd; /* Add a grey border */
          margin:0px 0px 0px 1200px; /* Add some space below the input */
        }
        #admin_form{
            border: 2px solid lightgray;
            position: relative;
            overflow: hidden;
            display: block;
            margin:10px auto;
            max-width: 80%;
            padding: 45px 12px 10px 0px;
            font: 14px "Lucida Sans Unicode", "Lucida Grande", sans-serif;   
        }
        .form-group {
            position: relative;
            overflow: hidden;
            max-width: 60%;
            display: block;
            margin:30px auto 30px auto;
         }
        .form-group label{
            float:left;
            margin:5px 20px 3px 20px;
            padding:0px;
            display:block;
            font-weight: bold;
            vertical-align: middle;
       }
        .form-group input[type=text], 
        .form-group input[type=password],
        .form-group input[type=date],
        .form-group input[type=datetime],
        .form-group input[type=number],
        .form-group input[type=search],
        .form-group input[type=time],
        .form-group input[type=url],
        .form-group input[type=email],
         textarea, 
         select{
            width: 80%;
            float:left;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border:1px solid #BEBEBE;
            padding: 10px;
            margin:0 20px 0px 0px;
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;	
            vertical-align: middle;
        }
        .form-group input[type=text]:focus, 
        .form-group input[type=password]:focus,
        .form-group input[type=date]:focus,
        .form-group input[type=datetime]:focus,
        .form-group input[type=number]:focus,
        .form-group input[type=search]:focus,
        .form-group input[type=time]:focus,
        .form-group input[type=url]:focus,
        .form-group input[type=email]:focus,
        .form-group textarea:focus, 
        .form-group select:focus{
            -moz-box-shadow: 0 0 8px #88D5E9;
            -webkit-box-shadow: 0 0 8px #88D5E9;
            box-shadow: 0 0 8px #88D5E9;
            border: 1px solid #88D5E9;
        }
        .form-group button{
            font-weight: bold;
            font-size: 14px;
            background-color: #337ab7;
            border-color: #2e6da4;
            padding: 8px 15px 8px 15px;
            margin-left: 110px;
            color: #fff;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .form-group button:hover{
            background: #4691A4;
            box-shadow:none;
            -moz-box-shadow:none;
            -webkit-box-shadow:none;
        }
         .books{
             border:2px solid green;
             position: relative;
             overflow: hidden;
             width:90%;
             display:block;
             margin: 50px auto 0px auto;   
             padding: 0px 0px 0px 70px;
        }
        .book{
             position: relative;
             overflow: hidden;
             border:2px solid red;
             width:22%; 
             float:left;
             margin:0px 30px 30px 0px;
        }
        .book img{
            display: block;
            border:2px solid green;
            margin:5px auto 10px auto;
        }
        .seeMore{
            float: left;
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
            display: block;
            padding: 8px 12px;
            margin: 15px 20px 15px 48px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .borrowBook{
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            display: block;
            padding: 8px 12px;
            margin: 15px 0px 15px 0px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            float: left; 
        }
        .more{
            position: relative;
            overflow: hidden;
            width:50%;
            height:320px;
            max-height:320px;
            display: block;
            margin: 70px auto 50px auto;
            border: 2px solid darkred; 
        }
        .part1{
            position: relative;
            overflow: hidden;
           /* border: 2px solid yellow;*/
            width:35%;
            max-height:320px;
            min-height:320px;
            float:left;
        }
        .part1 img{
            display: block;
            width: 100%;
            margin: 5px 5px 5px 5px;
        }
        .part2{
            position: relative;
            overflow: hidden;
            margin-left: 10px;
           /* border: 2px solid yellow;*/
            width:50%;
            min-height:700px;
            float:left; 
            height:500px;
        }
        a{text-decoration: none;}
    </style>
</head>
<body>
    
    
    
    <div class="sidenav">
        <div id="opacity">
            <div class="imgcontainer">
                <img src="images/avatar.png" alt="Avatar" class="avatar">
                <h2> <?php  echo $_SESSION['userName'] ;?> </h2>
            </div>
           <a href="student_home.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home </a>
            
            <a href="books.php"><i class="fa fa-book" aria-hidden="true"></i>&nbsp; Books </a>
            
             <a href="returned_student.php"><i class="fa fa-th" aria-hidden="true"></i>&nbsp; Books Status </a>
            
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
        <a href="books.php"> <button class="back" ><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>&nbsp;Back</button> </a>
        <div class="more">
            <?php
                   $id=$_GET['id'];
                   $selectBook=$db->prepare("SELECT * FROM book WHERE id=$id");
                   $selectBook->execute();
                   while ($s=$selectBook->fetch()){
            ?>	
                
            <div class="part1 ">
                
               <img <?php echo"src=\"".$s['photo']."\""; ?> alt="book" width="350px" height="300px" > 
               
            </div>
            <div class="part2">
                 <p style="margin:5px 0px 15px 10px;"> title : <?php echo $s['title']; ?></p>
                <p style="margin:5px 0px 15px 10px;"> description : <?php echo $s['description']; ?></p>
                <p style="margin:5px 0px 15px 10px;"> category : <?php echo $s['category']; ?></p>
                <p style="margin:5px 0px 15px 10px;"> author : <?php echo $s['author']; ?></p>
                <p style="margin:5px 0px 15px 10px;"> datepublish : <?php echo $s['datepublish']; ?></p>
                <p style="margin:5px 0px 0px 10px;"> qty: <?php echo $s['qty']; ?></p>
                
            
            </div>
            <?php 
                }
             
            ?>
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