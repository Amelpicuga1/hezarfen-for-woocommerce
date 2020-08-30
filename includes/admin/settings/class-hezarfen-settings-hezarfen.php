<?php
/**
 * Hezarfen Settings Tab
 *
 */

defined( 'ABSPATH' ) || exit;

if( class_exists( 'Hezarfen_Settings_Hezarfen', false ) )
	return new Hezarfen_Settings_Hezarfen();

class Hezarfen_Settings_Hezarfen extends WC_Settings_Page {


	/**
	 * Hezarfen_Settings_Hezarfen constructor.
	 */
	public function __construct()
	{

		$this->id = 'hezarfen';
		$this->label = 'Hezarfen';

		parent::__construct();

	}


	/**
	 * Get sections
	 *
	 * @return array
	 */
	public function get_sections()
	{
		$sections = array(
			'general' => __( 'General', 'hezarfen-for-woocommerce' ),
			'mahalle_io'  =>  'mahalle.io'
		);

		return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
	}


	/**
	 * Get setting fields.
	 *
	 * @param string $current_section
	 * @return mixed
	 */
	public function get_settings( $current_section = '' )
	{


		if( 'mahalle_io' == $current_section )
		{

			$settings = apply_filters( 'hezarfen_mahalle_io_settings', array(

				array(

					'title' => __( 'mahalle.io Settings', 'hezarfen-for-woocommerce' ),
					'type' => 'title',
					'desc' => 'mahalle.io is a optional and paid service for show Turkey neighbors in checkout page.',
					'id' => 'hezarfen_mahalleio_options'

				),

				array(

					'title' => __( 'API Key', 'hezarfen-for-woocommerce' ),
					'type' => 'text',
					'desc' => 'API key may be created on mahalle.io my account page',
					'id' => 'hezarfen_mahalle_io_api_key'

				),

				array(
					'type' => 'sectionend',
					'id' => 'hezarfen_mahalleio_options'
				)

			) );

		}else{


			// section 1
			$settings = apply_filters( 'hezarfen_general_settings', array() );


		}

		return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );

	}

	/**
	 * Output the settings
	 *
	 * @since 1.0
	 */
	public function output() {

		global $current_section;

		$settings = $this->get_settings( $current_section );
		WC_Admin_Settings::output_fields( $settings );
	}

	public function save(){

		global $current_section;

		$settings = $this->get_settings( $current_section );
		WC_Admin_Settings::save_fields( $settings );

	}

}

return new Hezarfen_Settings_Hezarfen();