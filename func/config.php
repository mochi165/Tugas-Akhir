<?php 
define('ENCRYPTION_KEY', '');
class mochi {
    //database setup
    //MAKE SURE TO FILL IN DATABASE INFO
    var $hostname_logon = 'localhost';      //Database server LOCATION
    var $database_logon = 'new-ta';			//Database NAME
    var $username_logon = 'root';       	//Database USERNAME
    var $password_logon = '';       		//Database PASSWORD 
    //connect to database
    function dbconnect(){
        return $con=mysqli_connect($this->hostname_logon,$this->username_logon,$this->password_logon,$this->database_logon);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
    }
    public function query($query){
		//return mysql_query($query);
		return mysqli_query($this->dbconnect(),$query);
	}
	
	public function select($tablename){
        /*$select= mysql_query("SELECT * FROM $tablename");
		return $select;*/
		return $this->query("SELECT * FROM ".$tablename);
	}
	
	public function selectsum($field,$var,$tablename){
        /*$select= mysql_query("SELECT SUM($field) as $var FROM $tablename");
		return $select;*/
		return $this->query("SELECT SUM(".$field.") as ".$var." FROM ".$tablename);
	}
	
	public function selectsum2($field,$var,$field2,$var2,$tablename){
        /*$select= mysql_query("select sum($field) as $var,sum($field2) as $var2 from $tablename");
		return $select;*/
		return $this->query("SELECT SUM(".$field.") as ".$var.",SUM(".$field2.") as ".$var2." FROM ".$tablename);
	}
    
    public function update($tablename){
        /*$update= mysql_query("update $tablename");
		return $update;*/ 
		return $this->query("UPDATE ".$tablename);
    }
    
	public function insert($tablename){
        /*$insert= mysql_query("insert into $tablename");
		return $insert;*/
		return $this->query("INSERT INTO ".$tablename);
	}
    
	public function delete($tablename){
		/*$delete= mysql_query("delete FROM $tablename");
		return $delete;*/
		return $this->query("DELETE FROM ".$tablename);
	}
	
	public function arr($result){
		/*$dataaray=mysql_fetch_array($qu);
		return $dataaray;*/
		return mysqli_fetch_array($result,MYSQLI_ASSOC);
    }	
		
