

<?php

include("connection.php");
include("session.php");

$email = $_SESSION['email'];


if(isset($_POST['pdf']))
{

 
  require("fpdf/fpdf.php");

  class PDF extends FPDF

  {
    
    // Page header
    function Header()
    {
      $image1 = "images/tutpng.png";
        // Logo
        $this->Image($image1,10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(100,10, $this->Image($image1,10,6,30),1,1,'C');
        // Line break
        $this->Ln(20);
        $this->Cell(198,10, "Question Generated",1,1,'C');
        $this->Ln();
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'question generated ',0,0,'C');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',8);
     
    
     
    
    
          
      
      $pdf->Ln();
      
      
       
      $pdf->Cell(50,10,'Subject Code',1,0);
      $pdf->Cell(50,10,'filename',1,0);
      $pdf->Cell(50,10,'Created Date',1,0);
      $pdf->Cell(48,10,'Created Date',1,0);

      $pdf->Ln();
        
                  $sql = "SELECT * FROM question_paper ";
                  $results = mysqli_query($con,$sql);

                  while($row = mysqli_fetch_array($results))
                  {
                    
                    
                   
                       
                        $code = $row ['subject_code'];
                        $file = $row ['filename'];
                        $date = $row ['date'];
                        $time = $row ['time'];
        
        
       
       
          $pdf->Cell(50,10,$code,1,0);
          $pdf->Cell(50,10,$file,1,0);
          $pdf->Cell(50,10,$date,1,0);
          $pdf->Cell(48,10,$time,1,0);
          
        
        
      
      $pdf->Ln();
          
         
        
       }
      
      
      $filename = "qestions.pdf";
    
    $pdf->Output();
    
       
       
       
     }


     if(isset($_POST['word']))
     {
      $filename="Users Report";


      header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; Filename =".$filename.".doc");
    header("Pragma: no-cache");
    header("Expires: 0");
       echo "<html>";
    
    echo "<body>";
    echo "<table style=\"border:1px solid;\">";
    
    echo" <tr >";
    echo "<th style=\"border:1px solid;\">subject</th>";
    echo "<th style=\"border:1px solid;\">filename </th>";
    echo "<th style=\"border:1px solid;\">date</th>";
    echo "<th style=\"border:1px solid;\">time</th>";                  
    echo "</tr>";
    
    $sql = "SELECT * FROM question_paper ";
    $results = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($results))
    {
      
      
     
         
          $code = $row ['subject_code'];
          $file = $row ['filename'];
          $date = $row ['date'];
          $time = $row ['time'];
    
    
    
    
    echo "<tr>";
     echo"<td style=\"border:1px solid;\" >".$code."</td>";
      echo"<td style=\"border:1px solid;\">".$file."</td>";
      echo"<td style=\"border:1px solid;\">". $date."</td>";
      echo"<td style=\"border:1px solid;\">".$time."</td>";
      
    echo "</tr>";
    
    
      }
    
    echo "</table>";
    echo "<body>";
    echo "</html>";

     }
    
     if(isset($_POST['excel']))
     {
      $filename="Users Report";


      header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; Filename =".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
       echo "<html>";
    
    echo "<body>";
    echo "<table style=\"border:1px solid;\">";
    
    echo" <tr >";
    echo "<th style=\"border:1px solid;\">Subject</th>";
    echo "<th style=\"border:1px solid;\">filename </th>";
    echo "<th style=\"border:1px solid;\">date At</th>";
    echo "<th style=\"border:1px solid;\">time</th>";                  
    echo "</tr>";
    
    $sql = "SELECT * FROM question_paper ";
    $results = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($results))
    {
      
      
     
         
          $code = $row ['subject_code'];
          $file = $row ['filename'];
          $date = $row ['date'];
          $time = $row ['time'];
    
    
    
    
    echo "<tr>";
     echo"<td style=\"border:1px solid;\" >".$code."</td>";
      echo"<td style=\"border:1px solid;\">".$file."</td>";
      echo"<td style=\"border:1px solid;\">". $date."</td>";
      echo"<td style=\"border:1px solid;\">".$time."</td>";
      
    echo "</tr>";
    
    
      }
    
    echo "</table>";
    echo "<body>";
    echo "</html>";
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
        
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['email'];?>(Lecture)<b class="caret"></b></a>
              
     
              <ul class="dropdown-menu">
                
                <li class="divider"></li>
                <li><a href="lectureProfile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
               
              </ul>
           
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>


      <div id="page-wrapper">
        <div class="row">
        <div class="col-lg-6">
            <h2>List of question generated</h2>

            
           
              <br>
              <br>

             <form class="form-inline" method="post" action="files.php">
               <i class="fas fa-search" aria-hidden="true"></i>
               <input  class="form-control  form-control-sm ml-3 w-75" type="text" name="query" placeholder="search" aria-lebel = "search">
               <input class="btn btn-success" type="submit" name="search" value="search">

              

             </form>
              <br>
              <br>
              <form class="form-inline" method="post" action="files.php" target="_blank">
               

               <input style="margin-left:300px;" class="btn btn-success" type="submit" name="pdf" value="PDF">
               <input  class="btn btn-success" type="submit" name="word" value="word">
               <input  class="btn btn-success" type="submit" name="excel" value="excel" >



             </form>
             <br>
             <br>
              
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>subject code <i class="fa fa-sort"></i></th>
                    <th>filename <i class="fa fa-sort"></i></th>
                    <th>Test Type<i class="fa a-sort"></i></th>
                    <th>Created Date <i class="fa fa-sort"></i></th>
                    <th>Created Time <i class="fa fa-sort"></i></th>
                    <th>View </th>
                    <th>Memo </th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php

                if(isset($_POST['search']))
                {

                 $dataless = "no matching record found";
                 $filter = $_POST['query'];
                  
                 $query = "SELECT * FROM question_paper WHERE subject_code LIKE '%$filter%' OR filename LIKE '%$filter%' OR date LIKE '%$filter%' OR time LIKE '%%$filter'";

                 $results = mysqli_query($con,$query) or die(mysqli_error($con));

                   $rows = mysqli_num_rows($results) or die(mysqli_error($con));

                   if($rows > 0)
                   {

                    while($row = mysqli_fetch_array($results))
                    {  
                       $id  = $row['question_id'];
                        $code = $row ['subject_code'];
                        $cat = $row['category'];
                        $file = $row ['filename'];
                        $date = $row ['date'];
                        $time = $row ['time'];

                      ?>
                       
                       <tr>
                       <td><?php echo $code;?></td>
                       <td><?php echo $file;?></td>
                       <td><?php echo $cat;?></td>
                       <td><?php echo $date;?></td>
                       <td><?php echo $time;?></td>
                       <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="download.php?id=<?php echo $id; ?>" >Download</a></button></td>
                       <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="memo.php?id=<?php echo $id; ?>" >Memo</a></button></td>
                       </tr>

                      <?php

                    }

                  }
                  else
                  {
                    ?>
                    <tr>
                        <td><?php echo $dataless;?></td>
                    </tr>
                    <?php
                  }

                 }

                  else
                  {
                    $id ="";
                   $t = "SELECT * FROM lecture WHERE lecture_emai = '$email'";
                   $res = mysqli_query($con,$t);
                   while($l = mysqli_fetch_array($res))
                   {
                     $id = $l['lecture_id'];
                   }
                  $sql = "SELECT * FROM question_paper WHERE lecture_id = '$id' ";
                  $results = mysqli_query($con,$sql);

                  while($row = mysqli_fetch_array($results))
                  {
                    
                    
                   
                       $id  = $row['question_id'];
                        $code = $row ['subject_code'];
                        $cat = $row['category'];
                        $file = $row ['filename'];
                        $date = $row ['date'];
                        $time = $row ['time'];
                        

                  
                ?>
                
                  <tr>
                    <td><?php echo $code;?></td>
                    <td><?php echo $file;?></td>
                    <td><?php echo $cat;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $time;?></td>
                    <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="download.php?id=<?php echo $id; ?>" >View</a></button></td>
                    <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="memo.php?id=<?php echo $id; ?>" >Memo</a></button></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>

              <?php

                  $lis = "SELECT * FROM lecture WHERE lecture_emai = '$email'";
                  $res = mysqli_query($con,$lis);
                  while($i = mysqli_fetch_array($res))
                  {
                    $id = $i['lecture_id'];
                  }
                  

                 $e = "SELECT COUNT(*) exam FROM question_paper WHERE category = 'Examination' AND lecture_id= $id";
                 $l = mysqli_query($con,$e) or die(mysqli_error($con));
                 while($r = mysqli_fetch_array($l))
                 {
                   echo "<label> EXAM PAPER GENERATED: ".$r['exam']."</lebel> <br>";
                 }
                 $e = "SELECT COUNT(*) exam FROM question_paper WHERE category = 'class test' AND lecture_id= $id";
                 $l = mysqli_query($con,$e);
                 while($r = mysqli_fetch_array($l))
                 {
                   echo "<label> CLASS PAPER GENERATED: ".$r['exam']."</lebel> <br>";
                 }

                 $e = "SELECT COUNT(*) exam FROM question_paper WHERE category = 'Semester Test' AND lecture_id= $id";
                 $l = mysqli_query($con,$e);
                 while($r = mysqli_fetch_array($l))
                 {
                   echo "<label> SEMESTER TEST PAPER GENERATED: ".$r['exam']."</lebel> <br>";
                 }



                




              ?>

             
             <button style="margin-left:350px;" type="submit" class="btn btn-default"  name="save"id="save"><a href ="lecture.php" >Home</a></button>
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