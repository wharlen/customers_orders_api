<?php

namespace Tests\Unit;

use App\Repositories\CustomersRepository;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_query_bring_complete_name()
    {
        $customer = (new CustomersRepository())
            ->customerByNumberWithout(363, ['creditLimit']);
        $this->assertEquals('Steve Patterson', $customer->responsibleEmployee);
    }
}
