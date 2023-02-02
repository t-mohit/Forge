<html>
<head>
    <title>The forge Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
 <div class="Homecontainer">

 <?php
   // print_r($_POST);
   if(isset($_POST["submit"])){
   // $Id=$_POST['Id']  
   $uname = $_POST["uname"];
   $emailid  = $_POST["emailid"];
   $password  = $_POST["password"];
   $passwordbcrypt = password_Hash($password,PASSWORD_DEFAULT);
   $errors = array();
            
            if ( empty($uname) || !preg_match ("/^[a-zA-z]*$/", $uname) ) {
             array_push($errors,"Enter Username");
               }
            if (empty($emailid) || (!filter_var($emailid, FILTER_VALIDATE_EMAIL))) {
               array_push($errors,"Enter valid Email");
            }
            if (empty($password) || strlen($password)<6 ) {
               array_push($errors,"  Password must contain 6 digits");
            }
             require_once"dbconnect.php";

             $sql = "SELECT * FROM register WHERE emailId = '$emailid'";
             $result = mysqli_query($dbconn, $sql);
             $rowCount = mysqli_num_rows($result);
             if ($rowCount>0) {
               array_push($errors,"Email already exists!");
              }

            if (count($errors)>0) {
             foreach ($errors as  $error) 
             { echo "<div class='alert alert-warning'>$error</div>";}
            }
            
              else{
               $sql = "INSERT INTO register (username, emailId, password) VALUES (?,?,?)";
               $stmt = mysqli_stmt_init($dbconn);
               $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
               if ($prepareStmt) 
               {
                  mysqli_stmt_bind_param($stmt,"sss",$uname, $emailid, $passwordbcrypt);
                  mysqli_stmt_execute($stmt);
                  echo '<a href="login.php"> Login</a>'; 
                
               }
                    die("Something went wrong");
             }} ?>

      <h3>Registration Page</h3>
    <form action="register.php" method="post" autocomplete="off">
       <div class="form-group">
        <label for="username"  >Username:</label><br>
        <input type="name"  class="form-control" id="uname" name="uname" placeholder="enter username">
        <br>
       </div>

     <div class="form-group">
        <label for="emailId" >emailId:</label><br>
        <input type="emailId" autocomplete="false" class="form-control" id="emailid" name="emailid"  placeholder="enter emailId">
        <br>
     </div>

     <div class="form-group">  
        <label for="password">Password:</label><br>
        <input type="password" class="form-control" ikd="password" name="password" placeholder="enter password" autocomplete="new-password">
        <br>
     </div>
     <div class="form-group">
     <button type="submit" value="Register" class="btn btn-success" name="submit">Register</button>
     </div>
     <br>
     <div class="link">
    <p>Already have an account? <a href="login.php">Login</a>.</p>
    </div>
  </form>
</div>

</body>

</html>