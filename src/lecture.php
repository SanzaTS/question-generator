<?php
  include("session.php");
  include("connection.php");


  $email = $_SESSION['email'];

  $name = " ";
  $surname = "";

 $sql = "SELECT * FROM lecture WHERE lecture_emai = '$email'" ;

 $results= mysqli_query($con,$sql);
$id ="";
 while($row = mysqli_fetch_array($results))
 {
   $id = $row['lecture_id'];
   $name = $row['lecture_name'];
   $surname = $row['lecture_surname'];

 }


          
        

        


  
?>

<?php
include("connection.php");

$mark1 = "";

if(isset($_POST['save']))
  {
    $image1 = "images/tutpng.png";

    

    $subj = $_POST['subject'];
    $etime = $_POST['time'];
    $edate = $_POST['date'];
    $mod = $_POST['moderator'];
    $type = $_POST['Type'];
    $subj_name = " ";
    $lecture_id ="";
    $i = 1;
    
    $lecture = mysqli_query($con,"SELECT * FROM lecture WHERE lecture_name ='$name' AND lecture_surname = '$surname' ");
    while($row = mysqli_fetch_array($lecture))
    {
        $lecture_id = $row['lecture_id'];
    }
    
    $examiner = $surname." ".substr($name,0,1);
    
    $date = date("y/m/d");
    $time = date("h:i:s");
    $year = date("y");
    $filename =$type."20".$year."-".rand(10,99);
    $filename2 = $filename."doc";
    //$id = "";
    $sql = "INSERT INTO question_paper(subject_code,lecture_id,moderator,duration,edate,category,filename,date,time) VALUES('$subj','$lecture_id','$mod','$etime','$date','$type ','$filename2','$date','$time')";
    mysqli_query($con,$sql);
   
    $id = mysqli_insert_id($con);
     
    switch ($subject) {
      case "DSO34AT":
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment; Filename =".$filename.".doc");
      header("Pragma: no-cache");
      header("Expires: 0");
         echo "<html>";
      
      echo "<body>";
      echo "<TABLE CELLPADDING=\"5\" CELLSPACING=\"0\" BORDER=\"1\" align=\"center\">";
          
          echo"<TR>";
          echo"<TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"2\"> <img src=\"http://www.question-genarotor.com//images/tutpng.png\" style=\"width:100px;heiht:95px;\"><br> 
        I declare that i am familiar<br> with , and  will abide to the<br> Examination rules of Tswane <br>University of Technology.<br>
        <br><br>------------------------<br>
      
        Signature";
           echo" </TH>";
         echo" <TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"1\">".$subj."</TH>";
         
        echo"  </TR>";
          echo"<TR><TD><TABLE border=\"2px\"><TR>";
        echo"	<TH class=\"center\"> ".$type." <br>"
            .$etime ."HOURS <br>
          "	.$edate."<br>
            
          </TH>";
          echo"<TH class=\"center\"> Examininer: ".$examiner." <br>Modirator:".$mod."</TH>
              </TR>";
          echo "<TR>";
          
          echo"<TD colspan=\"2\"> STUDENT NO:</TD>";
      
        echo"</TR></TABLE></TD>";
          
         echo"</TR>";
        
       echo"<TR>";
         
          echo"<TD ALIGN=\"right\" COLSPAN=\"2\">%</TD>";
          echo"<TD ALIGN=\"left\"COLSPAN=\"2\"> SURNAME&initials:</TD>";
          
         echo"</TR>";
      echo"</TABLE>";
      
      
      
      echo "<h4 > question  1 <h4>"."<br>";
      
      $q1 = "SELECT * FROM one_word WHERE subj_code = '$subj' ORDER BY RAND()  LIMIT 3";
      $output = mysqli_query($con,$q1);
        /*$quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];*/
      while($row = mysqli_fetch_array($output) )
      {
      
          $quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];
      
          echo "<h6>(".$i.")".$quest1."(".$mark1.")<h6>"."<br>";
      
          $query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',$id)";
          mysqli_query($con,$query) or die(mysqli_error($con));
          
         
          $i++;
      
      }
      /*$query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',49)";
      mysqli_query($con,$query) or die(mysqli_error($con));*/
      
      echo "<h4> question  2 <h4>"."<br>";
      
      $q2 = "SELECT * FROM long_question WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 4";
      $output = mysqli_query($con,$q2);
      $x = 1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest2 = $row['question'];
          $mark2= $row['marks'];
          $answer2 = $row['answer'];
      
      
          echo "<h6>(".$x.")".$quest2."(".$mark2.")<h6>"."<br>";
      
          $query2 = "INSERT INTO `selected_long`( `question`, `answer`, `mark`, `qid`) VALUES ('$quest2','$answer2','$mark2',$id);";
          mysqli_query($con,$query2) or die(mysqli_error($con));
      
          $x++;
      
      }
      
      echo "<h4> question  3 <h4>"."<br>";
      
      $q3 = "SELECT * FROM multiple_choice WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 4";
      $output = mysqli_query($con,$q3);
      
      $y =1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest3 = $row['question'];
          $opt1 = $row['option1'];
          $opt2 = $row['option2'];
          $opt3 = $row['option3'];
          $opt4 = $row['option4'];
          $answer3 = $row['answer'];
          $mark3= $row['marks'];
      
          echo "<h6>(".$y.")".$quest3."(".$mark3.")<h6>"."<br>";
          echo "<h6> (a)".$opt1."<h6>"."<br>";
          echo "<h6> (b)".$opt2."<h6>"."<br>";
          echo "<h6> (c)".$opt3."<h6>"."<br>";
          echo "<h6> (d)".$opt4."<h6>"."<br>";
          $query2 = "INSERT INTO `selected_multiple`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `qid`) VALUES ('$quest3','$opt1','$opt2','$opt3','$opt4','$answer3','$mark3',$id)";
          mysqli_query($con,$query2) or die(mysqli_error($con));
       $y++;
      
         
      
      }
      
      
      
      
      
      
      
      echo "</body>";
      echo '</html>';
          
          break;
      case "IDC30AT":
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment; Filename =".$filename.".doc");
      header("Pragma: no-cache");
      header("Expires: 0");
         echo "<html>";
      
      echo "<body>";
      echo "<TABLE CELLPADDING=\"5\" CELLSPACING=\"0\" BORDER=\"1\" align=\"center\">";
          
          echo"<TR>";
          echo"<TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"2\"> <img src=\"http://www.question-genarotor.com//images/tutpng.png\" style=\"width:100px;heiht:95px;\"><br> 
        I declare that i am familiar<br> with , and  will abide to the<br> Examination rules of Tswane <br>University of Technology.<br>
        <br><br>------------------------<br>
      
        Signature";
           echo" </TH>";
         echo" <TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"1\">".$subj."</TH>";
         
        echo"  </TR>";
          echo"<TR><TD><TABLE border=\"2px\"><TR>";
        echo"	<TH class=\"center\"> ".$type." <br>"
            .$etime ."HOURS <br>
          "	.$edate."<br>
            
          </TH>";
          echo"<TH class=\"center\"> Examininer: ".$examiner." <br>Modirator:".$mod."</TH>
              </TR>";
          echo "<TR>";
          
          echo"<TD colspan=\"2\"> STUDENT NO:</TD>";
      
        echo"</TR></TABLE></TD>";
          
         echo"</TR>";
        
       echo"<TR>";
         
          echo"<TD ALIGN=\"right\" COLSPAN=\"2\">%</TD>";
          echo"<TD ALIGN=\"left\"COLSPAN=\"2\"> SURNAME&initials:</TD>";
          
         echo"</TR>";
      echo"</TABLE>";
      
      
      
      echo "<h4 > question  1 <h4>"."<br>";
      
      $q1 = "SELECT * FROM one_word WHERE subj_code = '$subj' ORDER BY RAND()  LIMIT 3";
      $output = mysqli_query($con,$q1);
        /*$quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];*/
      while($row = mysqli_fetch_array($output) )
      {
      
          $quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];
      
          echo "<h6>(".$i.")".$quest1."(".$mark1.")<h6>"."<br>";
      
          $query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',$id)";
          mysqli_query($con,$query) or die(mysqli_error($con));
          
         
          $i++;
      
      }
      /*$query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',49)";
      mysqli_query($con,$query) or die(mysqli_error($con));*/
      
      echo "<h4> question  2 <h4>"."<br>";
      
      $q2 = "SELECT * FROM long_question WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q2);
      $x = 1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest2 = $row['question'];
          $mark2= $row['marks'];
          $answer2 = $row['answer'];
      
      
          echo "<h6>(".$x.")".$quest2."(".$mark2.")<h6>"."<br>";
      
          $query2 = "INSERT INTO `selected_long`( `question`, `answer`, `mark`, `qid`) VALUES ('$quest2','$answer2','$mark2',$id);";
          mysqli_query($con,$query2) or die(mysqli_error($con));
      
          $x++;
      
      }
      
      echo "<h4> question  3 <h4>"."<br>";
      
      $q3 = "SELECT * FROM multiple_choice WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q3);
      
      $y =1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest3 = $row['question'];
          $opt1 = $row['option1'];
          $opt2 = $row['option2'];
          $opt3 = $row['option3'];
          $opt4 = $row['option4'];
          $answer3 = $row['answer'];
          $mark3= $row['marks'];
      
          echo "<h6>(".$y.")".$quest3."(".$mark3.")<h6>"."<br>";
          echo "<h6> (a)".$opt1."<h6>"."<br>";
          echo "<h6> (b)".$opt2."<h6>"."<br>";
          echo "<h6> (c)".$opt3."<h6>"."<br>";
          echo "<h6> (d)".$opt4."<h6>"."<br>";
          $query2 = "INSERT INTO `selected_multiple`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `qid`) VALUES ('$quest3','$opt1','$opt2','$opt3','$opt4','$answer3','$mark3',$id)";
          mysqli_query($con,$query2) or die(mysqli_error($con));
       $y++;
      
         
      
      }
      
      
      
      
      
      
      
      echo "</body>";
      echo '</html>';
          break;

      case "ISY34BT":
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment; Filename =".$filename.".doc");
      header("Pragma: no-cache");
      header("Expires: 0");
         echo "<html>";
      
      echo "<body>";
      echo "<TABLE CELLPADDING=\"5\" CELLSPACING=\"0\" BORDER=\"1\" align=\"center\">";
          
          echo"<TR>";
          echo"<TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"2\"> <img src=\"http://www.question-genarotor.com//images/tutpng.png\" style=\"width:100px;heiht:95px;\"><br> 
        I declare that i am familiar<br> with , and  will abide to the<br> Examination rules of Tswane <br>University of Technology.<br>
        <br><br>------------------------<br>
      
        Signature";
           echo" </TH>";
         echo" <TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"1\">".$subj."</TH>";
         
        echo"  </TR>";
          echo"<TR><TD><TABLE border=\"2px\"><TR>";
        echo"	<TH class=\"center\"> ".$type." <br>"
            .$etime ."HOURS <br>
          "	.$edate."<br>
            
          </TH>";
          echo"<TH class=\"center\"> Examininer: ".$examiner." <br>Modirator:".$mod."</TH>
              </TR>";
          echo "<TR>";
          
          echo"<TD colspan=\"2\"> STUDENT NO:</TD>";
      
        echo"</TR></TABLE></TD>";
          
         echo"</TR>";
        
       echo"<TR>";
         
          echo"<TD ALIGN=\"right\" COLSPAN=\"2\">%</TD>";
          echo"<TD ALIGN=\"left\"COLSPAN=\"2\"> SURNAME&initials:</TD>";
          
         echo"</TR>";
      echo"</TABLE>";
      
      
      
      echo "<h4 > question  1 <h4>"."<br>";
      
      $q1 = "SELECT * FROM one_word WHERE subj_code = '$subj' ORDER BY RAND()  LIMIT 3";
      $output = mysqli_query($con,$q1);
        /*$quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];*/
      while($row = mysqli_fetch_array($output) )
      {
      
          $quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];
      
          echo "<h6>(".$i.")".$quest1."(".$mark1.")<h6>"."<br>";
      
          $query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',$id)";
          mysqli_query($con,$query) or die(mysqli_error($con));
          
         
          $i++;
      
      }
      /*$query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',49)";
      mysqli_query($con,$query) or die(mysqli_error($con));*/
      
      echo "<h4> question  2 <h4>"."<br>";
      
      $q2 = "SELECT * FROM long_question WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q2);
      $x = 1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest2 = $row['question'];
          $mark2= $row['marks'];
          $answer2 = $row['answer'];
      
      
          echo "<h6>(".$x.")".$quest2."(".$mark2.")<h6>"."<br>";
      
          $query2 = "INSERT INTO `selected_long`( `question`, `answer`, `mark`, `qid`) VALUES ('$quest2','$answer2','$mark2',$id);";
          mysqli_query($con,$query2) or die(mysqli_error($con));
      
          $x++;
      
      }
      
      echo "<h4> question  3 <h4>"."<br>";
      
      $q3 = "SELECT * FROM multiple_choice WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q3);
      
      $y =1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest3 = $row['question'];
          $opt1 = $row['option1'];
          $opt2 = $row['option2'];
          $opt3 = $row['option3'];
          $opt4 = $row['option4'];
          $answer3 = $row['answer'];
          $mark3= $row['marks'];
      
          echo "<h6>(".$y.")".$quest3."(".$mark3.")<h6>"."<br>";
          echo "<h6> (a)".$opt1."<h6>"."<br>";
          echo "<h6> (b)".$opt2."<h6>"."<br>";
          echo "<h6> (c)".$opt3."<h6>"."<br>";
          echo "<h6> (d)".$opt4."<h6>"."<br>";
          $query2 = "INSERT INTO `selected_multiple`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `qid`) VALUES ('$quest3','$opt1','$opt2','$opt3','$opt4','$answer3','$mark3',$id)";
          mysqli_query($con,$query2) or die(mysqli_error($con));
       $y++;
      
         
      
      }
      
      
      
      
      
      
      
      echo "</body>";
      echo '</html>';
          break;
      default:
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment; Filename =".$filename.".doc");
      header("Pragma: no-cache");
      header("Expires: 0");
         echo "<html>";
      
      echo "<body>";
      echo "<TABLE CELLPADDING=\"5\" CELLSPACING=\"0\" BORDER=\"1\" align=\"center\">";
          
          echo"<TR>";
          echo"<TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"2\"> <img src=\"http://www.question-genarotor.com//images/tutpng.png\" style=\"width:100px;heiht:95px;\"><br> 
        I declare that i am familiar<br> with , and  will abide to the<br> Examination rules of Tswane <br>University of Technology.<br>
        <br><br>------------------------<br>
      
        Signature";
           echo" </TH>";
         echo" <TH class=\"center\" COLSPAN=\"3\" ROWSPAN=\"1\">".$subj."</TH>";
         
        echo"  </TR>";
          echo"<TR><TD><TABLE border=\"2px\"><TR>";
        echo"	<TH class=\"center\"> ".$type." <br>"
            .$etime ."HOURS <br>
          "	.$edate."<br>
            
          </TH>";
          echo"<TH class=\"center\"> Examininer: ".$examiner." <br>Modirator:".$mod."</TH>
              </TR>";
          echo "<TR>";
          
          echo"<TD colspan=\"2\"> STUDENT NO:</TD>";
      
        echo"</TR></TABLE></TD>";
          
         echo"</TR>";
        
       echo"<TR>";
         
          echo"<TD ALIGN=\"right\" COLSPAN=\"2\">%</TD>";
          echo"<TD ALIGN=\"left\"COLSPAN=\"2\"> SURNAME&initials:</TD>";
          
         echo"</TR>";
      echo"</TABLE>";
      
      
      
      echo "<h4 > question  1 <h4>"."<br>";
      
      $q1 = "SELECT * FROM one_word WHERE subj_code = '$subj' ORDER BY RAND()  LIMIT 3";
      $output = mysqli_query($con,$q1);
        /*$quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];*/
      while($row = mysqli_fetch_array($output) )
      {
      
          $quest1 = $row['question'];
          $mark1 = $row['marks'];
          $answer = $row['answer'];
      
          echo "<h6>(".$i.")".$quest1."(".$mark1.")<h6>"."<br>";
      
          $query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',$id)";
          mysqli_query($con,$query) or die(mysqli_error($con));
          
         
          $i++;
      
      }
      /*$query = "INSERT INTO `selected_word`( question, answer, marks,qid) VALUES ('$quest1','$answer','$mark1',49)";
      mysqli_query($con,$query) or die(mysqli_error($con));*/
      
      echo "<h4> question  2 <h4>"."<br>";
      
      $q2 = "SELECT * FROM long_question WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q2);
      $x = 1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest2 = $row['question'];
          $mark2= $row['marks'];
          $answer2 = $row['answer'];
      
      
          echo "<h6>(".$x.")".$quest2."(".$mark2.")<h6>"."<br>";
      
          $query2 = "INSERT INTO `selected_long`( `question`, `answer`, `mark`, `qid`) VALUES ('$quest2','$answer2','$mark2',$id);";
          mysqli_query($con,$query2) or die(mysqli_error($con));
      
          $x++;
      
      }
      
      echo "<h4> question  3 <h4>"."<br>";
      
      $q3 = "SELECT * FROM multiple_choice WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 3";
      $output = mysqli_query($con,$q3);
      
      $y =1;
      while($row = mysqli_fetch_array($output))
      {
      
          $quest3 = $row['question'];
          $opt1 = $row['option1'];
          $opt2 = $row['option2'];
          $opt3 = $row['option3'];
          $opt4 = $row['option4'];
          $answer3 = $row['answer'];
          $mark3= $row['marks'];
      
          echo "<h6>(".$y.")".$quest3."(".$mark3.")<h6>"."<br>";
          echo "<h6> (a)".$opt1."<h6>"."<br>";
          echo "<h6> (b)".$opt2."<h6>"."<br>";
          echo "<h6> (c)".$opt3."<h6>"."<br>";
          echo "<h6> (d)".$opt4."<h6>"."<br>";
          $query2 = "INSERT INTO `selected_multiple`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `mark`, `qid`) VALUES ('$quest3','$opt1','$opt2','$opt3','$opt4','$answer3','$mark3',$id)";
          mysqli_query($con,$query2) or die(mysqli_error($con));
       $y++;
      
         
      
      }
      
      
      
      
      
      
      
      echo "</body>";
      echo '</html>';
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

            <form  role="form" id="formLogin" novalidate="" method="POST" action="">
                    <br>
                    <br>
                    <br>
            
                        <label>CREATE QUESTON PAPER</label>
			  <div class="form-group">
                <label>Moderator</label>
                <input class="form-control" name="moderator" id="moderator" placeholder="Surname&initials">
              </div>

              <div class="form-group">
                <label>duration</label>
                <input class="form-control" name="time" id="time" placeholder="Enter duration">
              </div>
               <div class="form-group">
                <label>Date</label>
                <input class="form-control" type="date" name="date" id="date" placeholder="month and Year">
              </div> 
              <div class="form-group">
                <label>Test Type</label>
                <select name="Type">
                <option value = "class test">Class Test<option>
                <option value="semester Test">Semester Test<option>
                <option value ="Examination" >Examination<option>
                <select>
              </div> 
              <div class="form-group">
                <label>Subject Name</label>
                <Select name="subject">
				<option value =""> Select Subject <option>
				 
				 <?php 
				    
            include("connection.php");
            // $ema= $_SESSION['email'];
           
 
            // $id = $_SESSION['id'];
 
             $sql = "SELECT l.*,s.*,c.* FROM lecture l,subject s, lecture_subject c 
             WHERE l.lecture_id = c.lecture_id
             AND s.subject_code = c.subject_code
             AND l.lecture_emai = '$email'";
 
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
               
 
 
              

              <button type="submit" class="btn btn-default"  name="save"id="save">Create Paper</button>
               

            </form>

     
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>