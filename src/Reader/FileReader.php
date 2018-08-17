<?php

namespace zeatool\analyzer\Reader;

use zeatool\analyzer\Exception\ReadException;

/**
 * Class FileReader
 * @package zeatool\analyzer\Reader
 */
class FileReader implements ReaderInterface
{
    /**
     * @var
     */
    protected $source;
    /**
     * @var string
     */
    protected $data = "";

    /**
     * @param $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return bool|string
     * @throws ReadException
     */
    public function read()
    {
        try {
            $this->data = file_get_contents($this->source);
        } catch (\Exception $e) {
            throw new ReadException($e->getMessage());
        }

        return $this->data;
    }
}