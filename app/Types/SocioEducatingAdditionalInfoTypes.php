<?php

namespace App\Types;

use App\Types\Types;

class SocioEducatingAdditionalInfoTypes extends Types
{
    public const EDUCATION_LEVEL= [];
    public const EDUCATION_STATUS = ['ESTUDANDO', 'DESISTIU', 'CONCLUIU'];

    public const MULTIPLE_LEVEL_QUESTIONS = ['SIM', 'NAO', 'PARCIALMENTE'];
    public const OPERATIONS = ['ADICAO', 'MULTIPLICACAO', 'SUBTRACAO', 'DIVISAO'];
}