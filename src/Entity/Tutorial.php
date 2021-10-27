<?php

namespace App\Entity;

use App\Repository\TutorialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TutorialRepository::class)
 */
class Tutorial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $surname;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

        /**
     * @ORM\Column(type="string", length=60)
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
    public function getCountry(): ?string
    {
        return $this->country;
    }
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
