<?php

namespace Conkal;

use Closure;

class Text
{

    private $fp;
    private $path;
    private $buffer;


    public static function read($path)
    {
        return new self($path);
    }

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function open()
    {
        $this->fp = fopen($this->path, 'r');
        return $this;
    }

    public function close()
    {
        fclose($this->fp);
    }

    public function readLine()
    {
        $this->buffer = trim(fgets($this->fp));
        return $this;
    }

    public function get()
    {
        return $this->buffer;
    }


}