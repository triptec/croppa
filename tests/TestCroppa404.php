<?php

use Bkwld\Croppa\Croppa;

class Croppa404Test extends PHPUnit_Framework_TestCase {

	// Settings
	private $file = '/uploads/01/01/test.jpg';

	public function setUp() {
		
		// Pass along the Config data so Croppa is decoupled from Laravel
		Croppa::config(array(
			'max_crops' => 1,
			'host' => 'http://host.dev',
			'src_dirs' => array(__DIR__.'/files'),
		));

	}
	
	public function tearDown() {
		// unlink(realpath(__DIR__.'/files/uploads/01/01/test-200x300.jpg'));
	}

	public function testWidthAndHeight() {
		// $url = '/uploads/01/01/test-200x300.jpg';
		// $src = realpath(__DIR__.'/files'.$url);
		// Croppa::handle_404($url);
		// $this->assertFileExists($src);
	}

}
