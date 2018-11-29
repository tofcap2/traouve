<?php


namespace App\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Traobject
 *
 * @property
 * @ORM\Table(name="traobject", indexes={@ORM\Index(name="fk_traobject_category_idx", columns={"category_id"}), @ORM\Index(name="fk_traobject_state1_idx", columns={"state_id"}), @ORM\Index(name="fk_traobject_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_traobject_county1_idx", columns={"county_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraobjectRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Traobject
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="traobject_images", fileNameProperty="picture")
     * @var File
     */
    private $pictureFile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_at", type="datetime", nullable=false)
     */
    private $eventAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="traobjects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var County
     *
     * @ORM\ManyToOne(targetEntity="County", inversedBy="traobjects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="county_id", referencedColumnName="id")
     * })
     */
    private $county;

    /**
     * @var State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Traobject
     */
    public function setId(int $id): ?Traobject
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Traobject
     */
    public function setTitle(string $title): Traobject
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     * @return Traobject
     */
    public function setPicture(?string $picture): Traobject
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Traobject
     */
    public function setDescription(?string $description): Traobject
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEventAt(): ?\DateTime
    {
        return $this->eventAt;
    }

    /**
     * @param \DateTime $eventAt
     * @return Traobject
     */
    public function setEventAt(\DateTime $eventAt): Traobject
    {
        $this->eventAt = $eventAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateEnd(): ?\DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime|null $dateEnd
     * @return Traobject
     */
    public function setDateEnd(?\DateTime $dateEnd): Traobject
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Traobject
     */
    public function setCity(string $city): Traobject
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     * @return Traobject
     */
    public function setAddress(?string $address): Traobject
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Traobject
     */
    public function setCreatedAt(\DateTime $createdAt): Traobject
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     * @return Traobject
     */
    public function setUpdatedAt(?\DateTime $updatedAt): Traobject
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Traobject
     */
    public function setCategory(Category $category): Traobject
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return County
     */
    public function getCounty(): ?County
    {
        return $this->county;
    }

    /**
     * @param County $county
     * @return Traobject
     */
    public function setCounty(County $county): Traobject
    {
        $this->county = $county;
        return $this;
    }



    /**
     * @return State
     */
    public function getState(): ?State
    {
        return $this->state;
    }

    /**
     * @param State $state
     * @return Traobject
     */
    public function setState(State $state): Traobject
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Traobject
     */
    public function setUser(User $user): Traobject
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @return Null|File
     */
    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    /**
     * @param Null|File $picture
     */
    public function setPictureFile(File $picture = null)
    {
        $this->pictureFile = $picture;

        if ($picture){
            $this->updatedAt = new \DateTime('now');
        }

    }

    public function __toString()
    {
        return $this->getTitle();
    }


}
