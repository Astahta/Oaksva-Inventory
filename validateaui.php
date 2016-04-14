<?php
	function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	

	$order 		= $_POST['inventoryid'];
	$nama		= $_POST['name'];
	$vendor	= $_POST['vendor'];
	$stok	= $_POST['stock'];
	$harga	= $_POST['price'];

	$con = mysqli_connect("localhost","root","","oaksva");                 
    $sql = $con->prepare("UPDATE inventory SET nama = ?, vendor = ?, stok = ?, harga = ? WHERE id_inventory = ? ");                                   
    $sql->bind_param("sssss",$nama,$vendor,$stok,$harga,$order);
    $sql->execute();
	Redirect('adminDisplayInventory.php', false);
}else{	
	echo '<script>window.history.back()</script>';
}

?>