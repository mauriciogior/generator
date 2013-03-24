<?php
if($_POST["type"]=="l"){
		
	$email = $_POST["email"];
	$password = $_POST["password"];
		
	$result = $db->login($email,$password);
	
	if($result == 1){
		if($password == "facebook")
			$result = -3;
		else {
			$_SESSION["email"] = $email;
			echo "<script>window.location='index.php';</script>";
		}
	}
}
?>
<DIV id="login" class="right" onmouseover="light('login')">
	<DIV id="login_title"><B><?=$LN["signin"]?></B></DIV>
	<FORM action="<?=$PHP_SELF?>" method="POST">
		<TABLE width="100%" bgcolor="#322E24">
        	<TR>
            	<TD bgcolor="#3E392C">E-mail:</TD>
                <TD bgcolor="#453F31"><INPUT type="text" name="email"/></TD>
            </TR>
            <TR>
            	<TD bgcolor="#453F31"><?=$LN["password"]?>:</TD>
                <TD bgcolor="#3E392C"><INPUT type="password" name="password"/></TD>
            </TR>
            <TR>
            	<TD><INPUT type="submit" value="<?=$LN["signinb"]?>"/></TD>
                <TD><INPUT type="hidden" name="type" value="l"/>
                	<A href="<?=$loginUrl?>"><IMG height="27px" style="margin-top:10px" src="template/images/fb-connect-large.png" /></A>
                </TD>
            </TR>
        </TABLE>
	</FORM>
    <?php
	if($_POST["type"]=="l")
		switch ($result){
			case -1:
				echo $LN["signinerr1"];
				break;
			case -2:
				echo $LN["signinerr1"];
				break;
			case -3:
				echo $LN["signinerr2"];
				break;
		}
	?>
</DIV>
