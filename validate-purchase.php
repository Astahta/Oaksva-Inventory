<?php
    function Redirect($url, $permanent = false)
{
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
}   
if(isset($_POST['Post'])){
    
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $order      = $_POST['order-id'];
    $stok      = (int)$_POST['stoki'];
    $iven      = (int)$_POST['iven'];

    $con = mysqli_connect("localhost","root","","oaksva");                                                    
    $sql = $con->prepare("SELECT * FROM pegawai WHERE pegawai.email = ? AND pegawai.password = ?");
    $sql->bind_param("ss",$email, $password);
    $sql->execute();
    $result = $sql->get_result();
    //$result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        // $inventory =  $con->prepare('SELECT id_inventory FROM transaksi_pesanan WHERE id_pesanan = ?');
        // $inventory->bind_param("i",$order);
        // $inventory->execute();
        
        // $inventory->bind_result($col1);
        // while($inventory->fetch()){
        //     print_r($col1);
        // }
        print_r($iven);

        $update_transaction =  $con->prepare('UPDATE transaksi_pesanan SET status_pengiriman = "done", tanggal_kirim = CURRENT_DATE(), email_pegawai = ? WHERE id_pesanan = ? AND id_inventory = ?');
        $update_transaction->bind_param("ssi",$email,$order,$iven);
        $update_transaction->execute();

        $stok =  $con->prepare('UPDATE inventory SET stok = ? WHERE id_inventory = ?');
        $stok->bind_param("ii",$stok,$iven);
        $stok->execute();
        //Redirect('purchase.php?stat=1', false);
    }else{
        //Redirect('purchase.php?stat=0', false);
    }
    
}else{  
    echo '<script>window.history.back()</script>';
}

?>