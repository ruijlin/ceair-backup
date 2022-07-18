
<?php
	// 东航二期项目，北京区测试数据库
	// 正式环境注释掉该配置
	// $host	= "82.156.166.154";
	// $dbuser = "develop-erpg";
	// $dbpass = "94DWi!H3*p,Y3";
	// $dbname = "edbr-admin";
	$host	= "edb-manage-2020.ceair.com";
	$dbuser = "root";
	$dbpass = "A4EE*EWi!H?3ee";
	$dbname	= "edbr-admin";

	function dbConnection(){
		global $host;
		global $dbname;
		global $dbuser;
		global $dbpass;

		return $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
	}

?>