<?php

namespace App\Repository\Pessoal;

use App\Entity\Pessoal\Profissional;
use CrosierSource\CrosierLibBaseBundle\Repository\FilterRepository;

/**
 *
 * @author Carlos Eduardo Pauluk
 *
 */
class ProfissionalRepository extends FilterRepository
{

    public function getEntityClass(): string
    {
        return Profissional::class;
    }


}
