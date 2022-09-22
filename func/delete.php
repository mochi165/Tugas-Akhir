<?php 
if (isset($_GET["idKecamatan"])) {
	$idKecamatan = $_GET['idKecamatan'];
	$data = $s -> delete ("datakecamatan WHERE idKecamatan = '$idKecamatan' ");
} else if (isset($_GET["idDataBencana"])) {
	$idDataBencana = $_GET['idDataBencana'];
	$data = $s -> delete ("databencana WHERE idDataBencana = '$idDataBencana' ");
} else if (isset($_GET["idTempat"])) {
	$idTempat = $_GET['idTempat'];
	$data = $s -> delete ("dataevakuasi WHERE idTempat = '$idTempat' ");
} else if (isset($_GET["idMatrik"])) {
	$idMatrik = $_GET['idMatrik'];
	$data = $s -> delete ("tablematrik WHERE idMatrik = '$idMatrik' ");
} else {
	echo '<script>alert("Error Data Mohon Coba Lagi!");    </script>';
} 
if($data){
	echo '<script>alert("Berhasil!, Please Reload !!!"); window.history.back();  location.reload();  </script>';
}else{
	echo '<script>alert("Error Mohon Coba Lagi!");   </script>';
}

 ?>