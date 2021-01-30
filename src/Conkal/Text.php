<?php

namespace Conkal;

use Closure;

class Text
{

    private $fp;
    private $path;
    private $buffer = '';
    private $locations = [];


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
        $this->fp = fopen($this->path, 'rt');
        return $this;
    }

    public function close()
    {
        fclose($this->fp);
        return $this;
    }

    public function line()
    {
        $this->buffer .= fgets($this->fp);
        return $this;
    }

    public function lines($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->line();
        }
        return $this;
    }

    public function clear()
    {
        $this->buffer = '';
        return $this;
    }

    public function get()
    {
        return $this->buffer;
    }

    public function save($filename)
    {
        file_put_contents($filename, $this->buffer);
    }

    public function until($search)
    {
        $begin = ftell($this->fp);
        $this->seek($search);
        $end = ftell($this->fp);
        fseek($this->fp, $begin);
        $this->buffer .= fread($this->fp, $end - $begin);
        return $this;
    }

    public function trim()
    {
        $this->buffer = trim($this->buffer);
        return $this;
    }

    public function char()
    {
        if (false !== ($char = fgetc($this->fp))) {
            $this->buffer .= $char;
        }
        return $this;
    }

    public function chars($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->char();
        }
        return $this;
    }

    public function beginning()
    {
        fseek($this->fp, 0);
        return $this;
    }

    public function seek($search)
    {
        $buffer = [];

        while (false !== ($char = fgetc($this->fp))) {
            array_push($buffer, $char);
            if (sizeof($buffer) > strlen($search)) {
                array_shift($buffer);
            }
            if (implode($buffer) === $search) {
                break;
            }
        }
        return $this;
    }

    public function remember()
    {
        array_push($this->locations, ftell($this->fp));
        return $this;
    }

    public function end()
    {
        fseek($this->fp, 0, SEEK_END);
        return $this;
    }

    public function recall()
    {
        $location = array_pop($this->locations);
        fseek($this->fp, $location);
        return $this;
    }

    public function pick()
    {
        $end = ftell($this->fp);
        $location = array_pop($this->locations);
        fseek($this->fp, $location);
        $this->buffer .= fread($this->fp, $end - $location);
        return $this;
    }


}