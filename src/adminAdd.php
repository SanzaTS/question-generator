<?php

   include("connection.php");
   include("session.php");
   $error = "";
   if(isset($_POST['save']))
   {
	   $num =$_POST['num'];
	   $name = $_POST['name'];
	   $surname = $_POST['surname'];
	   $email = $_POST['email'];
     $subject = $_POST['subject'];
     $id = "";
      
     echo $subject;

   
	   if(!empty($num)||!empty($name)||!empty($surname)||!empty($email)||!empty($subject))
	   {
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (is_numeric($num)) {
                    if(strlen($num) == 10)
                    {
                        if(strlen($name) >= 3)
                        {
                           if(strlen($name) >= 3)
                           {
                            
                              $check1 = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");

                              if(mysqli_num_rows($check1)== 0)
                              {
                                  $check2 = mysqli_query($con,"SELECT * FROM lecture WHERE lecture_id = $num ");

                                  if(mysqli_num_rows($check2) == 0)
                                  {
                                    $sql1 = "INSERT INTO users(email,password,role) VALUES('$email','password','Lecture')";
	 
                                    if(mysqli_query($con,$sql1) or die(mysqli_error($con)))
                                  {     
                                    $sql2 = "INSERT INTO lecture(lecture_id,lecture_name,lecture_surname,lecture_emai) VALUES('$num','$name','$surname','$email')";	   
                
                                    if(mysqli_query($con,$sql2) or die(mysqli_error($con)))
                                       {
                                        $sql3 = "INSERT INTO lecture_subject(lecture_id,subject_code) VALUES($num,(SELECT subject_code FROM subject WHERE Subject_name = '$subject'));";
                   
                                        if(mysqli_query($con,$sql3) or die(mysqli_error($con)))
                                              {
                                                   echo "Sucessfully inserted";
                                               }
                                       }
                                  }
                  

                                  }
                                  else{
                                    $error = "Lecture number already exists  <a href=\"admin.php\">Click Here to verify</a>";
                                  }
                              }
                              else{
                                $error = "Email already exists,Try again!!";
                              }


                           }
                           else{
                             $error = "Lecture surname can not be less then 3 charecter";
                           }
                        }
                        else
                          {
                            $error = "Lecture name can not be less the 3 charecters long";
                          }
                    }
                    else
                    {
                       $error = "Lecture number must be 10 digits";
                      
                    }
            
                }
                 else {
                   $error ="lecture number must be a number";
               }
          
         
          }
          else{
            $error = "Invalid email format";
          }
      }
     else
     {
      $error = "Please make sure all fields are submitted";
     }
	   
	 
    }
?>


<!DOCTYPE html>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Add Information<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="adminAdd.php">Lecture Information</a></li>
                <li><a href="adminChat.php">Send Massage</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Views<b class="caret"></b></a>
              <ul class="dropdown-menu">
    
                <li><a href="admin.php">Lectures</a></li>
                <li><a href="adminRep.php">Admin Info</a></li>
                <li><a href="adminMsg.php">Massages</a></li>
                 
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
             
        
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['email'];?>Admin<b class="caret"></b></a>
              
     
              <ul class="dropdown-menu">
                
                <li class="divider"></li>
                <li><a href="adminProfile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
           
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>


      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Forms <small>Enter Your Data</small></h1>
            
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> AdminAdd</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <a class="alert-link" target="_blank" href="">Enter Lecture information below</a> 
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form role="form" id="formLogin" novalidate="" method="POST">

            <label style="color:red;" ><?php echo $error; ?></label>

             
			  <div class="form-group">
                <label>Lecture Number</label>
                <input class="form-control" name="num" id="num" placeholder="Lecture Number">
              </div>

              <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" id="name" placeholder="Lecture Name">
              </div>
               <div class="form-group">
                <label>Surname</label>
                <input class="form-control"  name="surname" id="surname" placeholder="Lecture Surname">
              </div> 
              <div class="form-group">
                <label>Email</label>
                <input class="form-control"name="email" id="email"  placeholder="Lecture Email">
              </div> 
              <div class="form-group">
                <label>Subject Name</label>
                <Select name="subject">
				<option value =""> Select Subject <option>
				 
				 <?php 
				    include("connection.php");
					
					$query = " SELECT * FROM subject";
					
					$results = mysqli_query($con,$query);
					
					while($row = mysqli_fetch_array($results))
					{
						$name = $row['Subject_name'];
					?>
                     
					 <option value="<?php  echo $name; ?>" > <?php echo $name; ?> <option>
					 
                    <?php					
					}
				 
				 ?>
				
				</select>
              </div> 
              

              <button type="submit" class="btn btn-default"  name="save"id="save">Add Lecture</button>
               

            </form>

          

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>