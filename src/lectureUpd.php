<?php 

include("connection.php");

if(isset($_POST['update']))
{
   $lnum = $_GET['id'];
   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $email =$_POST['email'];
   $subject = $_POST['subject'];

   

   $sql = "UPDATE lecture SET lecture_name ='$name' WHERE lecture_id = $lnum";
   if(mysqli_query($con,$sql))
   {
     $chk ="SELECT * FROM lecture_subject WHERE subject_code = '$subject'";
     $val = mysqli_query($con,$chk);

     if(mysqli_num_rows($val) == 0)
     {
      $query = "INSERT INTO lecture_subject(lecture_id,subject_code) VALUES($lnum,'$subject')";
      mysqli_query($con,$query);

      header("location:admin.php");
     }
     else{
      header("location:admin.php");
     }
    
       
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
              <li><a href="adminProfile.php">Profile</a></li>
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
             
        
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin<b class="caret"></b></a>
              
     
              <ul class="dropdown-menu">
                
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
           
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>


      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Forms <small>LectureUpd</small></h1>
            
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-edit"></i> AdminAdd</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <a class="alert-link" target="_blank" href="">Update Lecture information below</a> 
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form role="form" id="formLogin" novalidate="" method="POST">

            <?php 
               
               $id = $_GET['id'];

               $sql = "SELECT * FROM lecture WHERE lecture_id = $id ";

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
              <div class="form-group">
                <label>Add Subject</label>
                <select name="subject">
                  <?php
                    $res = mysqli_query($con,"SELECT * FROM subject");
                    while($row =mysqli_fetch_array($res))
                    {
                      $subj = $row['subject_code'];
                      ?>
                          <option value="<?php echo $subj; ?>"><?php echo$subj; ?></option>
                      <?php
                    }

                  ?>

                </select>
              </div> 
              
              

              <button type="submit" class="btn btn-default"  name="update"id="update">Update Lecture</button>
               

            </form>

          

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>