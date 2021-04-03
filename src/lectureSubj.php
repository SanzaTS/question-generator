

<?php

include("connection.php");
include("session.php");
$id = $_GET['id'];




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
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Action<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="adminAdd.php">Lecture Information</a></li>
                <li><a href="adminChat.php">Send Massage</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Views<b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li><a href="admin.php">Lectures</a></li>
                <li><a href="adminRep.php">Admin Info</a></li>
                <li><a href="AdminMsg.php">Massages</a></li>
                 
                 
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
                <!--<li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>-->
                <li class="divider"></li>
                <li><a href="#"> <span class="badge"></span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i>  <span class="badge"></span> <b class="caret"></b></a>
              <!--<ul class="dropdown-menu">
                <li><a href="#"> <span class="label label-default">Default</span></a></li>
                <li><a href="#"> <span class="label label-primary">Primary</span></a></li>
                <li><a href="#"> <span class="label label-success">Success</span></a></li>
                <li><a href="#"> <span class="label label-info">Info</span></a></li>
                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                <li class="divider"></li>
                <li><a href="#">View All</a></li>
              </ul>
            </li>-->
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
        <div class="col-lg-6">
        <?php 
            
            $name ="";
            $surname ="";

            $sql = "SELECT * FROM lecture WHERE lecture_id = $id";
            
            $results = mysqli_query($con,$sql);

            while($row = mysqli_fetch_array($results))
            {
                $name = $row['lecture_name'];
                $surname = $row['lecture_surname'];
            }

        ?>
            <h2>Subject List For <?php echo $surname.",".substr($name,0,1)."(".$id.")"; ?></h2>
           
           <br>
           
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>Subject Code <i class="fa fa-sort"></i></th>
                    <th>Subject Name <i class="fa fa-sort"></i></th>
                    <th>Action </th>
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php 

                $id = $_GET['id'];
                  $sql = "SELECT l.*,s.*,c.* FROM lecture l,subject s, lecture_subject c 
                  WHERE l.lecture_id = c.lecture_id
                  AND s.subject_code = c.subject_code
                  AND l.lecture_id = $id";

                  $results = mysqli_query($con,$sql);

                  while($row = mysqli_fetch_array($results))
                  {
                    
                    

                        $subj = $row ['subject_code'];
                        $name = $row ['Subject_name'];
                        
                        $_SESSION['subj'] = $subj;

                  
                ?>
                
                  <tr>
                    <td><?php echo $subj;?></td>
                    <td><?php echo $name;?></td>
                    <td><button type="submit" class="btn btn-danger"  ><a href="subjDel.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')">Remove Subject</a></button></td>
                    
                    
               </tr>
                  <?php

                  }
                  ?>
                </tbody>   
              </table>
              <button type="submit" class="btn btn-warning"  style="margin-left:350px;"><a href="admin.php">Back To Reports</a></button>
            </div>
          </div>
        

        </div>  <!--page row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>