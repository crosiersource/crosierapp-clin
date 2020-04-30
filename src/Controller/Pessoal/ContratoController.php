<?php

namespace App\Controller\Pessoal;


use App\Entity\Pessoal\Contrato;
use App\EntityHandler\Pessoal\ContratoEntityHandler;
use App\Form\Pessoal\ContratoType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD Controller para Contrato.
 *
 * @package App\Controller\Pessoal
 * @author Carlos Eduardo Pauluk
 */
class ContratoController extends FormListController
{

    /**
     * @required
     * @param ContratoEntityHandler $entityHandler
     */
    public function setEntityHandler(ContratoEntityHandler $entityHandler): void
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
     * @Route("/cln/contrato/form/{id}", name="cln_contrato_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Contrato|null $contrato
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function form(Request $request, Contrato $contrato = null)
    {
        $params = [
            'typeClass' => ContratoType::class,
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'cln_contrato_form',
            'formPageTitle' => 'Contrato'
        ];
        return $this->doForm($request, $contrato, $params);
    }

    /**
     *
     * @Route("/cln/contrato/list/", name="cln_contrato_list")
     * @param Request $request
     * @return Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'formRoute' => 'cln_contrato_form',
            'listView' => 'Pessoal/contrato_list.html.twig',
            'listRoute' => 'cln_contrato_list',
            'listPageTitle' => 'Contratos',
            'listId' => 'contratoList'
        ];
        return $this->doListSimpl($request, $params);
    }

    /**
     *
     * @Route("/cln/contrato/delete/{id}/", name="cln_contrato_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Contrato $contrato
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, Contrato $contrato): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $contrato, []);
    }


}