<?php

namespace Conkal;

use Closure;

class Text extends \SplFileObject
{
    private $buffer;

    public static function read($path)
    {
        return new self($path, 'rt');
    }

    public function line()
    {
        $this->buffer .= $this->fgets();
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
        $begin = $this->ftell();
        $this->find($search);
        $end = $this->ftell();
        $this->fseek($begin);
        $this->buffer .= $this->fread($end - $begin);
        return $this;
    }

    public function trim()
    {
        $this->buffer = trim($this->buffer);
        return $this;
    }

    public function char()
    {
        if (false !== ($char = $this->fgetc())) {
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
        $this->fseek(0);
        return $this;
    }

    public function find($search)
    {
        $buffer = [];

        while (false !== ($char = $this->fgetc())) {
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


    public function end()
    {
        $this->fseek(0, SEEK_END);
        return $this;
    }


    public function move($charLength)
    {
        $this->fseek($charLength, SEEK_CUR);
        return $this;
    }


}