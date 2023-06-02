<?php

namespace App\Models;

class Genre
{
    protected $name;

    public function __construct($infos = [
        'name' => null,
    ])
    {
        $this->name = $infos['name'];
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
        ];
    }
}
