<!DOCTYPE html>  
<html lang="en" >  
<head>  
  <meta charset="UTF-8">  
  <title> Hospital lala mghnia </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</head>  
<style>  
body {  
  font-family: 'Muli', sans-serif;  
}  
h1 {  
  color: #fff;  
  padding-bottom: 2rem;  
  font-weight: bold;  
}  
a {  
  color: #333;  
}  
a:hover {  
  color: #E8D426;  
  text-decoration: none;  
}  
.form-control:focus {  
    color: #000;  
    background-color: #fff;  
    border: 2px solid #E8D426;  
    outline: 0;  
    box-shadow: none;  
}  
.btn {  
  background: #28a745;  
  border: #E8D426;  
}  
.btn:hover {  
  background: #28a745;  
  border: #E8D426;  
}  
.bg{
  height: 100vh;
  width: 100%;
  background-image: linear-gradient(45deg,cyan,rgb(26, 26, 26));
}
</style>  
<body>  
<form method="POST" action="LO_IN.php">
  <div class="bg">
    <div class="roun"><img src="./public/logo.jpg" width="100px" ></div>
<div class="pt-5" style="margin-top: -50px;">  
  <h1 class="text-center">Hopital LALA MGHNIA</h1>  
<div class="container">  
                <div class="row">  
                    <div class="col-md-5 mx-auto">  
                        <div class="card card-body">  
                        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">  
<div class="form-group required">  
  <lSabel for="username"><p>Enter your status</p>  </lSabel>  
 <input type="text" title="status" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="admin,patient,médecin,infirmier ou employé" class="form-control text-lowercase" id="status" required="" name="status" placeholder="Admin,patient,médecin,infirmier ou employé" value="">  
   </div>    
<div class="form-group required">  
              <lSabel for="username"> Enter your Name / Email </lSabel>  
             <input type="text" class="form-control text-lowercase" id="username" required="" name="username" value="">  
               </div>                      
       <div class="form-group required">  
    <label class="d-flex flex-row align-items-center" for="password"> Enter your Password</label>  
<input type="password" class="form-control" required="" id="password" name="password" value="">  
       </div>  
     <br>
     <div class="row">
         <div class="form-group pt-1">  
      <input value="Sign In" class="btn btn-primary btn-block col-5 d-md-block" type="submit" name="sign">
      <input value="Log In" class="btn btn-primary btn-block col-5 d-md-block" type="submit" name="log" style="margin-left: 260px;margin-top: -36px;">
                  </div> 
                </div>   
                
              
</div>
</div>  
</form> 
<script>
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
  </script>
  <?php

  $servername = "localhost";
  $username ="root";
  $dbname ="rc";
  $password ="";
  
  
  $conn=new mysqli($servername,$username,$password,$dbname);
  if($conn-> connect_error)
     { 
      die ("connexion failed :".$conn-> connect_error);
     }
     $status=$_POST["status"];


     if(isset($_POST["username"]) && isset($_POST["password"])&& isset($_POST["sign"]))
{
    $login=$_POST["username"];
    $password=$_POST["password"];


    if($status=="admin" or $status=="Admin"){
    $sql_i="INSERT INTO admin(nom,pass) VALUES('".$login."','".$password."')";
    }
    else if ($status=="patient" or $status=="Patient"){
      $sql_i="INSERT INTO patient(nom,pass) VALUES('".$login."','".$password."')";
      }
    else if ($status=="médecin" or $status=="Médecin"){
      $sql_i="INSERT INTO médecin(nom,pass) VALUES('".$login."','".$password."')";
      }
    else if ($status=="infirmier" or $status=="Infirmier"){
      $sql_i="INSERT INTO infirmier(nom,pass) VALUES('".$login."','".$password."')";
      }
    else if ($status=="employé" or $status=="Employé"){
      $sql_i="INSERT INTO employé(nom,pass) VALUES('".$login."','".$password."')";
      } 
    if(mysqli_query($conn,$sql_i))
    {
      echo "";
    }
    else
    {
      echo 'error';
    }
}


function select($nomTable,$location){
  $sql_p="SELECT * FROM $nomTable WHERE nom='".$login."' AND Pass='".$password."'";  
  $req=mysqli_query($conn,$sql_p);
  $nombre=mysqli_num_rows($req);
  if ($nombre>0)
  {
    $row=mysqli_fetch_array($req); 
    header('Location: $location');
  }

  else{
  ?>
  <script>
    alert("le nom ou le mot de passe n'est pas valid");
  </script>  
  <?php
  }
}


if(isset($_POST["username"]) && isset($_POST["password"])&& isset($_POST["log"]))
{
  $login=$_POST["username"];
  $password=$_POST["password"];

  if($status=="admin" or $status=="Admin"){
      select('admin','info.php');
  }
 
  else if ($status=="patient" or $status=="Patient"){
      select('patient','patient.php');
  }
    
  else if ($status=="médecin" or $status=="Médecin"){
      select('médecin','info.php');

  } 
   
  else if ($status=="infirmier" or $status=="Infirmier"){
      select('infirmier','info.php');

  }     
   
  else if ($status=="employé" or $status=="Employé"){
      select('employé','info.php');

  }   
} 

  ?>
</body>  
</html>