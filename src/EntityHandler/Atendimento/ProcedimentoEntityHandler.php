<?php

namespace App\EntityHandler\Atendimento;

use App\Entity\Atendimento\Procedimento;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class ProcedimentoEntityHandler extends EntityHandler
{

    public function getEntityClass(): string
    {
        return Procedimento::class;
    }

}