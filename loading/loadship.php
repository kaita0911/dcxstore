<?php 

include_once('../#include/config.php');

if(!empty($_POST["id_city"])){ 

    $sum = $_POST["inputVal"];

    $query = "SELECT * FROM $GLOBALS[db_sp].thanhpho WHERE matp = ".$_POST['id_city'].""; 

    $result = $db->query($query); 

    if($result->num_rows > 0){ 

        while($row = $result->fetch_assoc()){  

            echo '<p>Phí ship <span class="phiship"><strong>'.number_format($row["phiship"],0,",",".").' ₫</strong></span>
                 <input type ="hidden" name= "ship" value ="'.$row["phiship"].'"/></p>
                
                 '; 

            $totaltam = $sum + $row['phiship'];
        } 
        
        echo '<p class="sumend">Tổng tiền <span class="sum"><strong>'.number_format($totaltam,0,",",".").' ₫</strong></span></p>';

    }
    else{ 

        echo 'Phí ship <span class="sum">0 đ</span>'; 

    } 

}

?>