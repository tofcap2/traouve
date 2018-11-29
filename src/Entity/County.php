<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * County
 *
 * @ORM\Table(name="county")
 * @ORM\Entity
 */
class County
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
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Traobject", mappedBy="county")
     */
    private $traobjects;

    public function __construct()    {
        $this->traobjects = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=false)
     */
    private $zipcode;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return County
     */
    public function setId(int $id): County
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return County
     */
    public function setLabel(string $label): County
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int
     */
    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    /**
     * @param int $zipcode
     * @return County
     */
    public function setZipcode(int $zipcode): County
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTraobjects(): \Doctrine\Common\Collections\Collection
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
