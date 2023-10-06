<?php

namespace Demo;

class ExampleTwo {
	public function __construct() {
	}

	public function methodWithNoSelfReferenceReturn(): void {
		//noop
	}

	private function methodWithSelfReferenceReturnButPrivate(): self {
		return $this;
	}

	public function methodWithNoReturnType() {
		return $this;
	}

	public function methodWithStaticReferenceReturnType(): static {
		return $this;
	}

	public function __destruct() {
		$this->methodWithNoSelfReferenceReturn();
		$this->methodWithSelfReferenceReturnButPrivate();
		$this->methodWithSelfReferenceReturnButPrivateAndNoType();
		$this->methodWithNoReturnType();
		$this->methodWithStaticReferenceReturnType();
	}
}
