<?php

namespace App\Entity;

use App\Repository\PacksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use function Symfony\Component\Clock\now;

#[ORM\Entity(repositoryClass: PacksRepository::class)]
class Packs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\OneToMany(targetEntity: Cards::class, mappedBy: 'pack_id')]
    private Collection $cards;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fnac_link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $amazon_link = null;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return Collection<int, Cards>
     */
    public function getCards(): Collection
    {
        return $this->cards;
    }

    public function addCard(Cards $card): static
    {
        if (!$this->cards->contains($card)) {
            $this->cards->add($card);
            $card->setPack($this);
        }

        return $this;
    }

    public function removeCard(Cards $card): static
    {
        if ($this->cards->removeElement($card)) {
            if ($card->getPack() === $this) {
                $card->setPack(null);
            }
        }

        return $this;
    }

    public function getFnacLink(): ?string
    {
        return $this->fnac_link;
    }

    public function setFnacLink(?string $fnac_link): static
    {
        $this->fnac_link = $fnac_link;

        return $this;
    }

    public function getAmazonLink(): ?string
    {
        return $this->amazon_link;
    }

    public function setAmazonLink(?string $amazon_link): static
    {
        $this->amazon_link = $amazon_link;

        return $this;
    }
}
