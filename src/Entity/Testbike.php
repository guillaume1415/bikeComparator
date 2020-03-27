<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestbikeRepository")
 */
class Testbike
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=187, nullable=true)
     */
    private $herf;

    /**
     * @ORM\Column(type="string", length=94, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHerf(): ?string
    {
        return $this->herf;
    }

    public function setHerf(?string $herf): self
    {
        $this->herf = $herf;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
