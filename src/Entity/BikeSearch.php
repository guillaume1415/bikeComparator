<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BikeSearchRepository")
 */
class BikeSearch
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Mark;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxPrice(): ?int
    {
        return $this->MaxPrice;
    }

    public function setMaxPrice(int $MaxPrice): self
    {
        $this->MaxPrice = $MaxPrice;

        return $this;
    }

    public function getMinPrice(): ?int
    {
        return $this->MinPrice;
    }

    public function setMinPrice(int $MinPrice): self
    {
        $this->MinPrice = $MinPrice;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->Mark;
    }

    public function setMark(string $Mark): self
    {
        $this->Mark = $Mark;

        return $this;
    }
}
