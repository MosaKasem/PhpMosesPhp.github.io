<?php

namespace model;

class FileLoaderModel
{
    private $file;
    function __construct(array $file)
    {
        $this->file = $file;
    }
}