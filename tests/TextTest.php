<?php

class TextTest extends PHPUnit\Framework\TestCase
{
    public function test_line_read()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals('1. Line', $text->line()->trim()->get());
    }

    public function test_read_lines()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals("1. Line\n2. Line\n3. Line\n4. Line\n5. Line", $text->lines(5)->trim()->get());
    }

//
    public function test_read_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals("1. Line\n2. Line\n3. Line", $text->until('3. Line')->get());
        $this->assertEquals("2. Line\n3. Line", $text->beginning()->clear()->line()->clear()->until('3. Line')->get());
    }

    public function test_until()
    {
        $text = \Conkal\Text::read('tests/test.txt');

        $this->assertEquals(" Line\n", $text->until('81.')->clear()->line()->get());
    }

    public function test_read_char()
    {
        $text = \Conkal\Text::read('tests/test.txt');

        $this->assertEquals("1.", $text->char()->char()->get());
        $this->assertEquals("1. ", $text->char()->get());
    }

    public function test_read_chars()
    {
        $text = \Conkal\Text::read('tests/test.txt');

        $this->assertEquals("1. L", $text->chars(4)->get());
    }

    public function test_create_file()
    {
        $text = \Conkal\Text::read('tests/test.txt');

        $text->line()->trim()->save('tests/line.txt');
        $line = \Conkal\Text::read('tests/line.txt');
        $this->assertEquals("1. Line", $line->chars(100)->get());
        unlink('tests/line.txt');
    }

    public function test_beginning()
    {
        $text = \Conkal\Text::read('tests/test.txt');

        $this->assertEquals("1.", $text->line()->beginning()->clear()->chars(2)->get());
    }

    public function test_find()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals(" Line\n", $text->find('33.')->line()->get());
        $this->assertEquals(" Line\n34. Line\n35.", $text->clear()->beginning()->find('33.')->until('35.')->get());
    }


    public function test_move()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals("33. Line\n", $text->find('33.')->move(-3)->line()->get());
    }

    public function test_file_name()
    {
        $text = \Conkal\Text::read('tests/test.txt');
        $this->assertEquals("test.txt", $text->getFilename());
    }


}