<?php
    require "config.php";
?>
<?php
    $query = "SELECT Problem FROM prosol";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Select Problem</title>

        <style>
            body {
                background-color: grey;
            }
            img {
                margin-left: 30%;
                border-radius: 5%;
                width: 600px;
            }
            p {
                font-size: 30px;
                margin-left: 10%;
                color: black;
            }
            .select {
                font-size: 30px;
                padding: 30px 200px;
                color: red;
                background-color: black;
                border: 1px solid #dddddd;
                cursor: pointer;
                border-radius: 5px;
                
            }
            .select: focus,
            .select: hover {
                outline: none;
                border: 1px solid #bbbbbb;
            }
        </style>
    </head>
    <body>
        <img src="problem_select.png">
        <br><br><br><br><br>
    <form action="" method="post">
        <label class="form-group select-boxes col-md-6" class="form-control" style="margin-left: 30%">
            <select name="Problem" id="Problem" class="select">
            <option disabled selected value="">Select Problem</option>
            <?php
                while($row = mysqli_fetch_array($result)) 
                { ?>
                    <option value="<?php echo $row['Problem']; ?> " > <?php echo $row['Problem']; ?> </option>;
                <?php
                } ?>
            </select>
        </label>
        <input type="submit" name="submit" value="Submit" class="btn float-right btn-block" style="background-color: black; color:white; border-radius:5px; padding: 12px 20px; font-size: 20px; margin-left: 45%; margin-top: 20px"><br><br><br><br><br>
        
    </form>

    <form action=maps1.php id="sub">
        <input type="submit" name="submit" value="Did not find the required solution" form="sub" class="btn float-right btn-block" style="background-color: black; color:white; border-radius:5px; padding: 12px 20px; font-size: 20px; margin-left: 38%" >
    </form>
    
    <?php
        if(isset($_POST['submit'])){
            if(!empty($_POST['Problem'])) {
                $selected = $_POST['Problem'];
                $query1 = "SELECT Solution FROM prosol WHERE Problem = '$selected' ";
                $result1 = mysqli_query($conn, $query1);
                while($row1 = mysqli_fetch_array($result1)) 
                { 
                    ?> <p> <?php echo nl2br($row1['Solution']); ?> </p> 
                <?php
                } 
                if (strncmp($selected,'Phone Freezes',13)==0) { ?>
                    <img src="iphone.gif" style="width:400px; margin-left: 40%"> 
        <?php   }
            }
        }
    ?>
    

    </body>
    
</html>
