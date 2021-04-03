<?php
include("connection.php");


if(isset($_POST['save']))
  {
      ob_start();
      require("fpdf/fpdf.php");

$pdf = new FPDF();


$image1 = "images/tutpng.png";

$subj = $_POST['subject'];
$time = $_POST['time'];
$date = $_POST['date'];
$mod = $_POST['moderator'];
$subj_name = " ";

$examiner = $surname." ".substr($name,0,1);

//echo $subj." ".$time." ".$date." ".$mod;

$sql ="SELECT * FROM subject WHERE subject_code = '$subj' ";
   
$results = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($results)  )
{
    $subj_name = $row['Subject_name'];
    
    
}
//echo $subj_name;
$pdf->AddPage();

$pdf->SetFont("Arial","B",12); 
$pdf->setTextColor(20,50,100);
//$pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
$pdf->Cell(192,30,$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78),1,1,'C'); 

$pdf->Cell(80,10,$subj_name ,1,0);
$pdf->Cell(112,10,"EXAMINATION" ,1,1);


$pdf->Cell(80,10,"Date:   {$date}" ,1,0);
$pdf->Cell(112,10,"Durration:   {$time} hours" ,1,1);

$pdf->Cell(80,10,"Examiner: {$examiner}",1,0);
$pdf->Cell(112,10,"Moderator: {$mod} " ,1,1);

$pdf->Cell(80,10,"Student Number:  " ,1,0);
$pdf->Cell(112,10,"" ,1,1);

$pdf->Cell(80,10,"Surname&initial: " ,1,0);
$pdf->Cell(112,10,"Percentage:" ,1,1);

$pdf->ln();

$pdf->Cell(80,10,"Question 1" ,0,0);

$pdf->ln();


$q1 = "SELECT * FROM one_word WHERE subj_code = '$subj' ORDER BY RAND() ";
$output = mysqli_query($con,$q1);

while($row = mysqli_fetch_array($output) )
{

    $quest1 = $row['question'];
    $mark1 = $row['marks'];

   //echo $quest1." ".$mark1;
    $pdf->Cell(80,10,$quest1."  (".$mark1.")" ,0,0);
    $pdf->ln();

}


$pdf->ln();

$pdf->Cell(80,10,"Question 2" ,0,0);

$pdf->ln();



$q2 = "SELECT * FROM long_question WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 4";
$output = mysqli_query($con,$q2);

while($row = mysqli_fetch_array($output))
{

    $quest2 = $row['question'];
    $mark2= $row['marks'];


    $pdf->Cell(80,10,$quest2."  (".$mark2.")" ,0,0);
    $pdf->ln();

}




 $pdf->Ln();

 $pdf->Cell(80,10,"Question 3" ,0,0);

$pdf->ln();



$q3 = "SELECT * FROM multiple_choice WHERE subj_code = '$subj' ORDER BY RAND() LIMIT 4";
$output = mysqli_query($con,$q3);

while($row = mysqli_fetch_array($output))
{

    $quest3 = $row['question'];
    $opt1 = $row['option1'];
    $opt2 = $row['option2'];
    $opt3 = $row['option3'];
    $opt4 = $row['option4'];
    $mark3= $row['marks'];


    $pdf->Cell(80,10,$quest2."  (".$mark2.")" ,0,0);
    $pdf->ln();
    $pdf->Cell(80,10,"(a) ".$opt1,0,0);
    $pdf->ln();
    $pdf->Cell(80,10,"(b) ".$opt2,0,0);
    $pdf->ln();
    $pdf->Cell(80,10,"(c) ".$opt3,0,0);
    $pdf->ln();
    $pdf->Cell(80,10,"(d) ".$opt4,0,0);
    $pdf->ln();

}




 $pdf->Ln();

   $loc = "docs/";
    $filename = $subj_name.".pdf";
    //F',$filename,true
$pdf->Output('F',$filename,true);   

$sql = "INSERT INTO question_paper(subject_code, filename) VALUES('$subj','$filename')";
  mysqli_query($con,$sql);

   // header("location:files.php");

       ob_end_flush();
    
       
   }


 


	



?>
