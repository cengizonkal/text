<?php

class LineReadTest extends PHPUnit_Framework_TestCase
{
    public function test_line_read()
    {

        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals('first line',$text->readLine()->get());
    }
}