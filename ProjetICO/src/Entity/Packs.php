<?php

namespace App\Entity;

use App\Repository\PacksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

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

    /**
     * @var Collection<int, OrderItems>
     */
    #[ORM\OneToMany(targetEntity: OrderItems::class, mappedBy: 'pack_id')]
    private Collection $orderItems;

    /**
     * @var Collection<int, Cards>
     */
    #[ORM\OneToMany(targetEntity: Cards::class, mappedBy: 'pack_id')]
    private Collection $cards;

    /**
     * @var Collection<int, Rules>
     */
    #[ORM\OneToMany(targetEntity: Rules::class, mappedBy: 'pack_id')]
    private Collection $rules;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
        $this->cards = new ArrayCollection();
        $this->rules = new ArrayCollection();
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
     * @return Collection<int, OrderItems>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItems $orderItem): static
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setPackId($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItems $orderItem): static
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getPackId() === $this) {
                $orderItem->setPackId(null);
            }
        }

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
            $card->setPackId($this);
        }

        return $this;
    }

    public function removeCard(Cards $card): static
    {
        if ($this->cards->removeElement($card)) {
            // set the owning side to null (unless already changed)
            if ($card->getPackId() === $this) {
                $card->setPackId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rules>
     */
    public function getRules(): Collection
    {
        return $this->rules;
    }

    public function addRule(Rules $rule): static
    {
        if (!$this->rules->contains($rule)) {
            $this->rules->add($rule);
            $rule->setPackId($this);
        }

        return $this;
    }

    public function removeRule(Rules $rule): static
    {
        if ($this->rules->removeElement($rule)) {
            // set the owning side to null (unless already changed)
            if ($rule->getPackId() === $this) {
                $rule->setPackId(null);
            }
        }

        return $this;
    }
}
