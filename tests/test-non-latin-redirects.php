<?php

class WpcomLegacyNonLatinRedirectsTest extends WP_UnitTestCase {

	/**
	 * Makes sure the foundational stuff is sorted so tests work
	 */
	function setup() {

		// We need to trick the plugin into thinking it's run by WP-CLI
		if ( ! defined( 'WP_CLI' ) ) {
			define( 'WP_CLI', true );
		}

		// We need to trick the plugin into thinking we're in admin
		if ( ! defined( 'WP_ADMIN' ) ) {
			define( 'WP_ADMIN', true );
		}

	}

	/**
	 * Make sure redirects are added
	 */
	function test_insert_nonlatin_redirect() {

		self::setup();

		// Set our from/to URLs
		$from = '/JP納豆'; // example from https://www.w3.org/International/articles/idn-and-iri/
		$to = 'http://example.com';

		$redirect = WPCOM_Legacy_Redirector::insert_legacy_redirect( $from, $to );

		$this->assertTrue( $redirect );

	}

	/**
	 * Make sure redirects are stored
	 */
	function test_get_nonlatin_redirect() {

		self::setup();

		$from = '/JP納豆';
		$to = 'http://example.com';

		$redirect = WPCOM_Legacy_Redirector::get_redirect_uri( $from );

		$this->assertEquals( $redirect, $to );

	}


}

