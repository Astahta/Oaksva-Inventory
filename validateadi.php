<?php
	function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	

	$order 		= $_POST['order-id'];

	$con = mysqli_connect("localhost","root","","oaksva");                 
    $sql = $con->prepare("DELETE FROM inventory WHERE id_inventory = ? ");                                   
    $sql->bind_param("s",$order);
    $sql->execute();
	Redirect('adminDisplayInventory.php', false);
}else{	
	echo '<script>window.history.back()</script>';
}

?>