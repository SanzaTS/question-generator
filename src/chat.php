
<?php
  include("session.php");
  include("connection.php");


  $email = $_SESSION['email'];


  if(isset($_POST['send']))
  {
    $date = date("d/m/y");
    $time = date("h:i:s");

    $reciever = $_POST['reciever'];
    $msg = $_POST['msg'];

    echo $email." ".$reciever." ".$msg." ".$date." ".$time;
    $sqlChat =  "INSERT INTO `chat`( `sender`, `reciever`, `Msg`, `date`, `time`) VALUES ('$email','$reciever','$msg','$date','$time')";

   //$results= mysqli_query($con,$sqlChat);

      mysqli_query($con,$sqlChat);
      
        echo "massage sent'";
     
    
    

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

            <form  role="form" id="formLogin" novalidate="" method="POST" action="">
                    <br>
                    <br>
                    <br>
            
                        <label>Send Massage</label>
             
               
              <div class="form-group">
                <label>Send To</label>
                <select name="reciever">
                <option value = "class test">--Select Reciepient--<option>
                <?php 
                  $query = "select * from users WHERE email <> '$email'";
                  $results = mysqli_query($con,$query);
                  while($row =mysqli_fetch_array($results))
                  {
                      $uEmail = $row['email'];
                      ?>

                    <option value="<?php echo $uEmail; ?>"><?php echo $uEmail;?><option>
                    <?php
                  }

                ?>
                
                
                <select>
              </div> 

              <div class="form-group">
                <label>Text area</label>
                <textarea class="form-control" rows="3" name="msg"></textarea>
              </div>
              

              <button type="submit" class="btn btn-default"  name="send"id="send">Send</button>
               

            </form>

     
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>