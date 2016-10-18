<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Restaurant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/restaurants")
 */
class RestaurantController extends Controller
{
  /**
   * @Route("/{id}-{slug}", name="show_restaurant", requirements={"id": "\d+"})
   * @param Restaurant $restaurant
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function showAction(Restaurant $restaurant)
  {
    return $this->render(':Restaurant:show.html.twig', array(
      'restaurant' => $restaurant,
    ));
  }

  /**
   * @Route("/{id}", name="show_restaurant_redirect", requirements={"id": "\d+"}, options={"expose"=true})
   * @param Restaurant $restaurant
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   */
  public function showRedirectAction(Restaurant $restaurant)
  {
    return $this->redirectToRoute('show_restaurant', array(
      'id' => $restaurant->getId(),
      'slug' => $restaurant->getSlug(),
    ));
  }
}
