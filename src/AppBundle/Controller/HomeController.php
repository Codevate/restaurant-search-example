<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
  /**
   * @Route("/", name="homepage")
   * @param Request $request
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function indexAction(Request $request)
  {
    return $this->render('Home/index.html.twig');
  }
}
