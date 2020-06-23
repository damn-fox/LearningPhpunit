<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

class BuilderContent
{
    public $identifier;
    public $content;
    public $fields;

    public function identifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function content($language, $remoteId, $location)
    {
        $this->content = [
            'language' => $language,
            'remoteId' => $remoteId,
            'location' => $location,
        ];

        return $this;
    }

    public function fields($field)
    {
        $this->fields = $field;

        return $this;
    }

    public function build()
    {
        return new Content($this->identifier, $this->content, $this->fields);
    }
}
