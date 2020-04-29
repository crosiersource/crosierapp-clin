<?php

namespace App\EntityHandler\Pessoal;

use App\Entity\Pessoal\Profissional;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class ProfissionalEntityHandler extends EntityHandler
{

    public function getEntityClass(): string
    {
        return Profissional::class;
    }

}