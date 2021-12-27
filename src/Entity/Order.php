<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=50, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=TvaRate::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tvaRate;

    /**
     * @ORM\OneToOne(targetEntity=Cart::class, inversedBy="orders", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity=State::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity=MeansPayment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $meansPayment;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getTvaRate(): ?TvaRate
    {
        return $this->tvaRate;
    }

    public function setTvaRate(?TvaRate $tvaRate): self
    {
        $this->tvaRate = $tvaRate;

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getMeansPayment(): ?MeansPayment
    {
        return $this->meansPayment;
    }

    public function setMeansPayment(?MeansPayment $meansPayment): self
    {
        $this->meansPayment = $meansPayment;

        return $this;
    }
}
