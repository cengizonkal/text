# Text

A PHP text manipulation library.
* [Installation](#installation)

<table>
    <tr>
        <td><a href="#readLine">readLine</a></td>
        <td><a href="#readLines">readLines</a></td>
        <td><a href="#readUntil">readUntil</a></td>
    </tr>
</table>

## Installation
```
composer require conkal/text
```

##### readLine()

Read a single line from text file to buffer

```php
\Conkal\Text::read('test.txt')->open()->readLine()->get(); // first line
```
##### readLines()

Read a n lines from text file to buffer

```php
\Conkal\Text::read('test.txt')->open()->readLines(2)->get(); 
//1. Line
//2. Line
```
##### readUntil()

Read all data until search text

```php
\Conkal\Text::read('test.txt')->open()->readUntil('2. Line')->get(); 
//1. Line
//2. Line
```
