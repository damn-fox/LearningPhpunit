<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

class Builder
{
    public $identifier;
    public $contentType;
    public $field;
    public $fields = [];


    public function identifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function contentType($nameSchema, $names, $descriptions)
    {
        $this->contentType = [
            'mainLanguageCode' => 'ita-IT',
            'remoteId' => sha1($names.time()),
            'urlAliasSchema' => '',
            'nameSchema' => $nameSchema,
            'names' => ['ita-IT' => $names],
            'descriptions' => ['ita-IT' => $descriptions],
            'group' => 'Content',
            'isContainer' => true
        ];
        return $this;
    }


    public function field($title, $identifier, $type, $names, $descriptions, $position, $isTranslatable, $isRequired, $isInfoCollector, $validator, $isSearchable)
    {
        $this->field = array(
            $title => [
                'identifier' => $identifier,
                'type' => $type,
                'names' => ['ita-IT' => $names],
                'descriptions' => ['ita-IT' => $descriptions],
                'fieldGroup' => '',
                'position' => $position,
                'isTranslatable' => $isTranslatable,
                'isRequired' => $isRequired,
                'isInfoCollector' => $isInfoCollector,
                'validatorConfiguration' => $validator,
            'fieldSettings' => [],
            'isSearchable' => $isSearchable,
        ]);
        array_push($this->fields, $this->field) ;
        return $this;
    }


    public function build()
    {
        return new ContentType($this->identifier,$this->contentType,$this->fields);
    }



}
