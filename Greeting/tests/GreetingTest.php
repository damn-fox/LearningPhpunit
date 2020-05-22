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

        $this->assertEquals('Hello, Nick', $greet->greet('Nick'));
    }

    /**
     * @test
     */
    public function should_return_a_stand_in_greet_given_a_null_name(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, my friend', $greet->greet(''));
    }

    /**
     * @test
     */
    public function should_return_an_uppercase_greet_given_an_uppercase_name(): void
    {
        $greet = new Greeting();
        $this->assertEquals('HELLO NICK', $greet->greet('NICK'));
    }

    /**
     *@test
     */
    public function should_return_a_greet_given_two_names(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Jill and Jane', $greet->greetMany(['Jill', 'Jane']));
    }

    /**
     * @test
     */
    public function should_return_an_exception_given_a_malformed_array(): void
    {
        $greet = new Greeting();
        $this->expectException(\InvalidArgumentException::class);
        $greet->greetMany(['Jill']);
    }

    /**
     * @test
     */
    public function should_return_a_greet_given_all_names(): void
    {
        $greet = new Greeting();
        $this->assertEquals('Hello,Jill,Jane,Jack and Nick', $greet->greetAll(['Jill', 'Jane', 'Jack', 'Nick']));
        $this->assertEquals('Hello,Jill,Jane,Jack,Nick,Jhon and Ernesto', $greet->greetAll(['Jill', 'Jane', 'Jack', 'Nick', 'Jhon', 'Ernesto']));
    }

    /**
     * @test
     */
    public function should_return_an_exception_given_an_array_with_less_than_three_names(): void
    {
        $greet = new Greeting();
        $this->expectException(\InvalidArgumentException::class);
        $greet->greetAll(['Jill', 'Jane']);
    }

    /**
     * @test
     */
    public function should_return_a_mixed_greet_for_normal_and_shouted_names()
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Amy and Charlotte. AND HELLO BRIAN!', $greet->greedMixed(['Amy', 'BRIAN', 'Charlotte']));
    }

    /**
     * @test
     */
    public function should_return_an_exception_given_an_array_with_less_than_three_names_in_mixed_greed()
    {
        $greet = new Greeting();
        $this->expectException(\InvalidArgumentException::class);
        $greet->greedMixed(['Amy', 'BRIAN']);
    }

    /**
     * @test
     */
    public function should_return_an_exception_given_an_array_with_two_or_more_upper_names_in_mixed_greed()
    {
        $greet = new Greeting();
        $this->expectException(\InvalidArgumentException::class);
        $greet->greedMixed(['Amy', 'BRIAN', 'CICCIO']);
    }

    /**
     * @test
     */
    public function should_return_a_greed_whit_split_names()
    {
        $greet = new Greeting();
        $this->assertEquals('Hello, Marco, Rico, and Charlotte', $greet->greedNamesContainingComma(['Marco', 'Rico,Charlotte']));
    }

    /**
     * @test
     */
    public function should_return_an_exception_given_an_array_with_no_sorted_elements()
    {
        $greet = new Greeting();
        $this->expectException(\InvalidArgumentException::class);
        $greet->greedMixed(['Amy,Brian', 'Ciccio']);
    }
}
