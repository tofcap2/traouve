<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=false)
     */
    private $color;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Traobject", mappedBy="category")
     */
    private $traobjects;

    public function __construct() {
        $this->traobjects = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function setId(int $id): ?Category
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Category
     */
    public function setLabel(string $label): Category
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Category
     */
    public function setIcon(string $icon): Category
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Category
     */
    public function setColor(string $color): Category
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTraobjects(): Collection
    {
        return $this->traobjects;
    }

    /**
     * @param Collection $traobjects
     */
    public function setTraobjects(Collection $traobjects): void
    {
        $this->traobjects = $traobjects;
    }

    public function __toString()
    {
        return $this->getLabel();
    }

}
