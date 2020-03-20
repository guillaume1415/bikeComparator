<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


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
     * @ORM\Column(type="string", length=8)
     */
    private $FrameSize;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $frameMaterial;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $ForkMaterial;

    /**
     * @var ArrayCollection
     */
    private $Marks;

    public function __construct()
    {
        $this->Marks = new ArrayCollection();
    }



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



    public function getFrameSize(): ?string
    {
        return $this->FrameSize;
    }

    public function setFrameSize(string $FrameSize): self
    {
        $this->FrameSize = $FrameSize;

        return $this;
    }

    public function getFrameMaterial(): ?string
    {
        return $this->frameMaterial;
    }

    public function setFrameMaterial(string $frameMaterial): self
    {
        $this->frameMaterial = $frameMaterial;

        return $this;
    }

    public function getForkMaterial(): ?string
    {
        return $this->ForkMaterial;
    }

    public function setForkMaterial(string $ForkMaterial): self
    {
        $this->ForkMaterial = $ForkMaterial;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getMarks(): ArrayCollection
    {
        return $this->Marks;
    }

    /**
     * @param ArrayCollection $Marks
     * @return BikeSearch
     */
    public function setMarks(ArrayCollection $Marks): BikeSearch
    {
        $this->Marks = $Marks;
        return $this;
    }
}
