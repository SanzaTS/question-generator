<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Question Generator System</title>
    <link rel="shortcut icon" href="assets/ico/favicon.png">
<link type="text/css" rel="stylesheet" href="search_style.css"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function do_search(str)
{
 /*var search_term=$("#search_term").val();
 $.ajax
 ({
  type:'post',
  url:'get_results.php?id=search_term',
  data:{
   search:"search",
   search_term:search_term
  },
  success:function(response) 
  {
   document.getElementById("result_div").innerHTML=response;
  }
 });
 
 return false;*/
 
 if (str=="")
  {
  // if blank, we'll set our innerHTML to be blank.
  document.getElementById("result_div").innerHTML="Error retreiving data";
  return;
  }
if (window.XMLHttpRequest)
  {    // code for IE7+, Firefox, Chrome, Opera, Safari
      // create a new XML http Request that will go to our generator webpage.
      xmlhttp=new XMLHttpRequest();
  }
else
  {    // code for IE6, IE5
      // create an activeX object
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  // on state change
  xmlhttp.onreadystatechange=function()
  {
  // if we get a good response from the webpage, display the output
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
      document.getElementById("result_div").innerHTML=xmlhttp.responseText;
  }
  }
 // use our XML HTTP Request object to send a get to our content php. 
xmlhttp.open("GET","get_results.php?id="+str, true);
xmlhttp.send();
 
 
}
</script>
</head>
<body>
<div id="wrapper">

<div id="search_box">
 <form method="post"action="#.php" onsubmit="return do_search(this.value);">
  <input type="text" id="search_term" name="search_term" placeholder="Enter Search" onkeyup="do_search(this.value);">
  <input type="submit" name="search" value="SEARCH">
 </form>
</div>

<div id="result_div">

<?php
if(isset($_POST['search']))
{
 /*$host="localhost";
 $username="root";
 $password="";
 $databasename="sample";
 $connect= mysqli_connect($host,$username,$password,$databasename);
//$db=mysqli_select_db($);*/
include("connection.php");

 $search_val=$_POST['search_term'];
 if(!empty($search_val))
 {
    // $get_result = mysqli_query($connect,"select * from search where MATCH(title,description) AGAINST('$search_val')");	
 $get_result = mysqli_query($con,"select * from search where title LIKE '%$search_val%' OR description LIKE '%$search_val%'");
 if(mysqli_num_rows($get_result) > 0)
 {
	 while($row = mysqli_fetch_array($get_result))
    {
     echo "<li><a href='".$row['link']."'><span class='title'>".$row['title']."</span><br><span class='desc'>".$row['description']."</span></a></li>";
     }
	 
  }
 else
    {
   echo "Sorry, there are no matching result for <b> $search_val </b>."."<br>";
   echo "</ br >";
   echo "</ br >";
   echo "1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' </ br >"."<br>";
   echo "2. Try different words with similar meaning "."</ br > "."<br>";
   echo "3. Please check your spelling";
 
   }
 }
 else{
  echo "Sorry, there are no matching result because you submited and <b> empty value </b>."."<br>";
  echo "</ br >";
  echo "</ br >";
  echo "1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' </ br >"."<br>";
  echo "2. Try different words with similar meaning "."</ br > "."<br>";
  echo "3. Please check your spelling";

 }


 
 exit();
}
?>



</div>

</div>
</body>
</html>