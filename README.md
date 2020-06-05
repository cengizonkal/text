# Text

A PHP text manipulation library.
* [Installation](#installation)

<table>
    <tr>
        <td><a href="#readLine">readLine</a></td>
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

