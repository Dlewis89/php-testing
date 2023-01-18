<?php
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new App\Item;

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInteger()
    {
        $item = new App\ItemChild;

        $this->assertIsInt($item->getID());
    }

    /**
     * private class method are not accessible to test via origial class or child classes.
     * Can use Reflect to access private properties and functions of a class if needed.
     * In most cases private function are internal to class or used by other public functions
     * of the class and should be tested through those public functions.
     */
    public function testTokenIsAString()
    {
        $item = new App\Item;

        $reflector = new ReflectionClass(App\Item::class);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new App\Item;

        $reflector = new ReflectionClass(App\Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);


    }
}