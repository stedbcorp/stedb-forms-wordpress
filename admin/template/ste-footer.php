</div>
<?php if(!get_option('stedb_installed')){ add_option('stedb_installed', 'yes'); ?>
<iframe width="0" height="0" frameborder="0" src="https://stedb.com/download-plugin/?email=<?=$user_email?>"></iframe>
<?php } ?>
<!-- stm-container end  -->