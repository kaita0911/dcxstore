<?php 

include_once('../#include/config.php');


if(!empty($_POST["district_ID"])){ 

    // Fetch city data based on the specific state 

    $query = "SELECT * FROM phuongxa WHERE maqh = ".$_POST['district_ID']." ORDER BY xaid ASC"; 

    $result = $db->query($query); 

     

    // Generate HTML of city options list 

    if($result->num_rows > 0){ 

         echo '<option value="">Phường/Xã</option>';

        while($row = $result->fetch_assoc()){  

            echo '<option value="'.$row['xaid'].'">'.$row['name'].'</option>'; 

        } 

    }else{ 

        echo '<option value="">Không có phường/xã</option>'; 

    } 

}/*elseif(!empty($_POST["state_id"])){ 

    // Fetch city data based on the specific state 

    $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC"; 

    $result = $db->query($query); 

     

    // Generate HTML of city options list 

    if($result->num_rows > 0){ 

        echo '<option value="">Select city</option>'; 

        while($row = $result->fetch_assoc()){  

            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 

        } 

    }else{ 

        echo '<option value="">City not available</option>'; 

    } 

} */

?>