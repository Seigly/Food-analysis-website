<?php
    
     $firstname=$_POST['firstname'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $cpswd=$_POST['cpass'];
    

     //database connection
     
     $conn = new mysqli("localhost","root","","u_data");
     if($conn->connect_error)
     {
          die('Connection failed : '.$conn->connect_error);
     }
     else{
          $stmt = $conn->prepare("insert into data(firstname,email,pass,cpass)
                  values(?,?,?,?)");
          $stmt->bind_param("ssss",$firstname,$email,$password,$cpswd);
          $stmt->execute();
          ?>
          <script>
               alert("registration succesful");
               window.location.href = 'prove.php';
               </script>
          <?php
          $stmt->close();
          $conn->close();
         
     }
?>