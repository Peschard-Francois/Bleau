<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RouteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RouteRepository::class)]
#[ApiResource]
class Route
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_fr = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_en = null;

    #[ORM\Column]
    private ?int $rating_value = null;

    #[ORM\Column]
    private ?int $nb_rating = null;

    #[ORM\Column]
    private ?int $nb_repetition = null;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'routes')]
    private Collection $types;

    #[ORM\ManyToMany(targetEntity: BleauVideo::class, inversedBy: 'routes')]
    private Collection $bleau_videos;

    #[ORM\ManyToMany(targetEntity: BleauImage::class, inversedBy: 'routes')]
    private Collection $bleau_images;

    #[ORM\ManyToMany(targetEntity: BleauDescription::class, inversedBy: 'routes')]
    private Collection $bleau_descriptions;

    #[ORM\ManyToOne(inversedBy: 'routes')]
    private ?sector $sectors = null;

    #[ORM\ManyToOne(inversedBy: 'routes')]
    private ?setter $setters = null;

    #[ORM\ManyToMany(targetEntity: Circuit::class, inversedBy: 'routes')]
    private Collection $circuits;

    #[ORM\OneToMany(mappedBy: 'routes', targetEntity: Image::class)]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: 'routes', targetEntity: Video::class)]
    private Collection $videos;


    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->bleau_videos = new ArrayCollection();
        $this->bleau_images = new ArrayCollection();
        $this->bleau_descriptions = new ArrayCollection();
        $this->circuits = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->description_fr;
    }

    public function setDescriptionFr(string $description_fr): self
    {
        $this->description_fr = $description_fr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->description_en;
    }

    public function setDescriptionEn(string $description_en): self
    {
        $this->description_en = $description_en;

        return $this;
    }

    public function getRatingValue(): ?int
    {
        return $this->rating_value;
    }

    public function setRatingValue(int $rating_value): self
    {
        $this->rating_value = $rating_value;

        return $this;
    }

    public function getNbRating(): ?int
    {
        return $this->nb_rating;
    }

    public function setNbRating(int $nb_rating): self
    {
        $this->nb_rating = $nb_rating;

        return $this;
    }

    public function getNbRepetition(): ?int
    {
        return $this->nb_repetition;
    }

    public function setNbRepetition(int $nb_repetition): self
    {
        $this->nb_repetition = $nb_repetition;

        return $this;
    }

    /**
     * @return Collection<int, type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, bleauVideo>
     */
    public function getBleauVideos(): Collection
    {
        return $this->bleau_videos;
    }

    public function addBleauVideo(bleauVideo $bleauVideo): self
    {
        if (!$this->bleau_videos->contains($bleauVideo)) {
            $this->bleau_videos->add($bleauVideo);
        }

        return $this;
    }

    public function removeBleauVideo(bleauVideo $bleauVideo): self
    {
        $this->bleau_videos->removeElement($bleauVideo);

        return $this;
    }

    /**
     * @return Collection<int, bleauImage>
     */
    public function getBleauImages(): Collection
    {
        return $this->bleau_images;
    }

    public function addBleauImage(bleauImage $bleauImage): self
    {
        if (!$this->bleau_images->contains($bleauImage)) {
            $this->bleau_images->add($bleauImage);
        }

        return $this;
    }

    public function removeBleauImage(bleauImage $bleauImage): self
    {
        $this->bleau_images->removeElement($bleauImage);

        return $this;
    }

    /**
     * @return Collection<int, bleauDescription>
     */
    public function getBleauDescriptions(): Collection
    {
        return $this->bleau_descriptions;
    }

    public function addBleauDescription(bleauDescription $bleauDescription): self
    {
        if (!$this->bleau_descriptions->contains($bleauDescription)) {
            $this->bleau_descriptions->add($bleauDescription);
        }

        return $this;
    }

    public function removeBleauDescription(bleauDescription $bleauDescription): self
    {
        $this->bleau_descriptions->removeElement($bleauDescription);

        return $this;
    }

    public function getSectors(): ?sector
    {
        return $this->sectors;
    }

    public function setSectors(?sector $sectors): self
    {
        $this->sectors = $sectors;

        return $this;
    }

    public function getSetters(): ?setter
    {
        return $this->setters;
    }

    public function setSetters(?setter $setters): self
    {
        $this->setters = $setters;

        return $this;
    }

    /**
     * @return Collection<int, circuit>
     */
    public function getCircuits(): Collection
    {
        return $this->circuits;
    }

    public function addCircuit(circuit $circuit): self
    {
        if (!$this->circuits->contains($circuit)) {
            $this->circuits->add($circuit);
        }

        return $this;
    }

    public function removeCircuit(circuit $circuit): self
    {
        $this->circuits->removeElement($circuit);

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setRoutes($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRoutes() === $this) {
                $image->setRoutes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->setRoutes($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getRoutes() === $this) {
                $video->setRoutes(null);
            }
        }

        return $this;
    }
}
