<?php

namespace zeatool\analyzer\Reader;

interface ReaderInterface
{
    public function setSource($source);

    public function read();
}