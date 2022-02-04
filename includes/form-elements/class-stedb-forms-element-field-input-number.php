<?php

/**
 * Class STEDB_Forms_Element_Field_Input_Text
 * input number field
 */
if ( ! class_exists( 'STEDB_Forms_Element_Field_Input_Number' ) ) {

	class STEDB_Forms_Element_Field_Input_Number extends STEDB_Forms_Element_Field_Base {

		/**
		 * get type
		 * @return string
		 */
		public function get_type() {
			return 'input_number';
		}

		/**
		 * get name
		 * @return string|void
		 */
		public function get_name() {
			return esc_html__( 'Number', 'stedb-forms' );
		}

		/**
		 * @return string
		 */
		public function get_icon() {
			return 'hashtag';
		}

		/**
		 * render field for admin
		 */
		public function admin_render() {
			?>
            <script type="text/html" id="tmpl-stedb-forms-admin-element-field-input_number-html">

                <div class="stedb-form-element-field" data-id="{{-data.fieldId}}" data-type="{{-data.fieldType}}">
					<?php echo $this->get_render_remove_button_html(); ?>

					<?php echo $this->get_render_type_input_html(); ?>

                    <div class="stedb-form-element-field-edit">
                        <input type="text"
                               name="stedb_form_elements[rows][{{-data.rowId}}][fields][{{-data.fieldId}}][values][label]"
                               class="stedb-form-element-field-input-label"
                               value="{{-data.values.label}}"
                               placeholder="<?php esc_attr_e( 'Enter input number label', 'stedb-forms' ); ?>"
                               aria-label="<?php esc_attr_e( 'Input number label', 'stedb-forms' ); ?>">
                    </div>
                </div>
            </script>
			<?php
		}

		/**
		 * render field
		 *
		 * @param $id
		 * @param $data
		 *
		 * @return false|string
		 */
		public function render( $id, $data ) {
			ob_start();
			?>

            <div class="stedb-forms-field stedb-forms-field-<?php echo esc_attr( $this->get_type() ); ?> stedb-forms-field-<?php echo esc_attr( $id ); ?>">
                <label for="stedb-forms-field-input-<?php echo esc_attr( $id ); ?>">
					<?php echo esc_html( $data['values']['label'] ); ?>
                </label>
                <input type="number" id="stedb-forms-field-input-<?php echo esc_attr( $id ); ?>"
                       class="stedb-forms-input-number" name="stedb_form[<?php echo esc_html( $data['name'] ); ?>]">
            </div>

			<?php
			$html = ob_get_clean();

			return $html;
		}
	}
}