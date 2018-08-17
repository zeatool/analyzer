<?php

use PHPUnit\Framework\TestCase;
use zeatool\analyzer\Analyzer;

class AnalyzerTest extends TestCase
{
    public function testPositiveAnalyze()
    {
        $stub = $this->createMock(\zeatool\analyzer\Reader\ReaderInterface::class);
        $stub->method('read')
            ->willReturn('Мяу МЯУ    Мяу ГАВ гав ГАВ гааааав гАв');

        $analyzer = new Analyzer($stub);

        $data = $analyzer->analyze()->getResult();

        $this->assertArraySubset([
            'Мяу' => 2,
            'МЯУ' => 1,
            'ГАВ' => 2,
            'гАв' => 1
        ],$data);
    }

    public function testNonStringReaderAnalyze()
    {
        $stub = $this->createMock(\zeatool\analyzer\Reader\ReaderInterface::class);
        $stub->method('read')
            ->willReturn([1,2,4]);

        $analyzer = new Analyzer($stub);

        $this->expectException(\zeatool\analyzer\Exception\AnalyzeException::class);
        $data = $analyzer->analyze()->getResult();
    }
}
