<?php

use zeatool\analyzer\Reader\FileReader;
use PHPUnit\Framework\TestCase;

class FileReaderTest extends TestCase
{
    protected static $filename;

    public static function setUpBeforeClass()
    {
        self::$filename = "testReader.txt";

        $fd = fopen(self::$filename, 'w');
        $str = "Привет мир";

        fwrite($fd, $str);
        fclose($fd);
    }

    public function testFileRead(){
        $reader = new FileReader();
        $data = $reader->setSource(self::$filename)->read();
        $this->assertSame($data,"Привет мир");
    }

    public function testFileNotFound(){
        $reader = new FileReader();

    }

    public static function tearDownAfterClass()
    {
        unlink(self::$filename);
    }
}
