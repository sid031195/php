
<?php 
$upload_dir="upload";
//helper function
function upload_img($picture){
	global $upload_dir;
	return $upload_dir.DS.$picture;
}
function insert_id(){
	global $con;
	return mysqli_insert_id($con);
}
function set_message($msg){
	if(!empty($msg)){
		$_SESSION['message']=$msg;
	}else{
		$msg="";
	}
}
function display_msg(){
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){
	header("Location: $location");
		}

function query($sql){
	global $con;
	return mysqli_query($con,$sql);
}
function confirm($result){
	global $con;
	if(!$result){
          		die("Query Failed: ".mysqli_error($con));
          	}
}
function escape_string($string){
	global $con;
	return mysqli_real_escape_string($con,$string);
}
function fetch_array($result){
	
	return mysqli_fetch_array($result);
}

//get products
function get_product(){
	$query=query("select * from products");
	confirm($query);
	$rows = mysqli_num_rows($query); // Get total of mumber of rows from the database
if(isset($_GET['page'])){ //get page from URL if its there
    $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers
} else{// If the page url variable is not present force it to be number 1
    $page = 1;
}
$perPage = 6; // Items per page here 
$lastPage = ceil($rows / $perPage); // Get the value of the last page
// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage
if($page < 1){ // If it is less than 1
    $page = 1; // force if to be 1
}elseif($page > $lastPage){ // if it is greater than $lastpage
    $page = $lastPage; // force it to be $lastpage's value
}	
$middleNumbers = ''; // Initialize this variable

// This creates the numbers to click in between the next and back buttons


$sub1 = $page - 1;
$sub2 = $page - 2;
$add1 = $page + 1;
$add2 = $page + 2;



if($page == 1){

      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
    

} elseif ($page == $lastPage) {
    
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

}
elseif ($page > 2 && $page < ($lastPage -1)) {

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

         $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';

      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';

      // echo "<ul class='pagination'>{$middleNumbers}</ul>";


} elseif($page > 1 && $page < $lastPage){

     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';

     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
 
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';


     


}


// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query


$limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;




// $query2 is what we will use to to display products with out $limit variable

$query2 = query(" SELECT * FROM products $limit");
confirm($query2);


$outputPagination = ""; // Initialize the pagination output variable


// if($lastPage != 1){

//    echo "Page $page of $lastPage";


// }


  // If we are not on page one we place the back link

if($page != 1){


    $prev  = $page - 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
}

 // Lets append all our links to this variable that we can use this output pagination

$outputPagination .= $middleNumbers;


// If we are not on the very last page we the place the next link

if($page != $lastPage){


    $next = $page + 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';

}


// Doen with pagination



// Remember we use query 2 below :)

while($row = fetch_array($query2)) {

$product_image = upload_img($row['product_image']);

$product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?product_id={$row['product_id']}"><img style="height:90px" src="../resources/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?product_id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>{$row['short_description']}</p>
             <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
        </div>


       
    </div>
</div>

DELIMETER;

echo $product;


		}


       echo "
       
       <div class='text-center ' ><ul class='pagination'>{$outputPagination}</ul></div>";





}


function show_category(){
	$query=query("select * from categories");
	confirm($query);
	while($row=fetch_array($query)){
		
 $bar = <<<EOT
 <tr>
            <td>{$row['cat_id']}</td>
            <td>{$row['title']}</td>
            <td><a  class="btn btn-danger" href="../../resources/template/back/delete_categories.php?id={$row['cat_id']}">Delete</a></td>
  </tr>

EOT;
echo $bar;

		
	}
}


	function get_category(){
		$query=query("SELECT * FROM categories");
          	confirm($query);
          	while($row=fetch_array($query)){
$bar = <<<EOT
<a href="category.php?cat_id={$row['cat_id']}" class="list-group-item">{$row['title']}</a>

EOT;
echo $bar;
          	}

	}


	function get_category_option(){
		$query=query("SELECT * FROM categories");
          	confirm($query);
          	while($row=fetch_array($query)){
$bar = <<<EOT
<option value="{$row['cat_id']}">{$row['title']}</option>

EOT;
echo $bar;
          	}

	}


	function add_cat(){
		if(isset($_POST['add_cat'])){
			$cat_title=escape_string($_POST['cat_title']);
			if(empty($cat_title)|| $cat_title==""){
				echo"<p class='bg-danger'>categories cannot be Empty</p>";
			}else{
			$insert_query=query("INSERT INTO categories (title) values('$cat_title')");
			confirm($insert_query);
			set_message("categories has been Added");		
		}
	}
}
function get_product_in_cat_page(){
	$query=query("select * from products where product_cat_id=".escape_string($_GET['cat_id'])."");
	confirm($query);
	while($row=fetch_array($query)){
		
 $bar = <<<EOT
<div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">{$row['product_title']}</h4>
              <p class="card-text">{$row['product_description']}</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Buy now</a></br></br>
               <a href="item.php?product_id={$row['product_id']}" class="btn btn-default">Find Out More!</a>
            </div>
          </div>
        </div>

EOT;
echo $bar;

		
	}
}	


