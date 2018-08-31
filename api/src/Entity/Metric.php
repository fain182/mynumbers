<?php

namespace App\Entity;

use Ramsey\Uuid\Uuid;

class Metric implements \JsonSerializable
{
    private $id;
    private $name;
    private $url;
    private $selector;

    public function __construct($name, $url, $selector)
    {
        if (empty($name)) {
            throw new InvalidEntityException("Name is required");
        }
        if (empty($url)) {
            throw new InvalidEntityException("Url is required");
        }
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new InvalidEntityException("Url is invalid");
        }
        if (empty($selector)) {
            throw new InvalidEntityException("Selector is required");
        }

        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->url = $url;
        $this->selector = $selector;
    }

    public function jsonSerialize()
    {
        return ['id' => $this->id, 'name' => $this->name, 'url' => $this->url, 'selector' => $this->selector];
    }
}
