<!DOCTYPE html>
<html>
    <head>
        <title>Debo's Blog</title>
        <link type="text/css" rel="stylesheet" href="css/posts_stylesheet.css">
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
                    $titleerror = "Search by Post Title";
                    $nameerror = "Search by Name";
                    $locationerror = "Search by Post Location";
                    $commenterror = "Search by Comment"; 

                    $titleField = null;
                    $nameField = null;
                    $locationField = null;
                    $commentField = null;
                        

                    if (isset($_GET['submit'])){
                        $titleField = strtolower($_GET['titleField']);
                        $nameField = strtolower($_GET['nameField']);
                        $locationField = strtolower($_GET['locationField']);
                        $commentField = strtolower($_GET['commentField']);
                        
                        if (empty($title)){

                        }
                        else if (strlen($title) >= 50) {
                            $titleerror = "Max Search 50 Characters";
                        }

                        if (empty($name)){
                            
                        }
                        else if (preg_match('/^[A-Za-z ]+$/', $name) === 0) {
                            $nameerror = "Only Alphabetic Characters";
                        }       
                        else if (strlen($name) >= 50) {
                            $nameerror = "Max Search 50 Characters";
                        }

                        if (empty($location)){
                            
                        }
                        else if (strlen($location) >= 50) {
                            $locationerror = "Max Search 50 Characters";
                        }

                        if (empty($comment)){
                            
                        }
                        else if (strlen($comment) >= 150) {
                            $commenterror = "Max Search 150 Characters";
                        }
                    }

                 ?> 

        <div id="firstBlock">
            <h1>All Posts</h1>
            <div id="container"> 

                <div class="block1">
                    <p id="searchDescription">Search specific fields:</p>

                    <form action="posts.php" method="GET">
                        <input class=" formField" type="text" name="titleField" placeholder="<?php echo $titleerror; ?>"><br>
                        <input class="formField" type="text" name="nameField" placeholder="<?php echo $nameerror; ?>"><br>
                        <input class="formField" type="text" name="locationField" placeholder="<?php echo $locationerror; ?>"><br>
                        <input class="formField" type="text" name="commentField" placeholder="<?php echo $commenterror; ?>"><br>
                        <input type="submit" id="submit" name="submit">
                    </form>
                </div>       

                <?php 

                $array = file("data.txt");

                foreach($array as $value) {
                    $array2 = explode(" | ", $value);
                    for($i = 0; $i < count($array2); $i++) {
                        if ($i === 0) {
                            $title = $array2[0];
                        }
                        else if ($i === 1) {
                            $name = $array2[1];
                        }
                        else if ($i === 2) {
                            $location = $array2[2];
                        }
                        else if ($i === 3) {
                            $imgUrl = $array2[3];
                        }
                        else {
                            $comment = $array2[4];
                        }
                    }
                    if ((empty($titleField) || $titleerror == "Max Search 50 Characters" || 1 == preg_match("/$titleField/", strtolower($title))) && (empty($nameField) || $nameerror == "Max Search 50 Characters" || $nameerror == "Only Alphabetic Characters"|| 1 == preg_match("/$nameField/", strtolower($name))) && (empty($locationField) || $locationerror == "Max Search 50 Characters" || 1 == preg_match("/$locationField/", strtolower($location))) && (empty($commentField) || $commenterror == "Max Search 150 Characters" || 1 == preg_match("/$commentField/", strtolower($comment)))) {
                ?>

                <div class="block">
                    <h3><? echo $title; ?></h3>
                    
                    <img src="<?php echo $imgUrl; ?>" class="blockPic" alt="<?php echo $title; ?>"><br><br>

                    <div class="words">
                        <p class="field">Poster name: <span class="descriptor"><?php echo $name; ?></span></p><br><br>

                        <p class="field">Post Location: <span class="descriptor"><?php echo $location; ?></span></p><br><br>
                
                        <p class="field">Description: <span class="descriptor"><?php echo $comment; ?></span></p><br><br>
                    </div>
                </div>
                <?php 
                }
            } ?>

                    <?php 
                if (isset($_GET['destroy'])){
                    fopen("data.txt", "w");
                }
                ?>
                <div id="block2">
                    <form id="destroyer" method="GET" action="posts.php">
                        <input type="submit" name="destroy" id="destroy" value="Destroy All Posts">
                    </form>
                </div>
            </div>
        </div>
        
        
    </body>
</html>