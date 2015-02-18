<!DOCTYPE html>
<html>
  <head>
  	<title>Debo's Blog</title>
    <link type="text/css" rel="stylesheet" href="css/form_stylesheet.css">
  </head>

  <body> 
		
		<div id="nav">
      <div id="logo">
        <a href="index.php"><img src="images/logo.png" id="logoImg" alt="logo"></a>
      </div>

      <ul>
        <li><a href="posts.php">All Posts</a></li>
        <li><a href="form.php"><img src="images/plusIcon.png" id="plus" alt="plus">Post</a></li>
        <li id="selected"><a href="index.php">Home</a></li>
      </ul>
    </div>

  	<?php
  		$delimiter = '|'; 

  		$titleerror = "Title of post";
  		$nameerror = "Your name";
  		$locationerror = "Post Location";
  		$commenterror = "Tell us about it";
  		$imgUrlerror = "Image url";

			if (isset($_POST['submit'])){
				$title = htmlspecialchars($_POST['title']);
				$name = $_POST['name'];
				$location = htmlspecialchars($_POST['location']);
				$comment = htmlspecialchars($_POST['comment']);
				$imgUrl = htmlspecialchars($_POST['imgUrl']);

				// Title Validation
				if (empty($title)){
					$titleerror = "Title is required";
				}
				else if (strlen($title) >= 50) {
					$titleerror = "Title too long (max 50 characters)";
					$title = "";
				}

				// Name Validation
				if (empty($name)){
					$nameerror = "Name is required";
				}
				else if (preg_match('/^[A-Za-z ]+$/', $name) === 0) {
					$nameerror = "Only alphabetic Characters";
					$name = "";
				}
				else if (strlen($name) >= 50) {
					$nameerror = "Name too long (max 50 characters)";
					$name = "";
				}

				// Location Validation
				if (empty($location)){
					$locationerror = "Location is required";
				}
				else if (strlen($location) >= 50) {
					$locationerror = "Too Long (max 50 characters)";
					$location = "";
				}

				// Comment Validation
				if (empty($comment) || $comment == null){
					$comment = "Comment is required";
				}
				else if (strlen($comment) >= 150) {
					$comment = "Too Long (max 150 characters)";
				}

				// Image Url Validation
				if (empty($imgUrl)){
					$imgUrlerror = "Image url is required";
				}
				else if (!filter_var($imgUrl, FILTER_VALIDATE_URL)) {
					$imgUrlerror = "Not a valid url";
					$imgUrl = "";
				}

	  		if($titleerror == "Title of post" && $nameerror == "Your name" && $locationerror == "Post Location" && $commenterror == "Tell us about it" && $imgUrlerror == "Image url"){

	  			$file = fopen('data.txt', 'a+');

	  			if (!$file) {
	  				die("there was a problem opening up the data file :(");
	  			}

	  			$title = trim($_POST['title']);
	  			$name = trim($_POST['name']);
	  			$location = trim($_POST['location']);
	  			$comment = trim($_POST['comment']);
	  			$imgUrl = trim($_POST['imgUrl']);

	  			fwrite($file, "$title $delimiter $name $delimiter $location $delimiter $imgUrl $delimiter $comment \n");

	  			fclose($file);

  	?>

  	<div id="firstblock"><h3>Thanks <?php echo htmlspecialchars($name); ?>, for submitting!</h3></div>

  	<?php
			}
			else { 
		?>

		<div id="firstblock">
  		<div id="form">
  			<h3>Create a New Post</h3>
  			<form action="form.php" method="POST">
  				<!-- Title of _Post:  -->
  				<input class="field" type="text" name="title" value="<?php echo $title; ?>" placeholder="<?php echo $titleerror;?>"><br>
					<!-- Your name:  -->
					<input class="field" type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $nameerror;?>"><br>
  				<!-- Where was it taken?  -->
  				<input class="field" type="text" name="location" value="<?php echo $location; ?>" placeholder="<?php echo $locationerror;?>"><br>
  				<input class="field" type="text" name="imgUrl" value="<?php echo $imgUrl; ?>" placeholder="<?php echo $imgUrlerror;?>"><br><br>

  				<!-- Tell me about it  -->
  				<textarea name="comment" placeholder="<?php echo $commenterror;?>"><?php echo $comment;?></textarea><br><br>
  				<input type="submit" name="submit" id="submit">
  			</form>
  		</div> 
  	</div> 

  	<?php	
			}
		}
			else {
  	?>
  	

  	<div id="firstblock">
  		<div id="form">
  			<h3>Create a New Post</h3>
  			<form action="form.php" method="POST">
  				<!-- Title of _Post:  -->
  				<input class="field" type="text" name="title" placeholder="<?php echo $titleerror;?>"><br>
					<!-- Your name:  -->
					<input class="field" type="text" name="name" placeholder="<?php echo $nameerror;?>"><br>
  				<!-- Where was it taken?  -->
  				<input class="field" type="text" name="location" placeholder="<?php echo $locationerror;?>"><br>
  				<input class="field" type="text" name="imgUrl" placeholder="<?php echo $imgUrlerror;?>"><br><br>

  				<!-- Tell me about it  -->
  				<textarea name="comment" placeholder="<?php echo $commenterror;?>"></textarea><br><br>
  				<input type="submit" name="submit" id="submit">
  			</form>
  		</div> 
  	</div>	
  	<?php } ?>
	</body>
</html>
