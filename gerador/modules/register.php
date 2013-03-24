<?php
if($_POST["type"]=="r"){
	
	$email = $_POST["email"];
	$password = $_POST["password"];
		
	$result = $db->register($email,$password);

	if($result == 1){
		$_SESSION["email"] = $email;
		echo "<script>window.location='index.php';</script>";
	}
	
}
?>
<DIV id="register" class="left" onmouseover="light('register')">
	<DIV id="register_title"><B><?=$LN["signup"]?></B></DIV>
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
            	<TD><INPUT type="submit" value="<?=$LN["signupb"]?>"/></TD>
                <TD><INPUT type="hidden" name="type" value="r"/></TD>
            </TR>
        </TABLE>
	</FORM>
    <?php
	if($_POST["type"]=="r")
	switch ($result){
		case -1:
			echo $LN["signuperr1"];
			break;
		case -2:
			echo $LN["signuperr2"];
			break;
		case -3:
			echo $LN["signuperr3"];
			break;
	}
	?>
</DIV>
