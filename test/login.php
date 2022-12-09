<?php 
 session_start();
 include 'includes/connect.php';
 
 $errorMessage="";
 $userName="";
 $password="";
 $listRoles="";
//Si $_POST['boutonConnexion'] est bien définie
if (isset($_POST['LoginButton'])) {
    
   $userName=$_POST["userName"];
   $password=$_POST["password"];
       if($userName&&$password){

        $select = $db->prepare(" SELECT * FROM user WHERE userName='$userName' and password='$password'");
        $select->execute();
        // compter les nombres des lignes selectionner par rowCount() et les affecter dans la variable $count
        $count = $select->rowCount();
        //si les nombres des lignes ==1 donc mot de passe et pseudo correctes 
           if($count==1){
            //ouvrir une session 
                  $_SESSION['userName']=$userName;

             while($listRoles=$select->fetch(PDO::FETCH_ASSOC)){
                  $role=$listRoles['role'];
                  $_SESSION['role']=$role;
                  // redirection vers la page dashboard.php
                  //header('Location:dashboard.php');
            
                    if ($role=="admin"){
                        header('Location:admin_home.php');
                    }else{
                        header('Location:student_home.php');
                    } 
                 
              }

           }else{
              $errorMessage="Incorrect username or password";
           }

     }else{
      echo"please complete all fields";
     }

}

?>
<!--  partie html  -->
<html lang = "eng">
<head>
    <!--    -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {  margin:0; padding:0; box-sizing: border-box;}
        body {font-family: Arial, Helvetica, sans-serif;}
        /* style div body */
        body{
            position: relative;
            overflow-y:scroll;
            width: 100%;
            height: 100%;
            background-image: url(images/image.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #opacity{
           /* border: 3px solid #f1f1f1;*/
            position: absolute;
            overflow: hidden;
            background-color:  rgba(0, 0, 0, 0.3);
            height: 100%;
            width: 100%;
            display: block;
        }
        .logo{
            font-weight: bold;
            border-bottom: 3px solid #f1f1f1;
            width:100%;
            padding: 25px;
            background-color: burlywood;
        }
        .logo p{
            text-align: center;
            color:darkred;
            font-size: 40px;
            
        }
        .imgLogo{
            
            width:60px;
            height: 60px;
            vertical-align: middle;
            
        }
        /* Bordered form */
        form {
          
          background-color: rgba(0, 0, 0, 0.5); 
          border: 3px solid #f1f1f1;
          color:#fff;
          width: 50%;
          margin:80px auto 0px auto;
        }
        label{
          /*  border: 3px solid #f1f1f1;*/
            margin:15px 0px 0px 240px;
            
        }
        /* Full-width inputs */
        input[type=text], input[type=password] {
          width: 50%;
          padding: 12px 20px;
          margin: 8px auto 20px auto;
          display: block;
          border: 1px solid #ccc;
          box-sizing: border-box;
            
        }

        /* Set a style for all buttons */
        button {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 25px auto 20px auto;
          border: none;
          cursor: pointer;
          width: 50%;
          display: block;
          font-size: 17px;
        
        }

        /* Add a hover effect for buttons */
        button:hover {
          opacity: 0.8;
        }


        /* Center the avatar image inside this container */
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
        #message{
           text-align: center;
           margin:20px 0px 40px 0px; 
           text-shadow:5px 5px 5px red;  
        }

    </style>
</head>
<body>
<div id="opacity">
    <form action="login.php" method="post">
      <div class="logo">
        <p><img src="images/logo1.png" alt="logo" class="imgLogo"> &nbsp; Book's Library System</p>
      </div>
    
      <div class="imgcontainer">
        <img src="images/avatar.png" alt="Avatar" class="avatar">
        <h2>Login here..</h2>
      </div>

      <div class="container">
        <label for="userName"><b>Username</b></label>
        <input type="text"  name="userName" placeholder="Enter Username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="LoginButton">Login</button>
        <p id="message"> <br/><?php echo $errorMessage;?><br/></p>

      </div>

    </form>
    
    
    
 </div>   

</body>
</html>
