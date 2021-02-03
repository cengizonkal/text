# Text
![Build](https://github.com/cengizonkal/text/workflows/Build/badge.svg)

A PHP text file library.

<table>
    <tr>
        <td><a href="#line">line</a></td>
        <td><a href="#lines">lines</a></td>
        <td><a href="#until">until</a></td>
        <td><a href="#char">char</a></td>
        <td><a href="#chars">chars</a></td>
        <td><a href="#beginning">beginning</a></td>
        <td><a href="#find">find</a></td>
    </tr>
</table>

## Installation
```
composer require conkal/text
```

##### line()

Read a single line from text file to buffer

```php
\Conkal\Text::read('test.txt')->line()->get(); // first line
```
##### lines()

Read a n lines from text file to buffer

```php
\Conkal\Text::read('test.txt')->lines(2)->get(); 
//1. Line
//2. Line
```
##### until()

Read all data until search text

```php
\Conkal\Text::read('test.txt')->until('2. Line')->get(); 
//1. Line
//2. Line
```
##### char()

Read a single char

```php
\Conkal\Text::read('test.txt')->char()->get(); 
//1
```

##### chars(n)

Read a single char

```php
\Conkal\Text::read('test.txt')->chars(4)->get(); 
//1. L
```

##### beginning()

Move file pointer to beginning

```php
\Conkal\Text::read('test.txt')->char()->beginning()->char()->get(); 
//11
```

##### find()
Move file pointer to search location

```php
$text = \Conkal\Text::read('tests/test.txt');
$text->find('33.')->line()->get();
//Line 
```
