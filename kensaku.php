<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-eqiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
		<?php
		$code=$_POST['code'];

		$dsn = 'mysql:dbname=phpkiso;host=localhost';
		$user = 'root';
		$password='';
		$dbh = new PDO($dsn,$user,$password);
		$dbh->query('SET NAMES utf8');

		//sql文
		$sql='SELECT * FROM `survey` WHERE `code`=?';
		$data[]=$code;
		
		//sql文実行
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		//実行結果として得られたデータを表示
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		echo $rec['code'];
		echo ' ';
		echo $rec['nickname'];
		echo ' ';
		echo $rec['email'];
		echo ' ';
		echo $rec['goiken'];

		//DB接続を削除
		$dbh = null;

		?>
		
	</body>
</html>