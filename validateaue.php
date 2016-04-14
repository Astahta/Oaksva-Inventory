<?php
	function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	

	$order 		= $_POST['emailid'];
	$nama		= $_POST['name'];
	$telpon		= $_POST['phone'];
	$divisi		= $_POST['division'];
	$password	= $_POST['pass'];

	$con = mysqli_connect("localhost","root","","oaksva");                 
    $sql = $con->prepare("UPDATE pegawai SET nama = ?, no_telpon = ?, divisi = ?, password = ? WHERE email = ? ");                                   
    $sql->bind_param("sssss",$nama,$telpon,$divisi,$password,$order);
    $sql->execute();
	Redirect('adminDisplayEmployee.php', false);
}else{	
	echo '<script>window.history.back()</script>';
}

?>