function get_product_in_shop_page(){
	$query=query("select * from products");
	confirm($query);
	while($row=fetch_array($query)){
		$product_img= upload_img($row['product_image']);
		
 $bar = <<<EOT
<div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="../resources/{$product_img}" alt="" width="100" height="130">
            <div class="card-body">
              <h4 class="card-title">{$row['product_title']}</h4>
              <p class="card-text">{$row['product_description']}</p>
            </div>
            <div class="card-footer">
              <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy now</a></br></br>
               <a href="item.php?product_id={$row['product_id']}" class="btn btn-default">Find Out More!</a>
            </div>
          </div>
        </div>

EOT;
echo $bar;

		
	}
}	

function login_user(){
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query=query("select * from user where username='{$username}' AND password='{$password}' ");
		confirm($query);
		if(mysqli_num_rows($query)==0){
			set_message("Your username or password is incorrect");
			redirect("login.php");
		}else{
			$_SESSION['username']=$username;
			redirect("admin");
		}

	
}
}

function send_message(){
	if(isset($_POST['submit'])){
		$to="someone@gmail.com";
		$from_name=$_POST['from_name'];
		$subject=$_POST['subject'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$header="From :{$from_name} {$email}";
		$result=mail($to, $subject, $message, $header);
		if(!$result){
			redirect("contact.php");
			set_message("sorry message cannot sent");
			
		}else{
			redirect("contact.php");
			set_message("message sent successfully");
		}
	}
}


function display_order(){
	$query=query("select * from orders");
	confirm($query);
	while($row=fetch_array($query)){
		
 $bar = <<<EOT
<tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_status']}</td>
            <td>{$row['order_currency']}</td>
            <td><a  class="btn btn-danger" href="../../resources/template/back/delete_order.php?id={$row['order_id']}">Delete</a></td>
           
 </tr>

EOT;
echo $bar;

		
	}

}

function display_reports(){
	$query=query("select * from reports");
	confirm($query);
	while($row=fetch_array($query)){
		
 $bar = <<<EOT
<tr>
            <td>{$row['report_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_qty']}</td>
            <td><a  class="btn btn-danger" href="../../resources/template/back/delete_report.php?id={$row['report_id']}">Delete</a></td>
           
 </tr>

EOT;
echo $bar;

		
	}

}


function show_user(){
	$query=query("select * from user");
	confirm($query);
	while($row=fetch_array($query)){
		
 $bar = <<<EOT
 <tr>
            <td>{$row['user_id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td><a  class="btn btn-danger" href="../../resources/template/back/delete_user.php?id={$row['user_id']}">Delete</a></td>
  </tr>

EOT;
echo $bar;

		
	}
}



function add_user(){
	if(isset($_POST['add_user'])){
		$username=escape_string($_POST['username']);
		$email=escape_string($_POST['email']);
		$password=escape_string($_POST['password']);
		$insert_query=query("INSERT INTO user (username,password,email) values('$username','$password','$email')");
			confirm($insert_query);
			set_message("user has been Added");	
	}
}


function get_product_in_admin(){

	$query=query("select * from products");
	confirm($query);
	while($row=fetch_array($query)){
		$product_img= upload_img($row['product_image']);
	$category=get_cat_title_by_id($row['product_cat_id']);
		
 $bar = <<<EOT
 <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']} <br>
 			<a href="index.php?edit_product&id={$row['product_id']}"><img src="../../resources/{$product_img}" alt="img" width="120" height="70"></a></td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_qty']}</td>
            <td>{$row['short_description']}</td>
            <td>{$row['product_description']}</td>
             <td><a  class="btn btn-danger" href="../../resources/template/back/delete_product.php?id={$row['product_id']}">Delete</a></td>
</tr>

EOT;
echo $bar;

		
	}


}







function add_product(){
	if(isset($_POST['publish'])){
		$product_title=escape_string($_POST['product_title']);
		$product_price=escape_string($_POST['product_price']);
		$product_description=escape_string($_POST['product_description']);
		$product_qty=escape_string($_POST['product_qty']);
		$short_description=escape_string($_POST['short_description']);
		//$product_brand=escape_string($_POST['product_brand']);
		//$product_keyword=escape_string($_POST['product_keyword']);
		$product_cat_id=escape_string($_POST['product_cat_id']);
		$product_image=basename($_FILES['file']['name']);
		$image_tmp_path=$_FILES['file']['tmp_name'];

		if(move_uploaded_file($image_tmp_path, UPLOAD_DIR.DS.$product_image)){

		$query=query("
			INSERT INTO products(product_title,product_cat_id,product_price,product_qty,product_description,short_description,product_image) VALUES(
			'{$product_title}','{$product_cat_id}','{$product_price}',
			'{$product_qty}','{$product_description}','{$short_description}','{$product_image}')");
		$last_id=insert_id();
		confirm($query);
		set_message("New Product {$last_id} has been added");
		redirect("index.php?product");
}elseif(empty($product_image || $image_tmp_path )){
			set_message("File not available");
			redirect("index.php?add_product");
		}

	}
}





function update_product(){
	global $con;
	if(isset($_POST['update'])){
		$product_title=escape_string($_POST['product_title']);
		$product_price=escape_string($_POST['product_price']);
		$product_description=escape_string($_POST['product_description']);
		$product_qty=escape_string($_POST['product_qty']);
		$short_description=escape_string($_POST['short_description']);
		$product_cat_id=escape_string($_POST['product_cat_id']);
		$product_image=basename($_FILES['file']['name']);
		$image_tmp_path=$_FILES['file']['tmp_name'];

		if(empty($product_image)){
			$query=query("SELECT product_image from products where product_id=".escape_string($_GET['id'])."");
			confirm($query);
			while($row=fetch_array($query)){
				$product_image=$row['product_image'];
			}
		}
		/*
		if($product_cat_id==0){
			$query=query("SELECT product_cat_id from products where product_id=".escape_string($_GET['id'])."");
			confirm($query);
			while($row=fetch_array($query)){
				$product_cat_id=$row['product_cat_id'];
			}
		}*/

		move_uploaded_file($image_tmp_path, UPLOAD_DIR.DS.$product_image);

		$query="UPDATE products set ";
		$query.="product_title           = '{$product_title}'             ,";
		$query.="product_cat_id          = '{$product_cat_id}'            ,";
		$query.="product_price           = '{$product_price}'             ,";
		$query.="product_qty             = '{$product_qty}'               ,";
		$query.="product_description     = '{$product_description}'       ,";
		$query.="short_description       = '{$short_description}'         ,";
		$query.="product_image           = '{$product_image}'              ";
		$query.=" where product_id=".escape_string($_GET['id']);
		$update_query=query($query);
		confirm($update_query);
		set_message("Product  has been Updated.");
		redirect("index.php?product");
		echo $query;
		echo mysqli_error($con);
	

	}
}




function get_cat_title_by_id($product_cat_id){
	$query=query("select * from categories where cat_id='{$product_cat_id}'");
	confirm($query);
	while($row=fetch_array($query)){
	return $row['title'];
}
}


/****************Slidder Functions*****************/

function add_slidder(){
	if(isset($_POST['add_slide'])){
		$slide_title=escape_string($_POST['slide_title']);
		$slide_image=basename($_FILES['file']['name']);
		$slide_image_loc=$_FILES['file']['tmp_name'];
		if(empty($slide_image_loc)|| empty($slide_image)){
			echo"<p class='bg-danger'>File cannot be empty</p>";
		}elseif(move_uploaded_file($slide_image_loc, UPLOAD_DIR.DS.$slide_image)){
		
		$query=query("INSERT INTO slides(slides_title,slides_image) VALUES('$slide_title','$slide_image')");
		confirm($query);
		set_message("slidder added successfully");
		redirect("index.php?slides");

	}else{
		echo "File not uploaded".$_FILES['file']['error'];
	}
	}
}
function current_slidder_in_admin(){
	$query=query("SELECT * FROM slides order by slides_id DESC LIMIT 1");
confirm($query);
while($row=fetch_array($query)){
	$slides_image= upload_img($row['slides_image']);
$bar = <<<EOT
 
        <img class="image-responsive" src="../../resources/{$slides_image}" alt="Chicago" style="width:200px;height:150px;">
      

EOT;
echo $bar;
	
}
}
function get_slidder(){
$query=query("SELECT * FROM slides");
confirm($query);
while($row=fetch_array($query)){
	$slides_image= upload_img($row['slides_image']);
$bar = <<<EOT
 <div class="item">
        <img   class="image-responsive" src="../resources/{$slides_image}" alt="Chicago" >
      </div>

EOT;
echo $bar;
	
}
}
function get_active_slidder(){
$query=query("SELECT * FROM slides order by slides_id DESC LIMIT 1");
confirm($query);
while($row=fetch_array($query)){
	$slides_image= upload_img($row['slides_image']);
$bar = <<<EOT
 <div class="item active">
        <img class="image-responsive" src="../resources/{$slides_image}" alt="Chicago">
      </div>

EOT;
echo $bar;
	
}
}
function get_slidder_thumbnail(){
$query=query("SELECT * FROM slides order by slides_id ASC");
confirm($query);
while($row=fetch_array($query)){
	$slides_thumbnail= upload_img($row['slides_image']);
$bar = <<<EOT
 
        <div class="col-xs-6 col-md-3">
	<a href="../../resources/template/back/slide_delete.php?id={$row['slides_id']}">
		<img class="img-responsive" src="../../resources/{$slides_thumbnail}">
	</a>
</div>
      

EOT;
echo $bar;
	
}
}






 ?>
