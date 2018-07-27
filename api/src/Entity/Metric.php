<?php


namespace App\Entity;


class Metric implements \JsonSerializable
{

    private $name;
    private $url;
    private $selector;

    public function __construct($name, $url, $selector)
    {
        $this->name = $name;
        $this->url = $url;
        $this->selector = $selector;
    }

    public function jsonSerialize()
    {
        return ['name' => $this->name, 'url' => $this->url, 'selector' => $this->selector];
    }

}