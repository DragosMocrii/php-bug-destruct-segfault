<?php

namespace Demo\Tests\Unit;

use Demo\ExampleTwo;
use PHPUnit\Framework\TestCase;

class ExampleTwoTest extends TestCase {
	public function testNoBug(): void {
		$exampleMock = $this->createMock( ExampleTwo::class );

		$this->assertInstanceOf( ExampleTwo::class, $exampleMock );
	}
}
