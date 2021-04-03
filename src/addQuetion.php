<?php
  include("session.php");
  include("connection.php");


  $email = $_SESSION['email'];
  
  $id = "";

  $chk = mysqli_query($con,"SELECT * FROM lecture WHERE lecture_id = '$email'");

  while($line = mysqli_fetch_array($chk))
  {
      $id = $row['lecture_id'];

  }

   $error = "";
  if(isset($_POST['next']))
  {
      $marks = $_POST['marks'];
      $subject = $_POST['subject'];
      $type = $_POST['Type'];

      if(!empty($marks))
      {  
           if($type == "One Word")
           {
               if($marks > 0 &&  $marks <= 2)
               {
                    $query = "INSERT INTO one_word(marks,subj_code) VALUES($marks,'$subject')";
                    if(mysqli_query($con,$query))
                    { 
                        $_SESSION['oid'] = mysqli_insert_id($con);
                        header("location:word.php?id = ".$id);

                    }
                    else{
                        $error = "faled to insert";
                    }
               }
               else{
                   $error= "One word marks can not be greater then 2";
               }

           }
           else if($type == "Long Question")
           {
            if($marks > 3 && $marks <= 20)
            {
                 $query = "INSERT INTO long_question(marks,subj_code) VALUES($marks,'$subject')";
                 if(mysqli_query($con,$query))
                 {  
                    $_SESSION['lid'] = mysqli_insert_id($con);
                     header("location:long.php?id=".$id);

                 }
                 else{
                     $error = "faled to insert";
                 }
            }
            else{
                $error= "long Question marks must be atleast  be greater then 3";
            }

           }
           else if($type == "Multiple Choice")
           {

            if($marks > 0 && $marks <= 2)
            {
                 $query = "INSERT INTO multiple_choice(marks,subj_code) VALUES($marks,'$subject')";
                 if(mysqli_query($con,$query))
                 { 
                     $_SESSION['qid'] = mysqli_insert_id($con);
                     header("location:multiple.php");

                 }
                 else{
                     $error = "faled to insert";
                 }
            }
            else{
                $error= "Multiple choice marks can not be greater then 2";
            }


           }
           else{
               $error= "Something Went wrong";
           }

      }
      else{
          $error = "All fields are required";
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
                <li><a href="addQuetion.php">Add Question</a></li>
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
                        
                        <label>ADD QUESTON</label>
                        <span style="color:red;"><?php echo $error; ?></span>
             
                
               <div class="form-group">
                <label>Marks</label>
                <input class="form-control" type="text" name="marks" id="marks" placeholder="Marks">
              </div> 
              <div class="form-group">
                <label>Question Type</label>
                <select name="Type">
                <option value = "Multiple Choice">Multiple Choice<option>
                <option value="One Word">One Word<option>
                <option value ="Long Question" >Long Question<option>
                <select>
              </div> 
              <div class="form-group">
                <label>Subject Name</label>
                <Select name="subject">
				
				 
				 <?php 
				    
          
          include("connection.php");
           // $ema= $_SESSION['email'];
          

           // $id = $_SESSION['id'];

           $id = "";
           $res = mysqli_query($con, "SELECT * FROM lecture WHERE lecture_emai='$email'");
           while($row = mysqli_fetch_array($res))
           {
               $id = $row['lecture_id'];
               
           }

            $sql = "SELECT c.*,s.* FROM lecture_subject c,subject s 
            WHERE s.subject_code = c.subject_code
             AND lecture_id = $id";

            $results = mysqli_query($con,$sql) ;

            while($row = mysqli_fetch_array($results))
            {
              
              

                  $id = $row ['subject_code'];
                  $name = $row ['Subject_name'];
                  

					?>
                     
					 <option value="<?php  echo $id; ?>" > <?php echo $id; ?> <option>
					 
                    <?php					
					}
				 
				 ?>
				
				</select>
              </div> 
              

              <button type="submit" class="btn btn-default"  name="next" id="next">Next</button>
               

            </form>

     
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>