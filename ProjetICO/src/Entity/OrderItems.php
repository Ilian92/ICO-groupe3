<?php

namespace App\Entity;

use App\Repository\OrderItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemsRepository::class)]
class OrderItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Orders $order_id = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Packs $pack_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderId(): ?Orders
    {
        return $this->order_id;
    }

    public function setOrderId(?Orders $order_id): static
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getPackId(): ?Packs
    {
        return $this->pack_id;
    }

    public function setPackId(?Packs $pack_id): static
    {
        $this->pack_id = $pack_id;

        return $this;
    }
}
