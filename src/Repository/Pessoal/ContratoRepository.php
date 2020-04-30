<?php

namespace App\Repository\Pessoal;

use App\Entity\Pessoal\Contrato;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ContratoRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return Contrato::class;
    }


}
