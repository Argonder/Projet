<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SliderRepository")
 */
class Slider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $libelle;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
 * @return mixed
 */
public function getLibelle()
{
    return $this->libelle;
}/**
 * @param mixed $libelle
 */
public function setLibelle($libelle)
{
    $this->libelle = $libelle;
}/**
 * @return mixed
 */
public function getImage()
{
    return $this->image;
}/**
 * @param mixed $image
 */
public function setImage($image)
{
    $this->image = $image;
}
}
