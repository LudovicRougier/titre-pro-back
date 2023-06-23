<?php

namespace App\Enums;

enum GenderEnum:string
{
    case MALE      = 'Homme';
    case FEMALE    = 'Femme';
    case OTHER     = 'Autre';
    case UNDEFINED = 'Non Renseigné';
}
