This repository is to be used to reproduce the segmentation fault error when running a PHPUnit test under certain conditions.

There are two tests in this repo, one should document the failing case (ExampleOneTest), and the other one documents the variations that can be used to prevent the error (ExampleTwoTest). 

To run the tests:
```bash
# First install the dependencies
composer install

# Then run the tests
php ./vendor/bin/phpunit
```

The conditions to reproduce the error are:
- The unit test creates a mock object of a class `A`;
- The class A contains a __destruct method;
- The `__destruct` method calls a method `myMethod`;
- `myMethod` is both public, and the return type is `self`;

```php
class Example {
    public function myMethod(): self {
        return $this;
    }
    
    public function __destruct() {
        $this->myMethod();
    }
}
```

How is this affecting me?
- The test runner will fail when the segmentation fault occurs, and no further tests are run;
- If running tests in isolation, the affected test will take a few seconds to run before failing;

How to temporarily overcome this:
- Do not use public methods with a `self` return type belonging to the same object in the `__destruct` method.
- Encapsulate the destruct logic in a private method.
