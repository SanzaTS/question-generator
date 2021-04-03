

<?php

include("connection.php");
include("session.php");


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
        $this->Cell(198,10, "Lecture List",1,1,'C');
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
      
      
       
      $pdf->Cell(50,10,'Lecture Number',1,0);
      $pdf->Cell(50,10,'Lecture Name',1,0);
      $pdf->Cell(50,10,'Lecture Surname',1,0);
      $pdf->Cell(48,10,'Lecture Email',1,0);

      $pdf->Ln();
        
                  
      $sql = "SELECT * FROM lecture ";
      $results = mysqli_query($con,$sql);

      while($row = mysqli_fetch_array($results))
      {
        
        

            $id = $row ['lecture_id'];
            $name = $row ['lecture_name'];
            $surname = $row ['lecture_surname'];
            $email = $row ['lecture_emai'];
        
        
       
       
          $pdf->Cell(50,10,$id,1,0);
          $pdf->Cell(50,10,$name,1,0);
          $pdf->Cell(50,10,$surname,1,0);
          $pdf->Cell(48,10,$email,1,0);
          
        
        
      
      $pdf->Ln();
          
         
        
       }
      
      
      $filename = "qestions.pdf";
    
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
         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Action<b class="caret"></b></a>
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
             
            <li class="dropdown user-dropdown">
        
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['email'];?>(Admin)<b class="caret"></b></a>
              
     
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
        <div class="col-lg-6">
            <h2>List of Lectures</h2>
             <br>
             <br>

             <form class="form-inline" method="post" action="admin.php" target="_blank">
               

               <input style="margin-left:300px;" class="btn btn-success" type="submit" name="pdf" value="Genetate PDF">



             </form>
              <br>
              <br>

             <form class="form-inline" method="post" action="admin.php">
               <label>Search By</label>
               <select name="filter">
               <option value="lecture number">lecture number</option>
               <option value= "surname">Surname</option>
               </select>
               <i class="fas fa-search" aria-hidden="true"></i>
               <input  class="form-control  form-control-sm ml-3 w-75" type="text" name="query" placeholder="search" aria-lebel = "search">
               <input class="btn btn-success" type="submit" name="search" value="search">

             </form>

             <br>
             <br>

            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>Lecture Number <i class="fa fa-sort"></i></th>
                    <th>Lecture Name <i class="fa fa-sort"></i></th>
                    <th>Lecture Surname <i class="fa fa-sort"></i></th>
                    <th>Email <i class="fa fa-sort"></i></th>
                    <th>View Subjects </th>
                    <th>Update </th>
                    <th>Delete </th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php

                 if(isset($_POST['search']))
                 {

                  $dataless = "no matching record found";
                  $filter = $_POST['query'];
                  $keyword =$_POST['filter'];

                  if($keyword = "lecture number")
                  {
                    $sql = "SELECT * FROM lecture WHERE  lecture_id LIKE '%$filter%' ";
                  	
                    $results = mysqli_query($con,$sql) or die(mysqli_error($con));
 
                    $rows = mysqli_num_rows($results) or die(mysqli_error($con));
 
                    if($rows > 0)
                    {
 
                     while($row = mysqli_fetch_array($results))
                     {
                       
                       
   
                           $id = $row ['lecture_id'];
                           $name = $row ['lecture_name'];
                           $surname = $row ['lecture_surname'];
                           $email = $row ['lecture_emai'];
 
                           ?>
 
                            <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $surname;?></td>
                            <td><?php echo $email;?></td>
                            <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="lectureSubj.php?id=<?php echo $id ?>">View</a></button></td>
                            <td><button type="submit" class="btn btn-success"  name="save"id="save"><a href="lectureUpd.php?id=<?php echo $id ?>">Update</a></button></td>
                            <td><button type="submit" class="btn btn-danger"  name="save"id="save"><a href="lectureDel.php?id=<?php echo $id ?>"  onclick="return confirm('Are you sure you want to delete?')">Delete</a></button> </td>
                            </tr>
 
                            <?php
   
                         } 
                    }
 
                    else{
                           ?>
                               <tr>
                                <td><?php  echo $dataless; ?></td>
                               </tr>
                           <?php
 
                    }
                  }
                  else{

                    $sql = "SELECT * FROM lecture WHERE  lecture_surname LIKE '%$filter%'";
                  	
                    $results = mysqli_query($con,$sql) or die(mysqli_error($con));
 
                    $rows = mysqli_num_rows($results) or die(mysqli_error($con));
 
                    if($rows > 0)
                    {
 
                     while($row = mysqli_fetch_array($results))
                     {
                       
                       
   
                           $id = $row ['lecture_id'];
                           $name = $row ['lecture_name'];
                           $surname = $row ['lecture_surname'];
                           $email = $row ['lecture_emai'];
 
                           ?>
 
                            <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $surname;?></td>
                            <td><?php echo $email;?></td>
                            <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="lectureSubj.php?id=<?php echo $id ?>">View</a></button></td>
                            <td><button type="submit" class="btn btn-success"  name="save"id="save"><a href="lectureUpd.php?id=<?php echo $id ?>">Update</a></button></td>
                            <td><button type="submit" class="btn btn-danger"  name="save"id="save"><a href="lectureDel.php?id=<?php echo $id ?>"  onclick="return confirm('Are you sure you want to delete?')">Delete</a></button> </td>
                            </tr>
 
                            <?php
   
                         } 
                    }
 
                    else{
                           ?>
                               <tr>
                                <td><?php  echo $dataless; ?></td>
                               </tr>
                           <?php
 
                    }
                    
                  }

                 

                   

                 }
                 
                 else
                 {

                  $sql = "SELECT * FROM lecture ";
                  $results = mysqli_query($con,$sql);

                  while($row = mysqli_fetch_array($results))
                  {
                    
                    

                        $id = $row ['lecture_id'];
                        $name = $row ['lecture_name'];
                        $surname = $row ['lecture_surname'];
                        $email = $row ['lecture_emai'];

                  
                ?>
                
                  <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $surname;?></td>
                    <td><?php echo $email;?></td>
                    <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="lectureSubj.php?id=<?php echo $id ?>">View</a></button></td>
                    <td><button type="submit" class="btn btn-success"  name="save"id="save"><a href="lectureUpd.php?id=<?php echo $id ?>">Update</a></button></d>
                    <td><button type="submit" class="btn btn-danger"  name="save"id="save"><a href="lectureDel.php?id=<?php echo $id ?>"  onclick="return confirm('Are you sure you want to delete?')">Delete</a></button> </td>
               </tr>
                  <?php

                    }
                  }
                  ?>
                </tbody>
              </table>

              <?php 
               $count = "";
                $sql = "SELECT COUNT(lecture_id) id FROM lecture";

                $results = mysqli_query($con,$sql);

                while($row = mysqli_fetch_array($results))
                {
                    $count = $row['id'];
                }
             ?>
                <h6 style="margin-left:350px;">Total Number of Lectures is <?php echo $count; ?></h6>
            </div>
          </div>

          <br>
          <br>

          <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>Lecture Number <i class="fa fa-sort"></i></th>
                    <th>Lecture Name <i class="fa fa-sort"></i></th>
                    <th>Lecture Surname <i class="fa fa-sort"></i></th>
                    <th>TOTAL <i class="fa fa-sort"></i></th>
                    <th>View Question </th>
                    

          <?php
             $sql = "SELECT l.lecture_id,l.lecture_name,l.lecture_surname,COUNT(q.question_id)AS paper FROM lecture l,question_paper q
             WHERE l.lecture_id = q.lecture_id
             GROUP BY l.lecture_id,l.lecture_name,l.lecture_surname;";

             $res = mysqli_query($con,$sql);

             while($row = mysqli_fetch_array($res))
             {   
                 $id = $row ['lecture_id'];
                  $name = $row ['lecture_name'];
                  $surname = $row ['lecture_surname'];
                 $count = $row['paper'];

                 ?>
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $surname;?></td>
                    <td><?php echo $count;?></td>
                    <td><button type="submit" class="btn btn-default"  name="save"id="save"><a href ="lectureQuest.php?id=<?php echo $id ?>">View</a></button></td>
                    
               </tr>

                 <?php
             }



          ?>

      </tbody>
      </table>


        </div>  <!--page row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>