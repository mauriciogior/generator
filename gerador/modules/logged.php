<!--[if IE]>
<DIV id="logged_title"><BR /><FONT size="3"><?=$LN["ieerr"]?></FONT><BR />&nbsp;</DIV>
<![endif]-->
<DIV id="logged_title"><BR /><FONT size="3"><?=$LN["signinm1"]?></FONT><BR />&nbsp;</DIV>
<?php
$result = $db->dbconsultspec("userimgs","id",$id,"a");

if($result == -1){
	echo $LN["signinm2"];
}
else {
	?>
	<script>
	function newc(){
		$('#create').submit();
		window.open("../gerador/form.php","Ratting","width=710,height=400,scrollbar=no,resizable=no,toolbar=no,titlebar=no,status=no,menubar=no,location=no",false);
	}
	function edit(img_id){
		xposition=0; yposition=0;
		if ((parseInt(navigator.appVersion) >= 4 )){
			xposition = (screen.width - "720");
			yposition = "0";
		}
		window.open("../gerador/form.php?img_id="+img_id,"Ratting","width=710,height=650,scrollbar=no,resizable=no,screenx="+xposition+",screeny="+yposition+",toolbar=no,titlebar=no,status=no,menubar=no,location=no",false)
	}
	function down(id,token,name){
		window.open("../gerador/render.php?id="+id+"&accesskey="+token+"&name="+name+"","Ratting","width=245,height=120,scrollbar=no,resizable=no,toolbar=no,titlebar=no,status=no,menubar=no,location=no",false);
	}
    </script>
    <TABLE width="95%" bgcolor="#322E24">
    	<TR>
        	<TD><?=$LN["signinm3"]?></TD>
            <TD><?=$LN["signinm4"]?></TD>
        </TR>
    <?php
	for($i=0;$i<$db->dbcount();$i++){
		if($i%2==0){
	?>
		<TR valign="middle">
			<TD bgcolor="#3E392C" width="45%"><?=$result["name"]?></TD>
			<TD bgcolor="#453F31" width="55%">
            	<TABLE>
                <TR><TD>
            	<A href='../gerador/generator.php?id=<?=$result["img_id"]?>&accesskey=<?=$result["token"]?>' target='_blank'>
            	<IMG title='View' width='130px' src='../gerador/generator.php?id=<?=$result["img_id"]?>&p=t&accesskey=<?=$result["token"]?>' />
                </A>
                </TD><TD valign="top">
                <A href='index.php?edit=1&img_id=<?=$result["img_id"]?>&key=<?=$result["token"]?>'>
                <IMG title='Edit' onclick="edit(<?=$result["img_id"]?>)" style='margin-top:15px' src='../gerador/template/images/edit-icon.svg' /></A>
                <A href='index.php?d=1&img_id=<?=$result["img_id"]?>'>
                <IMG title='Delete' style='margin-left:0px;margin-top:15px' src='../gerador/template/images/del-icon.svg' />
                </A>
                <IMG id='<?=$i?>' onclick='geturl("?id=<?=$result["img_id"]?>&accesskey=<?=$result["token"]?>","<?=$i?>")' style='position:absolute;margin-top:0px' src='../gerador/template/images/url-icon.svg' />
                <IMG title='Download' onclick="down('<?=$result["img_id"]?>','<?=$result["token"]?>','<?=$result["name"]?>')" style='margin-left:64px;margin-top:0px;cursor:pointer;' src='../gerador/template/images/down-icon.svg' />
                </TD></TR>
                </TABLE>
            </TD>
    <?php
		}else {
	?>
		<TR valign="middle">
			<TD bgcolor="#453F31"><?=$result["name"]?></TD>
			<TD bgcolor="#3E392C">
            	<TABLE>
                <TR><TD>
            	<A href='../gerador/generator.php?id=<?=$result["img_id"]?>&accesskey=<?=$result["token"]?>' target='_blank'>
            	<IMG title='View' width='130px' src='../gerador/generator.php?id=<?=$result["img_id"]?>&p=t&accesskey=<?=$result["token"]?>' />
                </A>
                </TD><TD valign="top">
                <A href='index.php?edit=1&img_id=<?=$result["img_id"]?>&key=<?=$result["token"]?>'>
                <IMG title='Edit' onclick="edit(<?=$result["img_id"]?>)" style='margin-top:15px' src='../gerador/template/images/edit-icon.svg' /></A>
                <A href='index.php?d=1&img_id=<?=$result["img_id"]?>'>
                <IMG title='Delete' style='margin-left:0px;margin-top:15px' src='../gerador/template/images/del-icon.svg' />
                </A>
                <IMG id='<?=$i?>' onclick='geturl("?id=<?=$result["img_id"]?>&accesskey=<?=$result["token"]?>","<?=$i?>")' style='position:absolute;margin-top:0px' src='../gerador/template/images/url-icon.svg' />
                <IMG title='Download' onclick="down('<?=$result["img_id"]?>','<?=$result["token"]?>','<?=$result["name"]?>')" style='margin-left:64px;margin-top:0px;cursor:pointer;' src='../gerador/template/images/down-icon.svg' />
                </TD></TR>
                </TABLE>
            </TD>
    <?php
		}
		$result = $db->dbconsultnext();
	}
	
}
	?>
    </TABLE>
    <DIV style="margin-top:20px">
    <FORM id="create" action="<?=$PHP_SELF?>" method="POST">
    	<SPAN onclick="newc();" style="cursor:pointer;">
        <?=$LN["signinm5"]?>
        </SPAN>
    	<INPUT type="hidden" name="create"/>
    </FORM>
    </DIV>
