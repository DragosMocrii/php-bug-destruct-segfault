<?php

namespace Demo;

class ExampleOne {
	public function __construct() {
	}

	public function methodWithSelfReferenceReturn(): self {
		return $this;
	}

	public function __destruct() {
		$this->methodWithSelfReferenceReturn();
	}
}
