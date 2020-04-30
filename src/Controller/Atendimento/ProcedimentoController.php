<?php

namespace App\Controller\Atendimento;


use App\Entity\Atendimento\Procedimento;
use App\EntityHandler\Atendimento\ProcedimentoEntityHandler;
use App\Form\Atendimento\ProcedimentoType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD Controller para Procedimento.
 *
 * @package App\Controller\Atendimento
 * @author Carlos Eduardo Pauluk
 */
class ProcedimentoController extends FormListController
{

    /**
     * @required
     * @param ProcedimentoEntityHandler $entityHandler
     */
    public function setEntityHandler(ProcedimentoEntityHandler $entityHandler): void
    {
        $this->entityHandler = $entityHandler;
    }

    public function getFilterDatas(array $params): array
    {
        return [
            new FilterData(['descricao'], 'LIKE', 'descricao', $params)
        ];
    }

    /**
     *
     * @Route("/cln/procedimento/form/{id}", name="cln_procedimento_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Procedimento|null $procedimento
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function form(Request $request, Procedimento $procedimento = null)
    {
        $params = [
            'typeClass' => ProcedimentoType::class,
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'cln_procedimento_form',
            'formPageTitle' => 'Procedimento'
        ];
        return $this->doForm($request, $procedimento, $params);
    }

    /**
     *
     * @Route("/cln/procedimento/list/", name="cln_procedimento_list")
     * @param Request $request
     * @return Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'formRoute' => 'procedimento_form',
            'listView' => 'Atendimento/procedimento_list.html.twig',
            'listRoute' => 'procedimento_list',
            'listPageTitle' => 'Procedimentos',
            'listId' => 'procedimentoList'
        ];
        return $this->doListSimpl($request, $params);
    }

    /**
     *
     * @Route("/cln/procedimento/delete/{id}/", name="cln_procedimento_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Procedimento $procedimento
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, Procedimento $procedimento): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $procedimento, []);
    }


}