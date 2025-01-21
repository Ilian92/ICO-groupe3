<?php

namespace App\Entity;

use App\Repository\CardTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardTypeRepository::class)]
class CardType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, Cards>
     */
    #[ORM\OneToMany(targetEntity: Cards::class, mappedBy: 'type_id')]
    private Collection $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
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
            $card->setTypeId($this);
        }

        return $this;
    }

    public function removeCard(Cards $card): static
    {
        if ($this->cards->removeElement($card)) {
            // set the owning side to null (unless already changed)
            if ($card->getTypeId() === $this) {
                $card->setTypeId(null);
            }
        }

        return $this;
    }
}
