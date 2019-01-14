<?php require_once("../../config.php");
if(isset($_GET['id'])){
	$query=query("DELETE FROM products where product_id=".escape_string($_GET['id'])."");
	confirm($query);
	set_message("product has been Deleted");
	redirect("../../../public/admin/index.php?product");
}else{
	redirect("../../../public/admin/index.php?product");
}


 ?>