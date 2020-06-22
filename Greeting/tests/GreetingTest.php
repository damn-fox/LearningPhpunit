<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\ArrayAdapter;
use Acme\Greeting;
use Acme\StringAdapter;
use PHPUnit\Framework\TestCase;

final class GreetingTest extends TestCase
{
    /**
     * @test
     */
    public function should_return_a_greet_given_a_name(): void
    {
        $greet = new Greeting(new StringAdapter('Nick'));

        $this->assertEquals('Hello, Nick', $greet->get());
    }

    /**
     * @test
     */
    public function should_return_a_stand_in_greet_given_a_null_name(): void
    {
        $greet = new Greeting(new StringAdapter(''));
        $this->assertEquals('Hello, my friend', $greet->get());
    }

    /**
     * @test
     */
    public function should_return_an_uppercase_greet_given_an_uppercase_name(): void
    {
        $greet = new Greeting(new StringAdapter('NICK'));
        $this->assertEquals('HELLO NICK', $greet->get());
    }

    /**
     *@test
     */
    public function should_return_a_greet_given_two_names(): void
    {
        $greet = new Greeting(new ArrayAdapter(['Jill', 'Jane']));
        $this->assertEquals('Hello, Jill and Jane', $greet->get());
    }

    /**
     * @test
     */
    public function should_return_a_greet_given_all_names(): void
    {
        $greet = new Greeting(new ArrayAdapter(['Jill', 'Jane', 'Jack', 'Nick', 'Jhon', 'Ernesto']));
        $this->assertEquals('Hello,Jill,Jane,Jack,Nick,Jhon and Ernesto', $greet->get());
    }

    /**
     * @test
     */
    public function should_return_a_mixed_greet_for_normal_and_shouted_names()
    {
        $greet = new Greeting(new ArrayAdapter(['Amy', 'BRIAN', 'Charlotte']));
        $this->assertEquals('Hello, Amy and Charlotte. AND HELLO BRIAN!', $greet->get());
    }
}
