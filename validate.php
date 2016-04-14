<?php
	function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}	
if(isset($_POST['Post'])){
	
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$order 		= $_POST['order-id'];

	$con = mysqli_connect("localhost","root","","oaksva");                                                    
    $sql = $con->prepare("SELECT * FROM pegawai WHERE pegawai.email = ? AND pegawai.password = ?");
    $sql->bind_param("ss",$email, $password);
    $sql->execute();
    $result = $sql->get_result();
    //$result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
    	$update_transaction =  $con->prepare('UPDATE transaksi_pesanan SET status_pengiriman = "done", tanggal_kirim = CURRENT_DATE(), email_pegawai = ? WHERE id_pesanan = ?');
    	$update_transaction->bind_param("si",$email,$order);
        var_dump ($order);
    	$update_transaction->execute();
    	//Redirect('Delivery.php?stat=1', false);
    }else{
    	Redirect('Delivery.php?stat=0', false);
    }
	
}else{	
	echo '<script>window.history.back()</script>';
}

?>