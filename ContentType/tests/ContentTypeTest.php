<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\Builder;

use PHPUnit\Framework\TestCase;

final class ContentTypeTest extends TestCase
{
    /**
     * @test
     */
    public function CreateValidBuilderInstance(): void
    {
        $this->assertInstanceOf(
            Builder::class,
            new Builder()
        );
    }

    /**
     * @test
     */
    public function CreateValidContentTypeInstance(): void
    {
        $array = [
            'identifier' => 'webinar',
           'contentType' => [
        'mainLanguageCode' => 'ita-IT',
        'remoteId' => \sha1('Webinar'.\time()),
        'urlAliasSchema' => '',
        'nameSchema' => '<titolo>',
        'names' => ['ita-IT' => 'Webinar'],
        'descriptions' => ['ita-IT' => 'Webinar'],
        'group' => 'Content',
        'isContainer' => true,
    ],
           'fields' => [
        'titolo' => [
            'identifier' => 'titolo',
            'type' => 'ezstring',
            'names' => ['ita-IT' => 'Titolo'],
            'descriptions' => ['ita-IT' => 'Titolo del webinar'],
            'fieldGroup' => '',
            'position' => 1,
            'isTranslatable' => true,
            'isRequired' => true,
            'isInfoCollector' => false,
            'validatorConfiguration' => [
                'StringLengthValidator' => [
                    'minStringLength' => 0,
                    'maxStringLength' => 0,
                ],
            ],
            'fieldSettings' => [],
            'isSearchable' => true,
        ],
            'intro' => [
                'identifier' => 'intro',
                'type' => 'ezxmltext',
                'names' => ['ita-IT' => 'Introduzione'],
                'descriptions' => ['ita-IT' => 'Introduzione, viene mostrato nella lista dei webinar'],
                'fieldGroup' => '',
                'position' => 2,
                'isTranslatable' => true,
                'isRequired' => false,
                'isInfoCollector' => false,
                'validatorConfiguration' => [],
                'fieldSettings' => [],
                'isSearchable' => true,
            ],
    ], ];

        $validator = [
            'StringLengthValidator' => [
                'minStringLength' => 0,
                'maxStringLength' => 0,
            ],
            ];

        $validator2 = [];

        $builder = new Builder();
        $builder->identifier('webinar')
                ->contentType('<titolo>', 'Webinar', 'Webinar')
                ->field('titolo', 'titolo', 'ezstring', 'Titolo', 'Titolo del webinar', 1, true, true, false, $validator, true)
                ->field('intro', 'intro', 'ezxmltext', 'Introduzione', 'Introduzione, viene mostrato nella lista dei webinar', 2, true, false, false, $validator2, true);
        $type = $builder->build();
        \print_r($type->getResult());
        $this->assertEquals($array, $type->getResult());
    }
}
