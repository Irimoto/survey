<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-eqiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>
	<body>
		<?php
			$dsn = 'mysql:dbname=phpkiso;host=localhost';
			$user = 'root';
			$password = '';
			$dbh = new PDO($dsn,$user,$password);
			$dbh->query('SET NAMES utf8');

			$nickname=htmlspecialchars($_POST['nickname']);
			$email=htmlspecialchars($_POST['email']);
			$goiken=htmlspecialchars($_POST['goiken']);
			echo $nickname;
			echo '様';
			echo '<br />';
			echo 'ご意見ありがとうございました<br />';
			echo '頂いたご意見『';
			echo $goiken;
			echo '』<br />';
			echo $email;
			echo 'にメールを送りましたのでご確認ください。';

			$sql ='INSERT INTO `survey` (`nickname`,`email`,`goiken`)VALUES("'.$nickname.'","'.$email.'","'.$goiken.'")';
			var_dump($sql);
			$stmt = $dbh->prepare($sql);
			//insert文を実行
			$stmt->execute();

			//データベースから切断
			$dbh = null;
		?>
		ご意見ありがとうございました。
	</body>
</html>