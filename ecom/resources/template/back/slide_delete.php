<?php require_once("../../config.php");
if(isset($_GET['id'])){
	$query=query("DELETE FROM slides where slides_id=".escape_string($_GET['id'])."");
	confirm($query);
	set_message("slide has been Deleted");
	redirect("../../../public/admin/index.php?slides");
}else{
	redirect("../../../public/admin/index.php?slides");
}


 ?>