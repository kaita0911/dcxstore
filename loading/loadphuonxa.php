<?php 
include_once('../config.php');


if(!empty($_POST["state_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM $GLOBALS[db_sp].phuongxa WHERE maqh = ".$_POST['state_id']." ORDER BY xaid ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['xaid'].'">'.$row['name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Không có phường xã</option>'; 
    } 
}
?>