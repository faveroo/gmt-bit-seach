# Bit Masks App

Simple PHP implementation of the Bit Masks challenge from the App Ideas Collection.

## Features

* Search cities by GMT offset
* Uses bitwise operations (`<<` and `&`)
* No external dependencies
* Built with pure PHP

## Running the project

Start the PHP built-in server:

```bash
php -S localhost:8000 -t public
```

Open your browser and access:

```text
http://localhost:8000
```

## How it works

Each GMT offset is represented by a unique bit in a binary mask.

When a user searches for a GMT offset, the application creates a bit mask and compares it against the masks assigned to each city using a bitwise AND operation.

## Challenge

This project is a solution to the Bit Masks challenge from the App Ideas Collection:

https://github.com/florinpop17/app-ideas/blob/master/Projects/2-Intermediate/Bit-Masks-App.md
