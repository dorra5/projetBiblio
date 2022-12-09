<!DOCTYPE html>
<?php 

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
              $messageDerreur="Incorrect username or password";
           }

     }else{
      echo"please complete all fields";
     }

}

?>

<html lang = "eng">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        /* style div body */
        body{
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
            background-image: url(images/library.jpeg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #opacity{
            position: absolute;
            overflow: hidden;
            background-color:  rgba(0, 0, 0, 0.3);
            height: 100%;
            width: 100%;
            display: block;
        }
        /* Bordered form */
        form {
          border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px auto 8px auto;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
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
    </style>
</head>
<body>
<div id="opacity">
       <h2>Login here..</h2> 
    <form action="login.php" method="post">
      <div class="imgcontainer">
        <img src="images/avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="userName"><b>Username</b></label>
        <input type="text"  name="userName" placeholder="Enter Username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="LoginButton">Login</button>

      </div>

    </form>
 </div>   

</body>
</html>