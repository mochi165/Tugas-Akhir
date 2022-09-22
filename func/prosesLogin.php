 <?php
require_once('./config.php');
$s=new mochi();
$s->dbconnect();

$username = $_POST['username'];
$password = $_POST["password"];
session_start();

$select = $s-> select ("user WHERE username='".$username."' and password='".$password."'");
$log = $s -> arr ($select);

if ($s->qRows($select) > 0){
    $_SESSION['id_user'] = $log['id_user'] ;
    header("location:../");
}else{
    echo"<script>alert('user atau password salah!!!'); window.history.back(); location.reload();</script>";
}


?>
