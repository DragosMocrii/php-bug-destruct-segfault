<?php

namespace Demo\Tests\Unit;

use Demo\ExampleOne;
use PHPUnit\Framework\TestCase;

class ExampleOneTest extends TestCase {
	public function testBug(): void {
		$exampleMock = $this->createMock( ExampleOne::class );
		/**
		 * The line above with cause the segmentation fault.
		 * The reason is using a method that returns a self-reference inside the __destruct magic method.
		 */
		$this->assertInstanceOf( ExampleOne::class, $exampleMock );
	}
}
