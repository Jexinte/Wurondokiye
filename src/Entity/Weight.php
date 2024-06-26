<?php

namespace App\Entity;

use AllowDynamicProperties;
use App\Repository\WeightRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use IntlDateFormatter;
use Symfony\Component\Validator\Constraints as Assert;
#[AllowDynamicProperties]
#[ORM\Entity(repositoryClass: WeightRepository::class)]
class Weight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message:'Veuillez sélectionner une date !')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut-être vide !')]
    #[Assert\Range(notInRangeMessage: 'Oops! Seuls les valeurs entre 1 et 2500 sont acceptées !',  min: 1, max: 2500)]
    private ?float $weight = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Ce champ ne peut-être vide !')]
    private ?string $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }



    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
