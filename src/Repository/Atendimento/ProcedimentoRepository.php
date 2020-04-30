<?php

namespace App\Repository\Atendimento;

use App\Entity\Atendimento\Procedimento;
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
