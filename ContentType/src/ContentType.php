<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

class ContentType
{
    private $identifier;
    private $contentType;
    private $fields;


    public function __construct($identifier,$contentType, $fields)
    {
        $this->identifier = $identifier;
        $this->contentType = $contentType;
        $this->fields = $fields;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getContentType()
    {
        return $this->contentType;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getResult ()
    {
        return ['identifier'=> $this->identifier,
                'contentType'=> $this->contentType,
                'fields'=> $this->fields
                ];
    }

}
