<!doctype html>
<html>
    <body>
        <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST")
       {
           define("INITIALIZING_DATABASE", 1);
           require_once("dbconnect.php");  
            
           mysqli_query($dbconn, "drop database if exists forge");
           mysqli_query($dbconn, "create database forge");
           mysqli_query($dbconn, "use forge");
            
           mysqli_query($dbconn,
               "create table register (
                   Id int(10) unsigned NOT NULL AUTO_INCREMENT,
                   username varchar(100) NOT NULL,
                   emailId varchar(100) NOT NULL,
                   password varchar(50) NOT NULL,
                   PRIMARY KEY(Id)
                   )ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4"
           );
        //    mysqli_query($dbconn,
        //        "insert into register(
        //            username,
        //            emailId,
        //            password
        //            )values('moht007','user@mail.com','mtalwar2000')"
        //    );
        //    echo "<h3> Database Initialized....</h3>";
       }
       ?>
        
        <form method="POST">
            <input type="submit" value="Constructing Database..."/>
        </form>
    </body>
</html>


