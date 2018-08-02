<?php
/*
 Plugin Name: BEA Redirection
 Version: 1.0.2
 Plugin URI: https://www.beapi.fr
 Description: Force no monitor logs, 404, modified posts in Redirection plugin
 Author: BE API Technical team
 Author URI: https://www.beapi.fr
 Domain Path: languages

 ----

 Copyright 2017 Be API Technical team (human@beapi.fr)

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/**
 * Modify default datas on activation plugin
 *
 */
add_filter( 'red_default_options', function ( $args ) {
	return array(
		'support'         => false,
		'token'           => md5( uniqid() ),
		'monitor_post'    => 0,
		'auto_target'     => '',
		'expire_redirect' => - 1,
		'expire_404'      => - 1,
		'modules'         => array(),
		'newsletter'      => false,
		'ip_logging'      => isset( $args['ip_logging'] ) ? $args['ip_logging'] : 0,
		'rest_api'        => isset( $args['rest_api'] ) ? $args['rest_api'] : 0,
	);
} );

/**
 * Modify option value
 */
add_filter( 'option_redirection_options', function ( $value ) {
	if ( isset( $value['monitor_post'] ) ) {
		$value['monitor_post'] = 0;
	}

	if ( isset( $value['expire_redirect'] ) ) {
		$value['expire_redirect'] = -1;
	}

	if ( isset( $value['expire_404'] ) ) {
		$value['expire_404'] = -1;
	}

	return $value;
} );
