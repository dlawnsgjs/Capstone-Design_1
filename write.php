<?
//세션사용
session_start();

//로그인 여부 확인
if( !$_SEAAION['userid'] ) 
{
	//로그인되지 않았을 경우 로그인 페이지로 이동
	//로근인 후 현재 페이지로 돌아오기 위해 현재 페이지의 경로를
	//get으로 넘겨준다. 현재 페이지의경로는 시스템변수
	//$_SEAAION['PHP_SELF']로 얻어올 수 있다.
		echo "<script>document.location.href='login.php?url={$_SERVER['PHP_SELF']}';</script>";
		exit(0);
}

//로그인 사용자의 경우 글쓰기 폼을 로드한다.
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<script>
function check()
{
	var frm = document.write;
	if( frm.title.value == "" )
	{
		alert("제목을 입력하세요.");
		frm.title.focus();
		return false;
	}

	if( frm.content.valuev == "" )
	{
		alert("내용을 입력하세요.");
		frm.content.focus();
		return false;
	}

	return true;
}
</script>
</head>
<body>
<center>
<h2>글쓰기</h2>
<form name="write" action="write_proc.php" method="post" onsubmit="return check();">
<table>
<tr>
	<td bgcolor="#99CCFF" width="100">아이디</td>
	<td><input type="text" name="userid" value="<?=$_SESSION['userid']?>" redonly style="width:100px"></td>
</tr>
<tr>
	<td bgcolor="#99CCFF">제 목</td>
	<td><input type="text" name="title" value="" style="width:500px"></td>
</tr>
<tr>
	<td bgcolor="#99CCFF">내용</td>
	<td><textarea name="content" value="" style="width:500px" rows="20"></textarea></td>
</tr>
<tr>
	<td colspan="2" height="40" valign="middle" align="center">
	<input type="submit" value="등 록">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" value="취 소" onclick="document.location.href='list.php';">
	</td>
</tr>
</table>
</form>
</conter>
</body>
</html>
