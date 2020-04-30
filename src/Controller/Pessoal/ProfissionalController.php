<?php

namespace App\Controller\Pessoal;


use App\Entity\Pessoal\Profissional;
use App\EntityHandler\Pessoal\ProfissionalEntityHandler;
use App\Form\Pessoal\ProfissionalType;
use CrosierSource\CrosierLibBaseBundle\Controller\FormListController;
use CrosierSource\CrosierLibBaseBundle\Utils\RepositoryUtils\FilterData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * CRUD Controller para Profissional.
 *
 * @package App\Controller\Pessoal
 * @author Carlos Eduardo Pauluk
 */
class ProfissionalController extends FormListController
{

    /**
     * @required
     * @param ProfissionalEntityHandler $entityHandler
     */
    public function setEntityHandler(ProfissionalEntityHandler $entityHandler): void
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
     * @Route("/cln/profissional/form/{id}", name="cln_profissional_form", defaults={"id"=null}, requirements={"id"="\d+"})
     * @param Request $request
     * @param Profissional|null $profissional
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function form(Request $request, Profissional $profissional = null)
    {
        $params = [
            'typeClass' => ProfissionalType::class,
            'formView' => '@CrosierLibBase/form.html.twig',
            'formRoute' => 'cln_profissional_form',
            'formPageTitle' => 'Profissional'
        ];
        return $this->doForm($request, $profissional, $params);
    }

    /**
     *
     * @Route("/cln/profissional/list/", name="cln_profissional_list")
     * @param Request $request
     * @return Response
     * @throws \Exception
     *
     * @IsGranted("ROLE_CLINICA_ADMIN", statusCode=403)
     */
    public function list(Request $request): Response
    {
        $params = [
            'formRoute' => 'profissional_form',
            'listView' => 'Pessoal/profissional_list.html.twig',
            'listRoute' => 'profissional_list',
            'listPageTitle' => 'Profissionais',
            'listId' => 'profissionalList'
        ];
        return $this->doListSimpl($request, $params);
    }

    /**
     *
     * @Route("/cln/profissional/delete/{id}/", name="cln_profissional_delete", requirements={"id"="\d+"})
     * @param Request $request
     * @param Profissional $profissional
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @IsGranted("ROLE_ADMIN", statusCode=403)
     */
    public function delete(Request $request, Profissional $profissional): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->doDelete($request, $profissional, []);
    }


}