# PHP Value Objects

## Table of Contents
- [PHP Value Objects](#php-value-objects)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [How to use](#how-to-use)
  - [Examples](#examples)
  - [Testing](#testing)

## Introduction

This repository contains value objects implementations for PHP basic types:

- **[Boolean](Src/Shared/Domain/ValueObjects/Boolean.php)** and **[Nullable boolean](Src/Shared/Domain/ValueObjects/BooleanNullable.php)**, bool type
- **[DateTime](Src/Shared/Domain/ValueObjects/DateTime.php)** and **[Nullable dateTime](Src/Shared/Domain/ValueObjects/DateTimeNullable.php)**, DateTime class
- **[Decimal](Src/Shared/Domain/ValueObjects/Decimal.php)** and **[Nullable decimal](Src/Shared/Domain/ValueObjects/DecimalNullable.php)**, float type
- **[Enum](Src/Shared/Domain/ValueObjects/Enum.php)**, constants
- **[Integer](Src/Shared/Domain/ValueObjects/Integer.php)** and **[Nullable integer](Src/Shared/Domain/ValueObjects/IntegerNullable.php)**, int type
- **[Json](Src/Shared/Domain/ValueObjects/Json.php)** and  **[Nullable json](Src/Shared/Domain/ValueObjects/JsonNullable.php)**, string type with json validation
- **[Text](Src/Shared/Domain/ValueObjects/Text.php)** and **[Nullable text](Src/Shared/Domain/ValueObjects/TextNullable.php)**, string type
- **[Uuid](Src/Shared/Domain/ValueObjects/Uuid.php)** and  **[Nullable Uuid](Src/Shared/Domain/ValueObjects/UuidNullable.php)**, string type with uuid validation 


By definition these classes are immutable, will always be valid, don't have an identity (id) and describe a concept. In accordance with these ideas the value object classes have:
- __construct($value) to initialize its value and a value() function to get it.
- validation() function. Basic validations like string length validation, min/max validations or json and uuid format validations. When a validation fails throws an 
- **[InvalidValueObjectException](Src/Shared/Domain/Exceptions/InvalidValueObjectException.php)**.
- abstract definition. You most describe your domain concepts.
- and equals() and toString() functions implementations.
  
## How to use
To use this repository you copy and paste the folder **"Src"** into your project. The reason it's simple: <ins>you have to control this code</ins>. This code belongs to your inner logic. I recommend you  copy **"Tests"** folder into your project too just in case you need to modify the src code.

Remember to configure the namespace **"Src"** classes according to your project.

## Examples
The Order class it's a Domain Model example where are used value objects. Take a look at [Example/Order/Order.php](Example/Order/Order.php) class and its test class [Tests/Example/OrderTest.php](Tests/Example/OrderTest.php). 

To watch each value object example take a look at Test/Src folder.

## Testing

To test this repository you most install [composer](https://getcomposer.org/) dependency management tool. If you have installed composer download the repository and execute next command at root folder

    composer tests

