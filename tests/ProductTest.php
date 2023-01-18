<?php
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIdIsAnInteger()
    {
        $product = new App\Product;

        $reflector = new ReflectionClass(App\Product::class);

        $property = $reflector->getProperty("product_id");

        $property->setAccessible(true);
        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}