<?php
    require "config.php";
?>

<!DOCTYPE html>
<html>
    <head>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>

        <style>
            body {
                background-image: url("brands.png");
            }
            img {
                margin-left: 30%;
                border-radius: 5%;
                width: 600px;
            }

            .select {
                font-size: 25px;
                padding: 20px 40px;
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
        <title>Solution</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <img src="mob_select_model.png">
        <br><br><br><br><br>
<form name="mobiles" action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
<label class="form-group select-boxes col-md-6" class="form-control" style="margin-left: 25%">
    <?php
          $OS = '';
          $query = "SELECT OS FROM mobiles GROUP BY OS ORDER BY OS ASC";
          $result = mysqli_query($conn, $query);
          while($row = mysqli_fetch_array($result))
          {
          $OS .= '<option value="'.$row["OS"].'">'.$row["OS"].'</option>';
          }
    ?>
    <select name="OS" id="OS" class="select action">
    <option value="">Select OS</option>
    <?php echo $OS; ?>
   </select>
</label>
<label class="form-group col-md-6">
    <select name="Brand" id="Brand" class="select action">
    <option value="">Select Brand</option>
   </select>
</label>
<label class="form-group col-md-6">
    <select name="Model" id="Model" class="select">
    <option value="">Select Model</option>
    </select>
        </label>

  <label class="form-group col-md-6">
    
        </label>
    
</div>
  </form>
  <br>
    <form action=select_problem.php id="sub">
        <input type="submit" name="submit" value="Submit" form="sub" class="btn float-right btn-block" style="background-color: black; color:white; border-radius:5px; padding: 12px 20px; font-size: 20px; margin-left: 45%" >
    </form>
    
    
    </body>
</html>

<script>
    $(document).ready(function() {
        $('.action').change(function() {
            if ($(this).val() != '')
            {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';
                if (action == "OS")
                {
                    result = 'Brand';
                }
                else
                {
                    result = 'Model';
                }
                $.ajax({
                    url:"fetchdata.php",
                    method: "POST",
                    data:{action:action, query:query},
                    success: function(data) {
                        $('#'+result).html(data);
                    }
                })
            }
        });
    });
</script>