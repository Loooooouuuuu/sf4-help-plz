<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 */
class Test
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TestParent", mappedBy="test")
     */
    private $testParents;

    public function __construct()
    {
        $this->testParents = new ArrayCollection();
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

    /**
     * @return Collection|TestParent[]
     */
    public function getTestParents(): Collection
    {
        return $this->testParents;
    }

    public function addTestParent(TestParent $testParent): self
    {
        if (!$this->testParents->contains($testParent)) {
            $this->testParents[] = $testParent;
            $testParent->setTest($this);
        }

        return $this;
    }

    public function removeTestParent(TestParent $testParent): self
    {
        if ($this->testParents->contains($testParent)) {
            $this->testParents->removeElement($testParent);
            // set the owning side to null (unless already changed)
            if ($testParent->getTest() === $this) {
                $testParent->setTest(null);
            }
        }

        return $this;
    }
}
