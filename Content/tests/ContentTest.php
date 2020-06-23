<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\BuilderContent;

use PHPUnit\Framework\TestCase;

final class ContentTest extends TestCase
{
    /**
     * @test
     */
    public function CreateValidBuilderContentInstance(): void
    {
        $this->assertInstanceOf(
            BuilderContent::class,
            new BuilderContent()
        );
    }

    /**
     * @test
     */
    public function CheckValidContent(): void
    {
        $array = [
            'identifier' => 'folder',
            'content' => [
                'language' => 'ita-IT',
                'remoteId' => 'webinar',
                'location' => 2,
            ],
            'fields' => [
                'name' => 'Webinar',
            ],
        ];

        $field = [
            'name' => 'Webinar',
        ];

        $builder = new BuilderContent();
        $builder->identifier('folder')
            ->content('ita-IT', 'webinar', 2)
            ->fields($field);
        $type = $builder->build();

        $this->assertEquals($array, $type->getResult());
    }
}
