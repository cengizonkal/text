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
        $this->fp = fopen($this->path, 'r');
        return $this;
    }

    public function close()
    {
        fclose($this->fp);
    }

    public function readLine()
    {
        $this->buffer .= fgets($this->fp);
        return $this;
    }

    public function readLines($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->readLine();
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
        return trim($this->buffer);
    }

    public function readUntil($search)
    {
        $buffer = [];
        $begin = ftell($this->fp);
        while (false !== ($char = fgetc($this->fp))) {
            array_push($buffer, $char);
            if (sizeof($buffer) > strlen($search)) {
                array_shift($buffer);
            }
            if (implode($buffer) == $search) {
                $end = ftell($this->fp);
                fseek($this->fp, $begin);
                $this->buffer .= fread($this->fp, $end);
                break;
            }
        }
        return $this;
    }


}