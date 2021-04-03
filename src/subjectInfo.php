<?php


include("connection.php");
include("session.php");

$email = $_SESSION['email'];


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
echo "<th style=\"border:1px solid;\">Email</th>";
echo "<th style=\"border:1px solid;\">Role </th>";
echo "<th style=\"border:1px solid;\">created At</th>";
echo "<th style=\"border:1px solid;\">Last Activity</th>";                  
echo "</tr>";

$sql = "SELECT * FROM users ";
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($results))
{
  
  

      $email = $row ['email'];
      $role = $row ['role'];
      $createdAt = $row ['createdAt'];
      $lastActivity = $row ['last_activity'];




echo "<tr>";
 echo"<td style=\"border:1px solid;\" >".$email."</td>";
  echo"<td style=\"border:1px solid;\">".$role."</td>";
  echo"<td style=\"border:1px solid;\">". $createdAt."</td>";
  echo"<td style=\"border:1px solid;\">".$lastActivity."</td>";
  
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
echo "<th style=\"border:1px solid;\">Email</th>";
echo "<th style=\"border:1px solid;\">Role </th>";
echo "<th style=\"border:1px solid;\">created At</th>";
echo "<th style=\"border:1px solid;\">Last Activity</th>";                  
echo "</tr>";

$sql = "SELECT * FROM users ";
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($results))
{
  
  

      $email = $row ['email'];
      $role = $row ['role'];
      $createdAt = $row ['createdAt'];
      $lastActivity = $row ['last_activity'];




echo "<tr>";
 echo"<td style=\"border:1px solid;\" >".$email."</td>";
  echo"<td style=\"border:1px solid;\">".$role."</td>";
  echo"<td style=\"border:1px solid;\">". $createdAt."</td>";
  echo"<td style=\"border:1px solid;\">".$lastActivity."</td>";
  
echo "</tr>";


  }

echo "</table>";
echo "<body>";
echo "</html>";

}


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
        $this->Cell(198,10, "USER LIST",1,1,'C');
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
        $this->Cell(0,10,'Lectures List ',0,0,'C');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',8);
     
    
     
    
    
          
      
      $pdf->Ln();
      
      
       
      $pdf->Cell(50,10,'Email',1,0);
      $pdf->Cell(50,10,'Role',1,0);
      $pdf->Cell(50,10,'Created At',1,0);
      $pdf->Cell(48,10,'Last Activity',1,0);

      $pdf->Ln();
        
                  
      $sql = "SELECT * FROM users ";
      $results = mysqli_query($con,$sql);

      while($row = mysqli_fetch_array($results))
      {
        
        

        $email = $row ['email'];
        $role = $row ['role'];
        $createdAt = $row ['createdAt'];
        $lastActivity = $row ['last_activity'];
        
        
       
       
          $pdf->Cell(50,10,$email,1,0);
          $pdf->Cell(50,10,$role,1,0);
          $pdf->Cell(50,10,$createdAt,1,0);
          $pdf->Cell(48,10,$lastActivity,1,0);
          
        
        
      
      $pdf->Ln();
          
         
        
       }
      
      
      $filename = "user report.pdf";
    
    $pdf->Output();
    
       
       
       
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
        
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['email'];?>(Admin)<b class="caret"></b></a>
              
     
              <ul class="dropdown-menu">
                
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
           
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>


    

           <br>
           <br>
           <br>
           <br>   
          <h5>LIST OF LECTURES TEACHING <h5>


             <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>lecture_id <i class="fa fa-sort"></i></th>
                    <th>name <i class="fa fa-sort"></i></th>
                    <th>surname <i class="fa fa-sort"></i></th>
                    <th>lecture_emai <i class="fa fa-sort"></i></th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                <?php

                  $id = $_GET['id'];

                  $sql = "SELECT l.lecture_id,l.lecture_name,l.lecture_surname,l.lecture_emai FROM lecture l,lecture_subject s
                  WHERE l.lecture_id = s.lecture_id
                  AND s.subject_code = '$id'";
                  $results = mysqli_query($con,$sql);

                  while($row = mysqli_fetch_array($results))
                  {
                    
                    

                        $id = $row ['lecture_id'];
                        $name = $row ['lecture_name'];
                        $surname = $row ['lecture_surname'];
                        $lecture = $row ['lecture_emai'];

                  
                ?>
                
                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $surname;?></td>
                    <td><?php echo $lecture;?></td>
 
               </tr>
                  <?php

                    }
                  
                  ?>
                  
                </tbody>
              </table>

              <td><button style="margin-left:350px;" type="submit" class="btn btn-warning"  name="save"id="save"><a href="adminRep.php"> Back To Subject</a></button></td>
             <br>
             <br>

             



        

        </div>  <!--page row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>