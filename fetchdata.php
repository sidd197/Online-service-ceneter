<?php
    if(isset($_POST["action"])) {
        require "config.php";
        $output = '';
        if ($_POST["action"] == "OS")
        {
            $query = "SELECT Brand FROM mobiles WHERE OS = '".$_POST["query"]."' GROUP BY Brand";
            $result = mysqli_query($conn, $query);
            $output .= '<option value="">Select Brand</option>';
            while ($row = mysqli_fetch_array($result))
            {
                $output .= '<option value="'.$row["Brand"].'">'.$row["Brand"].'</option>';
            }
        }
        
        if ($_POST["action"] == "Brand")
        {
            $query = "SELECT Model FROM mobiles WHERE Brand = '".$_POST["query"]."'";
            $result = mysqli_query($conn, $query);
            $output .= '<option value="">Select Model</option>';
            while ($row = mysqli_fetch_array($result))
            {
                $output .= '<option value="'.$row["Model"].'">'.$row["Model"].'</option>';
            }
        }
       
        /*if ($_POST["action"] == "OS")
        {
            $query = "SELECT Brand FROM mobiles WHERE OS = '".$_POST["query"]."' ";
            $result = mysqli_query($conn, $query);
            $output .= '<option value="">Select Brand</option>';
            while ($row = mysqli_fetch_array($result))
            {
                $output .= '<option value="'.$row["Brand"].'">'.$row["Brand"].'</option>';
            }
        }*/
        echo $output;
    }
    

?>