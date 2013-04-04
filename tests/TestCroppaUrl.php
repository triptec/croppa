<?php

use Bkwld\Croppa\Croppa;

class CroppaUrlTest extends PHPUnit_Framework_TestCase {

	// Settings
	private $file = '/uploads/01/01/test.jpg';

	/**
	 * Run Croppa's bootstrap
	 */
	public function setUp() {
		
		// Pass along the Config data so Croppa is decoupled from Laravel
		Croppa::config(array(
			'max_crops' => 1,
			'host' => 'http://host.dev',
		));

	}

	public function testRequired() {
		$this->assertTrue(class_exists('Bkwld\Croppa\Croppa'));
	}

	public function testWidthAndHeight() {
		$url = Croppa::url($this->file, 300, 200);
		$this->assertEquals($url, 'http://host.dev/uploads/01/01/test-300x200.jpg');
	}
	
	public function testWidth() {
		$url = Croppa::url($this->file, 300);
		$this->assertEquals($url, 'http://host.dev/uploads/01/01/test-300x_.jpg');
	}
	
	public function testHeight() {
		$url = Croppa::url($this->file, null, 200);
		$this->assertEquals($url, 'http://host.dev/uploads/01/01/test-_x200.jpg');
	}

}
