<?php

namespace App\Entity;

use App\Repository\RulesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RulesRepository::class)]
class Rules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'rules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Packs $pack_id = null;

    #[ORM\Column(length: 50)]
    private ?string $section = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

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

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): static
    {
        $this->section = $section;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
