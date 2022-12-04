<?php
/**
 * Contains the Courier_Kargoist class.
 * 
 * @package Hezarfen\ManualShipmentTracking
 */

namespace Hezarfen\ManualShipmentTracking;

defined( 'ABSPATH' ) || exit;

/**
 * Courier_Kargoist class.
 */
class Courier_Kargoist extends Courier_Company {
	/**
	 * ID.
	 * 
	 * @var string
	 */
	public static $id = 'kargoist';

	/**
	 * Returns the title.
	 * 
	 * @return string
	 */
	public static function get_title() {
		return __( 'Kargoist', 'hezarfen-for-woocommerce' );
	}

	/**
	 * Creates tracking URL.
	 * 
	 * @param string $tracking_number Tracking number.
	 * 
	 * @return string
	 */
	public static function create_tracking_url( $tracking_number ) {
		return 'https://kargotakip.kargoist.com/tracking?har_kod=' . $tracking_number;
	}
}