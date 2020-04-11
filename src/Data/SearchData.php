<?php

namespace App\Data;

use App\Entity\Marks;

class SearchData{


    /**
     * @var int
     */
    public $page = 1;

    /**
     * @var Marks[]
     */
    public $marke = [];

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var null|integer
     */
    public $min;


}