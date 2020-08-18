<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://stedb.com
 * @since      1.0.0
 *
 * @package    Ste_form_data
 * @subpackage Ste_form_data/template
 */
function stedb_table() {
	global $wpdb;
	$table = $wpdb->get_results( 'SELECT * FROM stedb_form_builder_data' );
	if ( ! class_exists( 'WP_List_Table' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
	}
}
	/**
	 * [Ste_form_data]
	 * html template for listing
	 */
class Stedb_Form_Data extends WP_List_Table {
	/**
	 * [ste_plugin_notification description]
	 * HTML template for the plugin notification
	 */
	public function __construct() {
		global $status, $page;
		parent::__construct(
			array(
				'singular' => 'stedb',
				'plural'   => 'stedbs',
			)
		);
	}
	/**
	 * [column_default]
	 * HTML template to column default

	 * @return $item
	 * @param item             $item getting item.
	 * @param column_form_name $column_form_name getting column_form_name.
	 */
	public function column_default( $item, $column_form_name ) {
		return $item[ $column_form_name ];
	}

	/**
	 * [column name form edit]
	 * HTML template for column name

	 * @param item $item getting item.
	 */
	public function column_form_name( $item ) {
		$actions = array(
			'edit' => sprintf( '<a href="?page=ste-form-builder&action=form_creation_div&id=%s">%s</a>', $item['form_id'], __( 'Edit', 'ste-social-form-builder' ) ),
		);

		return sprintf(
			'%s %s',
			$item['form_name'],
			$this->row_actions( $actions )
		);
	}
	/**
	 * [column cb form checkbox]
	 * HTML template for check box

	 * @param item $item getting item.
	 */
	public function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="id[]" value="%s" />',
			$item['form_id']
		);
	}
	/**
	 * [column cb form checkbox]
	 * HTML template for check box
	 */
	public function get_columns() {
		$columns = array(
			'cb'            => '<input type="checkbox" />',
			'form_name'     => __( 'Form Name', 'ste-social-form-builder' ),
			'creation_date' => __( 'Creation Date', 'ste-social-form-builder' ),
			'shortcode'     => __( 'Shortcode', 'ste-social-form-builder' ),
		);
		return $columns;
	}
	/**
	 * [sortable form sorting]
	 * HTML template for sorting
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'form_name'     => array( 'form_name', true ),
			'creation_date' => array( 'creation_date', true ),
			'shortcode'     => array( 'shortcode', true ),

		);
		return $sortable_columns;
	}
	/**
	 * [prepare item form]
	 * HTML template for prepare item
	 */
	public function prepare_items() {
		global $wpdb;
		$args     = wp_unslash( $_REQUEST );
		$table    = $wpdb->get_results( 'SELECT * FROM stedb_form_builder_data' );
		$sql =  'SELECT * FROM stedb_form_builder_data';
		$per_page = 20;
		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();

		$this->_column_headers = array( $columns, $hidden, $sortable );

		$this->process_bulk_action();
		$total_items = $wpdb->get_var( 'SELECT COUNT(form_id) FROM stedb_form_builder_data' );
		$paged       = isset( $args['paged'] ) ? ( $per_page * max( 0, intval( $args['paged'] ) - 1 ) ) : 0;
		$orderby     = ( isset( $args['orderby'] ) && in_array( $args['orderby'], array_keys( $this->get_sortable_columns() ) ) ) ? $args['orderby'] : 'form_name';
		$order       = ( isset( $args['order'] ) && in_array( $args['order'], array( 'asc', 'desc' ) ) ) ? $args['order'] : 'asc';


		
		if ( ! empty( $_REQUEST['orderby'] ) ) {
            $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
            $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
        }

		$sql .= " LIMIT $per_page";
		if(! empty($_REQUEST['paged'])){

			$sql .= ' OFFSET ' . ( $_REQUEST['paged'] - 1 ) * $per_page;
		}
		

		$this->items = $wpdb->get_results( $sql, ARRAY_A );
		$this->set_pagination_args(
			array(
				'total_items' => $total_items,
				'per_page'    => $per_page,
				'total_pages' => ceil( $total_items / $per_page ),
			)
		);
	}
}
	/**
	 * [Render form data form]
	 * HTML template for show data
	 */
function stedb_page_form_data() {
	global $wpdb;
	$args  = wp_unslash( $_REQUEST );
	$table = new Stedb_Form_Data();
	$table->prepare_items();
	?>
	<div class="wrap">
		<div class="icon32 icon32-posts-post" id="icon-edit" ><br></div>
		<h2><?php esc_html_e( 'STEdb Form', 'stedb_table' ); ?> <a class="add-new-h2" href="<?php echo ( esc_html_e( get_admin_url( get_current_blog_id(), 'admin.php?page=ste-form-builder' ) ) ); ?>"><?php esc_html_e( 'Add new', 'stedb_table' ); ?></a>
	</h2>
		<form id="stedb-table" method="GET" >
			<input type = "hidden" name="page" value="<?php echo esc_html_e( $args['page'] ); ?>"/>
			<?php $table->display(); ?>
		</form>
	</div>
	<?php
}
	stedb_page_form_data();
?>
