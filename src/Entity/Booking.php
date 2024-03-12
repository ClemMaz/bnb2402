<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column (length: 255) ]
    private ?string $ref = null; // valeur par défaut uuid

    #[ORM\Column]
    private ?int $guest = 0;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $voyager = null;

    #[ORM\ManyToOne(inversedBy: 'booking')]
    private ?Offer $offer = null;

    public function __construct()
    {
        $this->ref = uniqid('bnb_');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getGuest(): ?int
    {
        return $this->guest;
    }

    public function setGuest(int $guest): static
    {
        $this->guest = $guest;

        return $this;
    }

    public function getVoyager(): ?User
    {
        return $this->voyager;
    }

    public function setVoyager(?User $voyager): static
    {
        $this->voyager = $voyager;

        return $this;
    }
    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    public function setOffer(?Offer $offer): static
    {
        $this->offer = $offer;

        return $this;
    }



    /**
     * Get the value of ref
     */ 
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     *
     * @return  self
     */ 
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }
}
