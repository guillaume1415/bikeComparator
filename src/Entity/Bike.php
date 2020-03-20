<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BikeRepository")
 */
class Bike
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $frame_size;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $frame_material;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fork_material;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $exist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marks", inversedBy="bikes")
     */
    private $mark;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFrameSize(): ?int
    {
        return $this->frame_size;
    }

    public function setFrameSize(int $frame_size): self
    {
        $this->frame_size = $frame_size;

        return $this;
    }

    public function getFrameMaterial(): ?string
    {
        return $this->frame_material;
    }

    public function setFrameMaterial(string $frame_material): self
    {
        $this->frame_material = $frame_material;

        return $this;
    }

    public function getForkMaterial(): ?string
    {
        return $this->fork_material;
    }

    public function setForkMaterial(string $fork_material): self
    {
        $this->fork_material = $fork_material;

        return $this;
    }



    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExist(): ?int
    {
        return $this->exist;
    }

    public function setExist(int $exist): self
    {
        $this->exist = $exist;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getMark(): ?Marks
    {
        return $this->mark;
    }

    public function setMark(?Marks $mark): self
    {
        $this->mark = $mark;

        return $this;
    }








}
