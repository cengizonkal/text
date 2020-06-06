<?php

class TextTest extends PHPUnit_Framework_TestCase
{
    public function test_line_read()
    {

        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals('1. Line',$text->readLine()->get());
        $this->assertEquals('2. Line',$text->clear()->readLine()->get());

    }

    public function test_read_lines()
    {

        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line\n4. Line\n5. Line",$text->readLines(5)->get());


    }

    public function test_read_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line",$text->readUntil('3. Line')->get());
    }
}