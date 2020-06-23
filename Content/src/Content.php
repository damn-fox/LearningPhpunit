<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

class Content
{
    private $identifier;
    private $content;
    private $fields;

    public function __construct($identifier, $content, $fields)
    {
        $this->identifier = $identifier;
        $this->content = $content;
        $this->fields = $fields;
    }

    public function getResult(): array
    {
        return [
            'identifier' => $this->identifier,
            'content' => $this->content,
            'fields' => $this->fields,
        ];
    }
}
