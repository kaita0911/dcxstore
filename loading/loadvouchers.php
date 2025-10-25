<?php 

include_once('../#include/config.php');
$sumall = 0;
$sum = $_POST["inputVal"];
if(!empty($_POST["macode"])){ 

   
    

    $sql = "SELECT * FROM $GLOBALS[db_sp].vouchers WHERE name like '%".$_POST['macode']."%'"; 
   
    $result = $db->query($sql); 
   
     if($result->num_rows > 0){ 

         while($row = $result->fetch_assoc())
         {  
               
                
                    $price_min_int = str_replace(".", "", trim($row["price_min"]));
                    $sum_int = str_replace(".", "", trim($sum));
                    if($sum_int > $price_min_int)
                    {
                        
                            $output.='<p>Mã giảm giá <span class="phiship">- '.number_format($row["price"],0,",",".").' ₫</span>
                            <input type ="hidden" name= "vouchers" value ="'.$row["price"].'"/></p>'; 
                            $sumall = $sum - $row['price'];
                        
                    }
                    else
                    {
                        $alertvou.= '<span> <i class="fa-solid fa-circle-exclamation"></i> Không áp dụng được mã khuyến mãi này</span>';
                        $sumall = $sum;
                    }
                

               
        } 
    }
    else{ 

        $alertvou.= '<span> <i class="fa-solid fa-circle-exclamation"></i> Không áp dụng được mã khuyến mãi này</span>'; 
        $sumall = $sum;

    } 

}
else{
     $alertvou.= '<span> <i class="fa-solid fa-circle-exclamation"></i> Không áp dụng được mã khuyến mãi này</span>'; 
    $sumall = $sum;
}                  
            
$output_sum.='<p>Tổng tiền<span class="sum"><strong>'.number_format($sumall,0,",",".").' ₫</strong></span></p>';

$data = array('vouchers' => $output,'sumall' => $output_sum, 'alertvou' =>$alertvou);
echo json_encode($data);

?>
