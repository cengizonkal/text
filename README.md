# Text

A PHP text file library.
* [Installation](#installation)

<table>
    <tr>
        <td><a href="#line">line</a></td>
        <td><a href="#lines">lines</a></td>
        <td><a href="#until">until</a></td>
    </tr>
     <tr>
            <td><a href="#char">char</a></td>
            <td><a href="#chars">chars</a></td>
            <td><a href="#beginning">beginning</a></td>
     </tr>
</table>

## Installation
```
composer require conkal/text
```

##### line()

Read a single line from text file to buffer

```php
\Conkal\Text::read('test.txt')->open()->line()->get(); // first line
```
##### lines()

Read a n lines from text file to buffer

```php
\Conkal\Text::read('test.txt')->open()->lines(2)->get(); 
//1. Line
//2. Line
```
##### until()

Read all data until search text

```php
\Conkal\Text::read('test.txt')->open()->until('2. Line')->get(); 
//1. Line
//2. Line
```
##### char()

Read a single char

```php
\Conkal\Text::read('test.txt')->open()->char()->get(); 
//1
```

##### chars(n)

Read a single char

```php
\Conkal\Text::read('test.txt')->open()->chars(4)->get(); 
//1. L
```

##### beginning()

Move file pointer to beginning

```php
\Conkal\Text::read('test.txt')->open()->char()->beginning()->char()->get(); 
//11
```