<!DOCTYPE html>
<html>
  <head>
  	<title>Debo's Blog</title>
    <link type="text/css" rel="stylesheet" href="css/form_stylesheet.css">
  </head>

  <body> 
  	<script>
  		function inputFocus(i){
   			if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
			}
			function inputBlur(i){
    		if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
			}
  	</script>
  	<div id="nav">

	    <div id="logo">
	        <a href="index.php"><img src="images/logo.png" id="logo" alt="logo"></a>
	    </div>

  		<ul>
        <a href="#"><li>All Posts</li></a>
        <a href="form.php"><li><img src="images/plusIcon.png" id="plus" alt="plus">Post</li></a>
        <a href="index.php"><li id="selected">Home</li></a>
  	  </ul>
  	</div>

  	<div id="firstblock">
  		<div id="form">
  			<h3>Create a New Post</h3>
  			<form action="form.php" method="POST">
  				<!-- Title of Post:  -->
  				<input class="field" type="text" name="title" value="  Title" onfocus="inputFocus(this)" onblur="inputBlur(this)"><br>
					<!-- Your name:  -->
					<input class="field" type="text" name="name" value="  Your name" onfocus="inputFocus(this)" onblur="inputBlur(this)"><br>
  				<!-- Where was it taken?  -->
  				<input class="field" type="text" name="location" value="  Post Location" onfocus="inputFocus(this)" onblur="inputBlur(this)"><br><br>

  				<!-- Tell me about it  -->
  				<textarea name="comment" rows="5" col="40" style="color:#888;" value="  Tell us about it" onfocus="inputFocus(this)" onblur="inputBlur(this)">Tell us about it</textarea><br><br>
  				<input type="submit" value="Create Post" id="submit">
  			</form>
  		</div> 
  	</div>
	</body>
</html>
