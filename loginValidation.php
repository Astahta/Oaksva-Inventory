<?php   
function Redirect($url, $permanent = false) {
  header('Location: ' . $url, true, $permanent ? 301 : 302);
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $passwd = $_POST["password"];
}

$con = mysqli_connect("localhost","root","","oaksva");
$sql = 'SELECT email, password  FROM pegawai';

$result = mysqli_query($con, $sql);
$no = 1;
while ($obj = $result->fetch_object()) {
  $emails = $obj->email;
  $pwd = $obj->password;
  
  if (($email==$emails) && ($passwd==$pwd)) {
    Redirect('index.php', false);
  }
  $no++;
}

if (($email=="admin@oaksva.com") && ($passwd=="xxx")) {
  Redirect('adminDisplayInventory.php', false);
} else {
  Redirect('login.php', false);

}

?>