<?php require_once("config.php"); ?>

<?php 

if(isset($_GET['add'])){
	$query=query("SELECT * FROM products where product_id=".escape_string($_GET['add'])."");
	confirm($query);
	while($row=fetch_array($query)){
		if($row['product_qty']!=$_SESSION['product_'.$_GET['add']]){
			$_SESSION['product_'.$_GET['add']]+=1;
			redirect("../public/checkout.php");
		}else{
			set_message("We Only have ".$row['product_qty']." ".$row['product_title']." available");
			redirect("../public/checkout.php");
		}
	}
}


if(isset($_GET['remove'])){
	$_SESSION['product_'.$_GET['remove']]--;
	if($_SESSION['product_'.$_GET['remove']]<1){
		$_SESSION['product_'.$_GET['remove']]=0;
		unset($_SESSION['item']);
		unset($_SESSION['item_qty']);
		redirect("../public/checkout.php");
	}else{
		redirect("../public/checkout.php");
	}
}
if(isset($_GET['delete'])){
	$_SESSION['product_'.$_GET['delete']]=0;
	unset($_SESSION['item']);
	unset($_SESSION['item_qty']);
	redirect("../public/checkout.php");
}





function cart(){
	$total=0;
	$item_qty=0;
	$item_name=1;
	$item_number=1;
	$amount=1;
	$quantity=1;
	foreach ($_SESSION as $name => $value) {
		if($value>0){
		if(substr($name,0,8)=="product_"){
			$len=strlen($name);
			$length=$len-8;
			$id=substr($name,8,$length);
			$query=query("select * from products where product_id= ".escape_string($id)."");
	confirm($query);
	while($row=fetch_array($query)){
		$sub=$row['product_price']*$value;
		$total_qty=$item_qty+=$value;
		$product_img= upload_img($row['product_image']);
		
$bar = <<<EOT
<tr>
                <td>{$row['product_title']}<br>
                <img class="image-responsive" src="../resources/{$product_img}" alt="" width="100" height="70"></a>
                <td>
               
                <td>{$row['product_price']}</td>
                <td>{$value}</td>
                <td>{$sub}</td>
                <td>
                <a class="btn btn-warning" href="../resources/cart.php?remove=$id">
                <span class="glyphicon glyphicon-minus"></span></a>

                <a class="btn btn-success" href="../resources/cart.php?add=$id">
                <span class="glyphicon glyphicon-plus"></span></a>

                <a class="btn btn-danger" href="../resources/cart.php?delete=$id">
                <span class="glyphicon glyphicon-remove"></span></a>
                </td>
                
              
</tr>
<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
  <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
  <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
  <input type="hidden" name="quantity_{$quantity}" value="{$value}">

EOT;
echo $bar;
$item_name++;
$item_number++;
$amount++;
$quantity++;
}
$_SESSION['item']=$total+=$sub;
$_SESSION['item_qty']=$total_qty;
}

		}
	}
}





function report(){

	global $con;
	if(isset($_GET['tx'])){
	$amount=$_GET['amt'];
	$transaction=$_GET['tx'];
	$status=$_GET['st'];
	$currency=$_GET['cc'];





	$total=0;
	$item_qty=0;
	
	foreach ($_SESSION as $name => $value) {
		if($value>0){
		if(substr($name,0,8)=="product_"){
			$len=strlen($name);
			$length=$len-8;
			$id=substr($name,8,$length);
			$send_order=query("INSERT INTO orders(order_amount,order_transaction,order_status,order_currency) VALUES('{$amount}','{$transaction}','{$status}','{$currency}')");
			$last_id=insert_id();
confirm($send_order);
			$query=query("select * from products where product_id= ".escape_string($id)."");
	confirm($query);
	while($row=fetch_array($query)){
		$product_price=$row['product_price'];
		$product_title=$row['product_title'];
		$sub=$row['product_price']*$value;
		$item_qty+=$value;
		$insert_report=query("INSERT INTO reports(order_id,product_id,product_title,product_price,product_qty) values('{$last_id}','{$id}','{$product_title}','{$product_price}','{$value}')");
		
}

$total+=$sub;
echo $item_qty;

}

		}
	}session_destroy();
	}else{
	redirect("index.php");
}
}











function display_paypal(){
	if(isset($_SESSION['item_qty'])&&($_SESSION['item_qty'])>=1){
$paypal_button = <<<EOT
 <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
EOT;

return $paypal_button;
}else{
$empty = <<<EOT
	<center><h1>NO Items in Cart</h1><br>
	<a class="nav-link" href="index.php?cart=emp">continue shopping
                <span class="sr-only">(current)</span>
              </a>
	</center>
EOT;
return $empty;
}
}
function continue_shop(){

}






 ?>