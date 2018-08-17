<?php

namespace zeatool\analyzer;

use zeatool\analyzer\Exception\AnalyzeException;
use zeatool\analyzer\Reader\ReaderInterface;

class Analyzer
{
    protected $reader;
    protected $data;
    protected $result = [];

    protected $charlist = "АаБбВвГгҐґДдЕеЁёЄєЖжЗзИиІіЇїЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЬьЪъЫыЮюЬьЭэЯя";

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function analyze()
    {
        $data = $this->reader->read();
        try{
            $words = str_word_count($data, 1, $this->charlist);
        }catch (\Exception $e){
            throw new AnalyzeException($e->getMessage());
        }

        $this->result = array_reduce($words, function ($result, $elem) {
            $result[$elem] = isset($result[$elem]) ? $result[$elem] + 1 : 1;

            return $result;
        });

        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }
}