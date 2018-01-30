<?php
if (($site_config["INVITEONLY"] || $site_config["ENABLEINVITES"]) && $CURUSER) {
	$invites = $CURUSER["invites"];
	$id = $CURUSER["id"];
	$invited = $CURUSER["invited_users"];
	
	begin_block(T_("INVITES"));
	?>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
        <td align="center">
        <?php printf(P_("YOU_HAVE_INVITES", $invites), $invites); ?>
		<?php printf(P_("YOU_INVITED",$invited), $invited); ?>
        </td>
    </tr>
	<?php if ($invites > 0 ){?>
	<tr>
        <td align="center">
        <a href="invite.php"><?php echo T_("SEND_AN_INVITE"); ?></a>
        </td>
    </tr>
	<?php } ?>
	</table>
	<?php
	end_block();
}
?>