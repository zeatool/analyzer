# Test Analyzer

Example of test analyser

## Prepare

``` bash
$ composer install
```

## Usage

``` php
$reader = new FileReader()->setSource("file.txt");
$data = $analyzer->analyze()->getResult();
```

## Testing

``` bash
$ phpunit
```