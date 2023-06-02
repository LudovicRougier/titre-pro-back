<?php

namespace App\Models;

class People
{
    protected $id;
    protected $name;
    protected $profile_picture;

    public function __construct($infos = [
        'id' => null,
        'name' => null,
        'profile_picture' => null,
    ])
    {
        $this->id = $infos['id'];
        $this->name = $infos['name'];
        $this->profile_picture = $infos['profile_picture'];
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'profile_picture' => $this->profile_picture,
        ];
    }
}
