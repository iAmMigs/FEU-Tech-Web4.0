<?php

namespace App\Entity;

use App\Repository\PaymentOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentOptionRepository::class)]
class PaymentOption
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $logoText = null;

    #[ORM\Column(length: 255)]
    private ?string $themeColor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $merchantName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $additionalInfo = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $importantReminders = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $instructionsImage = null;

    #[ORM\Column]
    private bool $isActive = true;

    #[ORM\Column]
    private bool $showComputation = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $computationFee = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $computationDivisor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $computationTotal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $computationProcessingFee = null;

    #[ORM\OneToMany(mappedBy: 'paymentOption', targetEntity: PaymentStep::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['stepNumber' => 'ASC'])]
    private Collection $steps;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

    public function getLogoText(): ?string
    {
        return $this->logoText;
    }

    public function setLogoText(string $logoText): static
    {
        $this->logoText = $logoText;
        return $this;
    }

    public function getThemeColor(): ?string
    {
        return $this->themeColor;
    }

    public function setThemeColor(string $themeColor): static
    {
        $this->themeColor = $themeColor;
        return $this;
    }

    public function getMerchantName(): ?string
    {
        return $this->merchantName;
    }

    public function setMerchantName(?string $merchantName): static
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    public function setAdditionalInfo(?string $additionalInfo): static
    {
        $this->additionalInfo = $additionalInfo;
        return $this;
    }

    public function getImportantReminders(): ?array
    {
        return $this->importantReminders;
    }

    public function setImportantReminders(?array $importantReminders): static
    {
        $this->importantReminders = $importantReminders;
        return $this;
    }

    public function getInstructionsImage(): ?string
    {
        return $this->instructionsImage;
    }

    public function setInstructionsImage(?string $instructionsImage): static
    {
        $this->instructionsImage = $instructionsImage;
        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return Collection<int, PaymentStep>
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(PaymentStep $step): static
    {
        if (!$this->steps->contains($step)) {
            $this->steps->add($step);
            $step->setPaymentOption($this);
        }
        return $this;
    }

    public function removeStep(PaymentStep $step): static
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getPaymentOption() === $this) {
                $step->setPaymentOption(null);
            }
        }
        return $this;
    }

    public function isShowComputation(): bool
    {
        return $this->showComputation;
    }

    public function setShowComputation(bool $showComputation): static
    {
        $this->showComputation = $showComputation;
        return $this;
    }

    public function getComputationFee(): ?string
    {
        return $this->computationFee;
    }

    public function setComputationFee(?string $computationFee): static
    {
        $this->computationFee = $computationFee;
        return $this;
    }

    public function getComputationDivisor(): ?string
    {
        return $this->computationDivisor;
    }

    public function setComputationDivisor(?string $computationDivisor): static
    {
        $this->computationDivisor = $computationDivisor;
        return $this;
    }

    public function getComputationTotal(): ?string
    {
        return $this->computationTotal;
    }

    public function setComputationTotal(?string $computationTotal): static
    {
        $this->computationTotal = $computationTotal;
        return $this;
    }

    public function getComputationProcessingFee(): ?string
    {
        return $this->computationProcessingFee;
    }

    public function setComputationProcessingFee(?string $computationProcessingFee): static
    {
        $this->computationProcessingFee = $computationProcessingFee;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'Payment Option';
    }
}
