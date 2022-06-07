<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $number = 10;
        if ($number > 0) {
            $bool= true;
        }else{
            $bool= false;
        }

        $this->assertTrue($bool);
    }
}
