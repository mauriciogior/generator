<?php
	$logoutUrl = $facebook->getLogoutUrl(array(
    'next'=>'http://repgatopreto.sytes.net:90/gerador/index.php?logout=yes'
));
?>
<DIV id="logout">
		<A href="index.php?logout=yes"><INPUT type="submit" value="<?=$LN["signoutb"]?>"/></A>
</DIV>
