<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 17.08.18
 * Time: 8:53
 */

namespace zeatool\analyzer\Reader;

use zeatool\analyzer\Exception\ReadException;

class FileReader implements ReaderInterface
{
    protected $source;
    protected $data;

    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

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