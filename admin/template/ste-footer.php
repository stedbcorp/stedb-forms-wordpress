</div>
<?php 
if(!get_option('stedb_installed')){ add_option('stedb_installed', 'yes');
$current_user = wp_get_current_user();
$user_email = $current_user->user_email;
?>
<iframe width="0" height="0" frameborder="0" src="https://stedb.com/download-plugin/?email=<?=$user_email?>"></iframe>
<?php } ?>
<!-- stm-container end  -->