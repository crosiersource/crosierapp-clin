<?php

namespace App\EntityHandler\Pessoal;

use App\Entity\Pessoal\Contrato;
use CrosierSource\CrosierLibBaseBundle\EntityHandler\EntityHandler;

/**
 *
 * @author Carlos Eduardo Pauluk
 */
class ContratoEntityHandler extends EntityHandler
{

    public function getEntityClass(): string
    {
        return Contrato::class;
    }

}