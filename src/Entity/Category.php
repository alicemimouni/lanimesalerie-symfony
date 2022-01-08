<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\CategoryRepository;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @UniqueEntity("name", message="La catégorie {{ value }} exite déjà")
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="parent", cascade={"remove"})
     */
    // cascade remove : delete child when parent is deleted
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="children")
     */
    private $parent;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="categories")
     */
    private $products;

    

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->products = new ArrayCollection();
       
    }


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

    public function __toString()
    {
        return $this->name;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        // unset the owning side of the relation if necessary
        if ($image === null && $this->image !== null) {
            $this->image->setCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($image !== null && $image->getCategory() !== $this) {
            $image->setCategory($this);
        }

        $this->image = $image;

        return $this;
    }

    public function getChildren(): ?string
    {
        return $this->children;
    }

    public function setChildren(string $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeCategory($this);
        }

        return $this;
    }

}
