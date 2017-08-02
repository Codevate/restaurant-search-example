<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RestaurantRepository")
 */
class Restaurant
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="name", type="string", length=255)
   */
  private $name;

  /**
   * @var string
   *
   * @ORM\Column(name="city", type="string", length=255)
   */
  private $city;

  /**
   * @var array
   *
   * @ORM\Column(name="styles", type="simple_array")
   */
  private $styles;

  /**
   * @var boolean
   *
   * @ORM\Column(name="promoted", type="boolean")
   */
  private $promoted = false;

  /**
   * @var string
   *
   * @ORM\Column(name="slug", type="string", length=255)
   * @Gedmo\Slug(fields={"name","city"}, unique=false)
   */
  private $slug;

  /**
   * @return array
   */
  public function getNameSuggest()
  {
    return array(
      'input' => array_merge(
        array(
          $this->getName(),
          $this->getCity(),
        ),
        $this->getStyles()
      ),
      'weight' => $this->calculateWeight(),
    );
  }

  /**
   * @return int
   */
  public function calculateWeight()
  {
    $weight = 0;

    if ($this->isPromoted()) {
      $weight += 5;
    }

    return $weight;
  }

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param string $name
   * @return $this
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param string $city
   * @return $this
   */
  public function setCity($city)
  {
    $this->city = $city;

    return $this;
  }

  /**
   * @return string
   */
  public function getCity()
  {
    return $this->city;
  }

  /**
   * @param array $styles
   * @return $this
   */
  public function setStyles(array $styles = array())
  {
    $this->styles = $styles;

    return $this;
  }

  /**
   * @return array
   */
  public function getStyles()
  {
    return $this->styles;
  }

  /**
   * @param boolean $promoted
   * @return $this
   */
  public function setPromoted($promoted)
  {
    $this->promoted = filter_var($promoted, FILTER_VALIDATE_BOOLEAN);

    return $this;
  }

  /**
   * @return boolean
   */
  public function isPromoted()
  {
    return $this->promoted;
  }

  /**
   * @param string $slug
   * @return $this
   */
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }

  /**
   * @return string
   */
  public function getSlug()
  {
    return $this->slug;
  }
}
