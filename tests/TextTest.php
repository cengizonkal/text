<?php

class TextTest extends PHPUnit_Framework_TestCase
{
    public function test_line_read()
    {

        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals('1. Line',$text->line()->trim()->get());
        $this->assertEquals('2. Line',$text->clear()->line()->trim()->get());

    }

    public function test_read_lines()
    {

        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line\n4. Line\n5. Line",$text->lines(5)->trim()->close()->get());


    }

    public function test_read_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line",$text->until('3. Line')->get());
    }

    public function test_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals(" Line\n",$text->until('81.')->clear()->line()->close()->get());
    }
}