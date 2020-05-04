<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mark;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groupe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $material;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $speed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $years;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $poidsFabricant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $friens;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size4;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size5;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marks", inversedBy="tests")
     */
    private $marks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(?string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(?int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->poid;
    }

    public function setPoid(?int $poid): self
    {
        $this->poid = $poid;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getYears(): ?int
    {
        return $this->years;
    }

    public function setYears(?int $years): self
    {
        $this->years = $years;

        return $this;
    }

    public function getPoidsFabricant(): ?int
    {
        return $this->poidsFabricant;
    }

    public function setPoidsFabricant(?int $poidsFabricant): self
    {
        $this->poidsFabricant = $poidsFabricant;

        return $this;
    }

    public function getFriens(): ?string
    {
        return $this->friens;
    }

    public function setFriens(?string $friens): self
    {
        $this->friens = $friens;

        return $this;
    }

    public function getSize1(): ?int
    {
        return $this->size1;
    }

    public function setSize1(?int $size1): self
    {
        $this->size1 = $size1;

        return $this;
    }

    public function getSize2(): ?int
    {
        return $this->size2;
    }

    public function setSize2(?int $size2): self
    {
        $this->size2 = $size2;

        return $this;
    }

    public function getSize3(): ?int
    {
        return $this->size3;
    }

    public function setSize3(?int $size3): self
    {
        $this->size3 = $size3;

        return $this;
    }

    public function getSize4(): ?int
    {
        return $this->size4;
    }

    public function setSize4(?int $size4): self
    {
        $this->size4 = $size4;

        return $this;
    }

    public function getSize5(): ?int
    {
        return $this->size5;
    }

    public function setSize5(?int $size5): self
    {
        $this->size5 = $size5;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMarks(): ?Marks
    {
        return $this->marks;
    }

    public function setMarks(?Marks $marks): self
    {
        $this->marks = $marks;

        return $this;
    }
}
