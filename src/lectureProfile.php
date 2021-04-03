
<?php
  include("session.php");
  include("connection.php");


  $email = $_SESSION['email'];

  
  if(isset($_POST['update']))
  {
    $lid = $_POST['num'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['email'];
    $role = $_POST['role'];

 
 
   
    
      $sql = "UPDATE lecture SET lecture_name ='$name',lecture_surname = '$surname' WHERE lecture_id = $lid ";
      if(mysqli_query($con,$sql))
       {
          echo "Successfully Update information";
          // header("location:lecture.php");
        }
        else{
         echo "Faled to insert the lecture info".mysqli_error($con);
         }

    



 }

 if(isset($_POST['Admin']))
 {
  $lid = $_POST['num'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $mail = $_POST['email'];
  $role = "Admin";

         /* echo "Successfully Update information";
          header("location:lecture.php"); */
     $sql = "UPDATE `users` SET`role`='Admin' WHERE `email` = '$email'";
     if(mysqli_query($con,$sql) or die(mysqli_error($con)))
      {
         $sql1 = "INSERT INTO admin(admin_name,admin_surname,admin_email) VALUES('$name','$surname','$email')";

          if(mysqli_query($con,$sql1))
          {
            $sql3 = "DELETE FROM lecture_subject WHERE lecture_id = $lid ";
            if(mysqli_query($con,$sql3))
            {
              $sql4 ="DELETE FROM lecture WHERE lecture_id = $lid";
              if(mysqli_query($con,$sql4))
              {
                ?>
                <script>
                alert('information updated: Please Note you have lost previleges as Lecture');
                   window.location.href='admin.php?success';
                   </script>
                   
               <?php
              }
              else{
               echo "Faled to insert the  info".mysqli_error($con);
              }

            }
            else{
             echo "Faled to insert the  info".mysqli_error($con);
            }

          }
          else
          {
           echo "Faled to insert the  info".mysqli_error($con);
          }
        
       }
       else{
        echo "Faled to insert the  info".mysqli_error($con);
        }      

    }
    
  
?>




<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Generator System</title>
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	
	

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Question Generator</a>
        </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Action<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="lecture.php">Create Queation Papers</a></li>
              <li><a href="addQuetion.php">add Queation </a></li>
                <li><a href="chat.php">Send Massage</a></li>
                <li><a href="search.php" target="_blank">Find Questions Online</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Views<b class="caret"></b></a>
              <ul class="dropdown-menu">
              
                <li><a href="subject.php">Subject List</a></li>
                <li><a href="files.php">Question Papers</a></li>
                <li><a href="massages.php">Massages</a></li>
                
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i> <span class="badge"></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name"></span>
                    <span class="message"></span>
                    <span class="time"><i class=""></i> </span>
                  </a>
                </li>
                <li class="divider"></li>
                
                <li class="divider"></li>
                <li><a href="#"> <span class="badge"></span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i>  <span class="badge"></span> <b class="caret"></b></a>
              
            <li class="dropdown user-dropdown">
                     

                  
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $email?> (Lecture)<b class="caret"></b></a>
              
                          
              <ul class="dropdown-menu">
                
                <li class="divider"></li>
                <li><a href="lectureProfile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
           
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

           <div class="row">
          <div class="col-lg-6">

           
                    <br>
                    <br>
                    <br>
            
                        <label style="margin-left:300;">USER PROFILE</label><br>
						<br>
						<br>
						
					
						<br>
						<br>
						<br>
					
						<br>

            <?php
              $email = stripcslashes($email);
                $sql = "SELECT * FROM lecture WHERE lecture_emai = '$email' ";

               $results = mysqli_query($con,$sql) ;

               while($row = mysqli_fetch_array($results))
               {
                $lid = $row ['lecture_id'];
                $name = $row ['lecture_name'];
                $surname = $row ['lecture_surname'];
                $email = $row ['lecture_emai'];

               }



            ?>
            
            <form role="form" id="formLogin" novalidate="" method="POST" action="lectureProfile.php">

<?php 
// include("connection.php");
//include("session.php");

   


$sql = "SELECT * FROM lecture WHERE lecture_emai = '$email' ";

$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($results))
{
$lid = $row ['lecture_id'];
$name = $row ['lecture_name'];
$surname = $row ['lecture_surname'];
$email = $row ['lecture_emai'];
}
  


?>
  
  
<div class="form-group">
    <label>Lecture Number</label>
    <input class="form-control" name="num" id="num" value="<?php echo $lid; ?>">
  </div>

  <div class="form-group">
    <label>Name</label>
    <input class="form-control" name="name" id="name" value="<?php echo $name; ?>">
  </div>
   <div class="form-group">
    <label>Surname</label>
    <input class="form-control"  name="surname" id="surname" value=" <?php echo $surname; ?>">
  </div> 
  <div class="form-group">
    <label>Email</label>
    <input class="form-control"name="email" id="email"  value=" <?php echo $email; ?>">
  </div> 
  
  
  

  <button type="submit" class="btn btn-default"  name="update"id="update">Update Lecture</button>
  <button type="submit" class="btn btn-danger"  name="Admin"id="Admin" onclick="return confirm('Changing a role will remove your prvilege as  Lecture,Are you sure you want to continue?')">Become Admin</button>

</form>

      
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>