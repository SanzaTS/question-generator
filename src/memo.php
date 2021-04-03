<?php
    include("connection.php");
    include('session.php');


    $id = $_GET['id'];

    
    $get = "SELECT l.*,q.* FROM lecture l,question_paper q WHERE l.lecture_id = q.lecture_id AND q.question_id = $id";
    $res = mysqli_query($con,$get);

    while($row = mysqli_fetch_array($res))
    {
        $subj = $row ['subject_code'];
        $file = $row ['filename'];
        $name = $row['lecture_name'];
        $surname = $row['lecture_surname'];
        $mod = $row['moderator'];
        $etime = $row['duration'];
        $edate =$row['edate'];
        $type =  $row['category'];

        $examiner =  $surname." ".substr($name,0,1);

    }

    

    
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment; Filename =".rand().".doc");
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
     echo"	<TH class=\"center\"> ".$type." MEMO <br>"
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

       echo "question1";
       $i = 1;
       $q1= "SELECT * FROM selected_word WHERE qid = $id";
       $res1 = mysqli_query($con,$q1);
       while($row =mysqli_fetch_array($res1))
       {
            $quest1 = $row['question'];
            $answer1 = $row['answer'];
            $mark1 = $row['marks'];
            
    
        echo "<h6>(".$i.")".$quest1."(".$mark1.")<h6>"."<br>";
        echo "<h6> Answer: ".$answer1."<h6>"."<br>";

        $i++;
       }

       echo "question2";
       $x = 1;
       $q2= "SELECT * FROM selected_long WHERE qid = $id";
       $res2 = mysqli_query($con,$q2);
       while($row =mysqli_fetch_array($res2))
       {
            $quest2 = $row['question'];
            $answer2 = $row['answer'];
            $mark2 = $row['mark'];
            
    
        echo "<h6>(".$x.")".$quest2."(".$mark2.")<h6>"."<br>";
        echo "<h6> Answer: ".$answer2."<h6>"."<br>";

        $x++;
       }

       echo "question3";
       $y = 1;
       $q3= "SELECT * FROM selected_multiple WHERE qid = $id";
       $res3 = mysqli_query($con,$q3);
       while($row =mysqli_fetch_array($res3))
       {
             $quest3 = $row['question'];
             $answer3 = $row['answer'];
             $mark3= $row['mark'];
            
    
             echo "<h6>(".$y.")".$quest3."(".$mark3.")<h6>"."<br>";
             echo "<h6> Answer: ".$answer3."<h6>"."<br>";
             

        $y++;
       }


       echo "</body>";
       echo "</html>";


    




?>