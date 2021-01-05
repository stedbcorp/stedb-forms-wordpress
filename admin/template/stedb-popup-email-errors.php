<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    ste-popup
 * @subpackage  ste-popup/admin/template
 */

$args         = wp_unslash( $_GET );
$current_page = $args['page'];
$msg = $args['msg'];
$user         = wp_get_current_user();
$email        = $user->user_email;
?>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
                    <div class="modal-content p-4" style="width:100% !important">
                        <div class="modal-content" style="border:none;width:100% !important;margin-bottom: 5%;">
                        <h4 class="modal-title"><?php echo $err_msg; ?></h4>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
				</div>
				</div>

