<?php

namespace App\Entity;

use App\Repository\CalorieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CalorieRepository::class)]
class Calorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'Veuillez sélectionnez une date !')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez spécifiez le nombre de calories ingérées la veille !')]
    #[Assert\Range(notInRangeMessage: 'Le nombre de calories ingérées ne peut être à 0 et il ne peut excéder 2500 calories !',min:1, max: 2500)]
    private ?float $totalCalories = null;

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

    public function getTotalCalories(): ?float
    {
        return $this->totalCalories;
    }

    public function setTotalCalories(float $totalCalories): static
    {
        $this->totalCalories = $totalCalories;

        return $this;
    }
}
