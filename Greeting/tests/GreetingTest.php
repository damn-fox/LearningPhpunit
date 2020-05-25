<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\Greeting;

use PHPUnit\Framework\TestCase;

final class GreetingTest extends TestCase
{
    /**
     * @test
     */
    public function should_return_a_greet_given_a_name(): void
    {
        $greet = new Greeting();

        $this->assertEquals('Hello, Nick', $greet->greeting('Nick'));
    }

    /**
     * @test
     */
    public function should_return_a_stand_in_greet_given_a_null_name(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, my friend', $greet->greeting(''));
    }

    /**
     * @test
     */
    public function should_return_an_uppercase_greet_given_an_uppercase_name(): void
    {
        $greet = new Greeting();
        $this->assertEquals('HELLO NICK', $greet->greeting('NICK'));
    }

    /**
     *@test
     */
    public function should_return_a_greet_given_two_names(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Jill and Jane', $greet->greeting(['Jill', 'Jane']));
    }

    /**
     * @test
     */
    public function should_return_a_greet_given_all_names(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello,Jill,Jane,Jack and Nick', $greet->greeting(['Jill', 'Jane', 'Jack', 'Nick']));
        $this->assertEquals('Hello,Jill,Jane,Jack,Nick,Jhon and Ernesto', $greet->greeting(['Jill', 'Jane', 'Jack', 'Nick', 'Jhon', 'Ernesto']));
    }

    /**
     * @test
     */
    public function should_return_a_mixed_greet_for_normal_and_shouted_names()
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Amy and Charlotte. AND HELLO BRIAN!', $greet->greeting(['Amy', 'BRIAN', 'Charlotte']));
    }

    /**
     * @test
     */
    public function should_return_a_greet_whit_split_names()
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Marco, Rico, and Charlotte', $greet->greeting(['Marco', 'Rico,Charlotte']));
    }

    /**
     * @test
     */
    public function should_return_a_greet_escaping_intentional_commas()
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Bob and Charlie, Dianne.', $greet->greeting(['Bob', '"Charlie, Dianne"']));
    }
}
