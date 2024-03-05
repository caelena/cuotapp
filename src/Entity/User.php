<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'app_user')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 15, unique: true)]
    private ?string $userName;

    #[ORM\Column(type: 'string')]
    private ?string $password;

    #[ORM\OneToOne(targetEntity: Professional::class)]
    private ?Professional $professional;

    #[ORM\Column(type: 'boolean')]
    private ?bool $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(?string $userName): User
    {
        $this->userName = $userName;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getProfessional(): ?Professional
    {
        return $this->professional;
    }

    public function setProfessional(?Professional $professional): User
    {
        $this->professional = $professional;
        return $this;
    }

    public function isAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(?bool $admin): User
    {
        $this->admin = $admin;
        return $this;
    }

    public function getRoles()
    {
        $roles = ['ROLE_USER'];
        if ($this->isAdmin()) {
            $roles[] = 'ROLE_ADMIN';
        }
        if ($this->getProfessional()) {
            $roles[] = 'ROLE_PROFESSIONAL';
        }
        return array_unique($roles);
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // Don't do anything
    }

    public function getUserIdentifier(): string
    {
        return $this->getUserName();
    }
}