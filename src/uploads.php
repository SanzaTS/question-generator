

<?php


   include("connection.php");
   include("session.php");
   
   $email = $_SESSION['email'];
   if(isset($_POST['load']))
{    
     
		$file = rand(100,1000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="uploads/";
		
		$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
		$uploadOk = 1;
		// new file size in KB
		$new_size = $file_size/1024;  
		// new file size in KB
 
		// make file name in lower case
		$new_file_name = strtolower($file);
		// make file name in lower case

		$final_file=str_replace(' ','-',$new_file_name);
 
		
		$imageFileType = pathinfo($final_file,PATHINFO_EXTENSION);
		if(pathinfo($final_file,PATHINFO_EXTENSION))
		{
			if (file_exists($_FILES['picture']['name'])) {
			echo "<div style=\" color:red;font-size:16px;font-weight:bold;\">Sorry, file already exists.</div>";
			$uploadOk = 0;
			}
		else
			// Check file size
			if ($new_size > 50000000) {
			echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif") 
			{
			echo "<div style=\" color:red;font-size:16px;font-weight:bold;\">Sorry, only JPG, JPEG, PNG, GIF $ PDF files are allowed.</div>";
			$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			echo "<div style=\" color:red;font-size:16px;font-weight:bold;\">Sorry, your file was not uploaded.</div>";
			// if everything is ok, try to upload file
			} else {
			if(move_uploaded_file($file_loc,$folder.$final_file))
			{
				//$sql="INSERT INTO users(picture) VALUES('$final_file')";
				$sql="UPDATE INTO users SET picture = '$final_file' WHERE email ='$email' ";
				mysqli_query($con,$sql);
  ?>
  <script>
  alert('successfully uploaded');
        //window.location.href='lectureProfile.php?success';
        </script>
  <?php
			}
		else
		{
  ?>
  <script>
  alert('error while uploading file');
        //window.location.href='lectureProfile.php?fail';
        </script>
  <?php
			}
		}
	}
}




?>