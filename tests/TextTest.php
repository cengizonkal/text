<?php

class TextTest extends PHPUnit_Framework_TestCase
{
    public function test_line_read()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals('1. Line', $text->line()->trim()->get());
        $this->assertEquals('2. Line', $text->clear()->line()->trim()->get());
    }

    public function test_read_lines()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line\n4. Line\n5. Line", $text->lines(5)->trim()->close()->get());
    }

    public function test_read_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. Line\n2. Line\n3. Line", $text->until('3. Line')->get());
    }

    public function test_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals(" Line\n", $text->until('81.')->clear()->line()->close()->get());
    }

    public function test_read_char()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1.", $text->char()->char()->get());
        $this->assertEquals("1. ", $text->char()->get());
    }

    public function test_read_chars()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $this->assertEquals("1. L", $text->chars(4)->close()->get());
    }

    public function test_create_file()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $text->open();
        $text->line()->close()->trim()->save('tests/line.txt');
        $line = \Conkal\Text::read('tests/line.txt');
        $this->assertEquals("1. Line",$line->open()->chars(100)->get());
        unlink('tests/line.txt');

    }
}