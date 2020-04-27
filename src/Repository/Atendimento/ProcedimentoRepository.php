<?php

namespace App\Repository\Pessoal;

use App\Entity\CRM\Procedimento;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ProcedimentoRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return Procedimento::class;
    }


}
