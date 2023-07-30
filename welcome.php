<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
      background-image: url("Home.jpg");
      background-position: 99% center;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #464646;
    }
    h1 {
        color: red;
    }
    p {
        float:right;
        margin-top: 15%;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
                <form action=mobile.php>
                    <input type="image" src="lap.png" width=200 style="float:right; margin-left: 20px;">
                </form>
                <form action=mobile.php>
                    <input type="image" src="mob.jpeg" width=200 style="float:right; margin-left: 500px;">
                </form>
                
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; 
    $store_user = $_SESSION['username'];?>
    <a href="logout.php">Logout</a>
</body>
</html>