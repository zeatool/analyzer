# Test Analyzer

Example of test analyser

## Prepare

``` bash
$ composer install
```

## Usage

``` php
$reader = new zeatool\analyzer\Reader\FileReader()->setSource("file.txt");

$analyzer = new zeatool\analyzer\Analyzer($reader);
$data = $analyzer->analyze()->getResult();
```

## Testing

``` bash
$ phpunit
```