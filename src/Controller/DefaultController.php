<?php

namespace App\Controller;


use CrosierSource\CrosierLibBaseBundle\Business\Config\StoredViewInfoBusiness;
use CrosierSource\CrosierLibBaseBundle\Controller\BaseController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 * @author Carlos Eduardo Pauluk
 */
class DefaultController extends BaseController
{

    protected StoredViewInfoBusiness $storedViewInfoBusiness;

    /**
     * @required
     * @param StoredViewInfoBusiness $storedViewInfoBusiness
     */
    public function setStoredViewInfoBusiness(StoredViewInfoBusiness $storedViewInfoBusiness): void
    {
        $this->storedViewInfoBusiness = $storedViewInfoBusiness;
    }


    /**
     *
     * @Route("/", name="index")
     * @param SessionInterface $session
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(SessionInterface $session)
    {
        return $this->doRender('dashboard.html.twig', []);
    }


}