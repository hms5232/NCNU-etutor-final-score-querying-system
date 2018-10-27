<?php
require("dbconnect.php");
session_start();

$sid = $_POST['sid'];
$sid = mysqli_real_escape_string($conn,$sid);
$sql = "SELECT `level`, `sid` FROM `1062` WHERE `sid`='$sid'";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>數位學伴期末評分查詢系統</title>
</head>
<body>
<?php
if($result = mysqli_query($conn,$sql)){
	if ($row=mysqli_fetch_assoc($result)){
		if($row['sid'] == $sid){
			echo "您的學號：<b>".$sid."</b><br />";
			//查詢分數
			echo "查詢結果：";
			switch($row['level']){
				case 'A':
					echo"恭喜！您可以申請服務證明。繼續保持喔~";
					break;
				case 'B':
					echo"您的分數不錯，雖然好像差一點點>< 不過還是能申請服務證明~";
					break;
				case 'C':
					echo"您的分數有點危險......請找助理協助";
				default://包含D
					echo"請找助理協助";
					break;
			}
		}else{//學號正確但可能多打了空白
			//print error message
			echo "查無此學號，請不要增加空白等與學號無關之字元並重新輸入<br />";
		}
	}else{//查無此筆資料或多打了其他符號
		echo "這位同學好像不是上個學期的大學伴喔，或重新檢查是否輸入錯誤";
	}
	echo "<br />";
}else{//SQL出錯
	echo "有哪邊出現蟲子了，請重新查詢或找助理協助抓蟲<br />";
}
?>
<br />
<a href="index.php">回到查詢畫面</a>
</body>
</html>