	function anti_injeksi($teks)
	{
		return $teks=mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($teks))));
	}
	
	public function ere($teks)
	{
		return $teks=eregi("^[A-Za-z0-9\_]+@[A-Za-z0-9\_]+\.+[A-Za-z0-9\_]+$",$teks);
	}
	
	public function radiodata($name,$table,$order,$field,$isi,$select,$kit){
		//$select=mysql_query("select * from $table order by $order asc");
		$select=$this->query("SELECT * FROM ".$table." order by ".$order." asc");
		//while($kit=mysql_fetch_array($select)){
		while($kit=$this->arr($select)){
			$this->text(radio,$name,$kit[$field],'','','');
			echo $kit[$isi]; 
		}
	}
	
	public function listdata($name,$table,$order,$field,$isi,$select,$kit)
	{ 
		//$select=mysql_query("select *from $table order by $order asc");
		$select=$this->query("SELECT * FROM ".$table." order by ".$order." asc");
		?>
		<select name='<?php echo $name; ?>' id="<?php echo $name; ?>">
		<option value='...'>...</option>
		<?php
		//while ($kit=mysql_fetch_array($select) )
		while ($kit=$this->arr($select))
		{
		?>
			<option value='<?php echo $kit[$field]; ?> '> <?php echo $kit[$isi];?> </option>
		<?php 
		} 
		?>
		</select>
    <?php 
    }
	public function listdata_all($name,$table,$order,$field,$isi,$select,$kit)
	{ 
		//$select=mysql_query("select *from $table order by $order asc");
		$select=$this->query("SELECT * FROM ".$table." order by ".$order." asc");
		?>
		<select name='<?php echo $name; ?>' id="<?php echo $name; ?>">
		<option value='...'>...</option>
		<option value='All'>All</option>
		<?php
		//while ($kit=mysql_fetch_array($select) )
		while ($kit=$this->arr($select))
		{
		?>
			<option value='<?php echo $kit[$field]; ?>'> <?php echo $kit[$isi];?> </option>
		<?php 
		} 
		?>
		</select>
    <?php 
    }
    
    public function sesi_user()
	{
		if(empty($_SESSION['user']) && empty($_SESSION['pass']))
		{
		echo"<script>window.location.href='index'</script>";
		}
	}

	//FOR ALL FORM OBJECT
	function formawal($act,$nm){
	echo'
	<form action="'.$act.'" method="post" enctype="multipart/form-data" name="'.$nm.'" > ';}

	function text($type,$nm,$vl,$size,$class,$max){
	echo'
	<input type="'.$type.'" name="'.$nm.'" id="'.$nm.'" value="'.$vl.'" size="'.$size.'" maxlength="'.$max.'" 
	autocomplete="off" class="'.$class.'" >';}

	function textonclick($type,$nm,$vl,$size,$class,$max,$on){
	echo'
	<input type="'.$type.'" name="'.$nm.'" id="'.$nm.'" value="'.$vl.'" size="'.$size.'" maxlength="'.$max.'" 
	autocomplete="off" class="'.$class.'" onclick="'.$on.'">';}

	function textarea($nm,$vl,$cols,$rows){
	echo '<textarea name="'.$nm.'" cols="'.$cols.'" rows="'.$rows.'">'.$vl.'</textarea>';}

	function checkbox($nm,$vl){
	echo '<input name="'.$nm.'" type="checkbox" id="'.$nm.'" value="'.$vl.'" />';}

	function tutup(){echo "</form>";}

	//set list menu 
	function listmenu($name){
	echo'<select name="'.$name.'" id="'.$name.'">';}
	
	//value list
	function oplist($isi,$vl){
	echo'<option value="'.$vl.'">'.$isi.'</option>';}
	
	//end list
	function endlist(){
	echo'</select>';}

	//md5
	public function encrypt($text){
		$pass=md5($text);
		return $pass ;
	}

	//include
	function inc($file){
		include $file.".php";;
	}

	//include_once
	function inc_onc($file){
		include_once $file.".php";;
	}

	//re
	function req($file){
		require $file.".php";
	}

	//re
	function req_onc($file){
		require_once $file.".php";;
	}

	function alert($text)
	{ echo"<script>alert('$text');</script>"; } 
	
	function encrypt_decrypt($action, $string) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'r41s44ndr14n4';
		$secret_iv = 's4r4hZ4H1R4';
		// hash
		$key = hash('sha256', $secret_key);
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		}
		else if( $action == 'decrypt' ){
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
	
	function encryptString($value){
		return base64_encode($value);
	}
	
	function decryptString($value){
		return base64_decode($value);
	}
	
	/*function encryptString($value){
		//return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $value, MCRYPT_MODE_CBC, md5(md5($key))));
		return $this->encrypt_decrypt('encrypt', $value);
	}*/
	
	/*function decryptString($value){
		//return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($value), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $this->encrypt_decrypt('decrypt', $value);
	}*/
	
	function parameterString($rField){
		$sth =$this->select("t_params where kategori='".$rField."'");
		$rows_params = array();
		while($r = $this->arr($sth)) {
			$r[$r['kategori']]=$r['value'];
			$rows_params[] = $r;
		}
		$result_json_params=json_encode(array("data"=>$rows_params));
		$result_json_params_decode=json_decode($result_json_params,TRUE);
		return $result_json_params_decode['data'][0][$rField];
	}
	
	function qRows($query){
		return mysqli_num_rows($query);
	}
	
	function resultIfNull($value){
		if($value==""){
			$result=0;
		}else{
			$result=$value;
		}
		return $result;
	}
	
	function URL(){
		$http = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
		$newurl = str_replace("index.php","", $_SERVER['SCRIPT_NAME']);
		$url=explode("/",$newurl);
		return $siteRoot= $http.$_SERVER['SERVER_NAME']."/".$url[1];
	}
	
	function pageTitle($title,$description,$icon){
		return "<div class='page-title'>
			<div class='container'>
				<div class='row'>
					<div class='span12'>
						<i class='icon-".$icon." page-title-icon'></i>
						<h2>".$title." /</h2>
						<p>".$description."</p>
					</div>
				</div>
			</div>
		</div>";
	}
	function get_posts($start = 0, $number_of_posts = 2) {
		$sth =$this->query("SELECT `id`,`nama_software`, `refe`, `image`, `created`, `cp` from t_software LIMIT $start,$number_of_posts");
		$posts = array();
		while($row = $this->arr($sth)) {
			$row['refe'] = substr(strip_tags($row['refe']), 0, 200) . '...';
			$row['image'] = "<img alt='' src='".$this->URL()."/img/".$row['image']."'>";
			$row['tgl'] = date('d F Y', strtotime($row['created']));
			$posts[] = $row;
		}
		return json_encode($posts);
	}
	function pathImage(){
		return $path='img/';
	}
	function replaceLink($str){
		return preg_replace('@((www|http://)[^ ]+)@', '<a href="\1">\1</a>', $str);
	}
	function Title(){
		if(isset($_GET['params']) and $_GET['params']!=''){
			echo "Software.or.id - ".$this->paramDecrypt('title');
		}else{
			echo "Software.or.id";
		}
	}
	function iconPage($page){
		if(isset($_GET['page']) and $_GET['page'] ==$page){
			echo "current-page";
		}else{
			echo "";
		}
	}
	function paramDecrypt($key){
		$arrayParams= $this->decryptString($_GET['params']);
		$jsonDecParams=json_decode($arrayParams,true);
		return $jsonDecParams[$key];
	}
	function madSafety($string) {
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($string);
		return $string;
	} 
}
?>
