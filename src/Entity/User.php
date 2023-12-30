<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity('username','Oops! Ce nom d\'utilisateur est déjà pris, veuillez en choisir un autre !'
)]
#[UniqueEntity('email','Oops! Cette adresse email est déjà prise, veuillez en définir une autre !'
)]
class User implements  UserInterface,PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Ce champ ne peut être vide !')]
    #[Assert\Regex(
        pattern: '/^[A-Z][a-z]{0,9}$/',
        message: 'Oops! Le nom utilisateur doit commencer par une lettre majuscule et ne doit pas excéder 10 caractères !',
        match: true
    )]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern: '/^[a-z0-9.-]+@[a-z0-9.-]{2,}\.[a-z]{2,4}$/',
        message: 'Oops! Le format de votre saisie est incorrect,merci de suivre le format requis : nomadressemail@domaine.extension',
        match: true,
    )]
    #[Assert\NotBlank(message:'Ce champ ne peut être vide !')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Ce champ ne peut être vide !')]
    private ?string $password = null;

    #[ORM\Column(type:'json')]
    private array $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_ADMIN';
        return array_unique($roles);
    }
    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }



    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
}
