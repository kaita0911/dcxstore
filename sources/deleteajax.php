<?php

//action.php

session_start();


if(isset($_POST["action"]))
{

 	if($_POST["action"] == 'remove')
	{
	  foreach($_SESSION["Cart"] as $keys => $values)
	  {
		   if($values["id"] == $_POST["id"] && $values["pricesp"] == $_POST["pricesp"] )
		   {
		    unset($_SESSION["Cart"][$keys]);
		   }
		  
	  }
 	}
	if($_POST["action"] == 'empty')
	{
	  unset($_SESSION["Cart"]);
	}

}


?>