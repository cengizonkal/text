<?php

namespace Conkal;

use Closure;

class Text
{

    private $fp;
    private $path;
    private $buffer = '';


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

    public function until($search)
    {
        $buffer = [];
        $begin = ftell($this->fp);
        while (false !== ($char = fgetc($this->fp))) {
            array_push($buffer, $char);
            if (sizeof($buffer) > strlen($search)) {
                array_shift($buffer);
            }
            if (implode($buffer) === $search) {
                $end = ftell($this->fp);
                fseek($this->fp, $begin);
                $this->buffer .= fread($this->fp, $end);

                break;
            }
        }
        return $this;
    }

    public function trim()
    {
        $this->buffer = trim($this->buffer);
        return $this;
    }


}