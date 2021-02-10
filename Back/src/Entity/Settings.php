<?php

namespace App\Entity;

use App\Repository\SettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingsRepository::class)
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $backgroundMenuGauche;

    /**
     * @ORM\Column(type="text")
     */
    private $backgroundMenuHaut;

    /**
     * @ORM\Column(type="text")
     */
    private $colorTextBody;

    /**
     * @ORM\Column(type="text")
     */
    private $backgroundBody;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackgroundMenuGauche(): ?string
    {
        return $this->backgroundMenuGauche;
    }

    public function setBackgroundMenuGauche(string $backgroundMenuGauche): self
    {
        $this->backgroundMenuGauche = $backgroundMenuGauche;

        return $this;
    }

    public function getBackgroundMenuHaut(): ?string
    {
        return $this->backgroundMenuHaut;
    }

    public function setBackgroundMenuHaut(string $backgroundMenuHaut): self
    {
        $this->backgroundMenuHaut = $backgroundMenuHaut;

        return $this;
    }

    public function getColorTextBody(): ?string
    {
        return $this->colorTextBody;
    }

    public function setColorTextBody(string $colorTextBody): self
    {
        $this->colorTextBody = $colorTextBody;

        return $this;
    }

    public function getBackgroundBody(): ?string
    {
        return $this->backgroundBody;
    }

    public function setBackgroundBody(string $backgroundBody): self
    {
        $this->backgroundBody = $backgroundBody;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
