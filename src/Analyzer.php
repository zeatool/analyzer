<?php

namespace zeatool\analyzer;

use zeatool\analyzer\Exception\AnalyzeException;
use zeatool\analyzer\Reader\ReaderInterface;

/**
 * Class Analyzer
 * @package zeatool\analyzer
 */
class Analyzer
{
    /**
     * @var ReaderInterface
     */
    protected $reader;
    /**
     * @var
     */
    protected $data;
    /**
     * @var array
     */
    protected $result = [];

    /**
     * @var string
     */
    protected $charlist = "АаБбВвГгҐґДдЕеЁёЄєЖжЗзИиІіЇїЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЬьЪъЫыЮюЬьЭэЯя";

    /**
     * Analyzer constructor.
     * @param ReaderInterface $reader
     */
    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return $this
     * @throws AnalyzeException
     */
    public function analyze()
    {
        $data = $this->reader->read();
        try {
            $words = str_word_count($data, 1, $this->charlist);
        } catch (\Exception $e) {
            throw new AnalyzeException($e->getMessage());
        }

        $this->result = array_unique($words);

        return $this;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }
}