<?php 
//si la variable $_SESSION['userName']=="" donc l'utilisateur n'est pas connecter
   if($_SESSION['userName']==""){
		header('location: login.php');
        exit();
   }
?>