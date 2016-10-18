<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Restaurant;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRestaurantData implements FixtureInterface
{
  /**
   * {@inheritdoc}
   */
  public function load(ObjectManager $manager)
  {
    $manager->persist((new Restaurant())
      ->setName('Pizza Express')
      ->setCity('Birmingham')
      ->setStyles(array(
        'Italian',
        'Pizza',
      ))
      ->setPromoted(true)
    );

    $manager->persist((new Restaurant())
      ->setName('Pushkar')
      ->setCity('Birmingham')
      ->setStyles(array(
        'Indian',
      ))
    );

    $manager->persist((new Restaurant())
      ->setName('Nando\'s')
      ->setCity('Birmingham')
      ->setStyles(array(
        'African',
        'Portuguese',
      ))
    );

    $manager->persist((new Restaurant())
      ->setName('PJ\'s Bar & Grill')
      ->setCity('London')
      ->setStyles(array(
        'American',
        'Steakhouse',
      ))
    );

    $manager->persist((new Restaurant())
      ->setName('L\'Escargot Blanc')
      ->setCity('Edinburgh')
      ->setStyles(array(
        'French',
      ))
    );

    $manager->flush();
  }
}
