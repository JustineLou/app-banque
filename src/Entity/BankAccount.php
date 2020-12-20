<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Beneficiary;
use App\Repository\BankAccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BankAccountRepository::class)
 */
class BankAccount
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=34)
     */
    private $IBAN;

    /**
     * @ORM\Column(type="float")
     */
    private $InitialBalance;



    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bankAccounts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=UserBankAccount::class, mappedBy="bankaccount")
     */
    private $BankAccountOwner;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="debitedAccount")
     */
    private $debit;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="creditedAccount")
     */
    private $credit;

    public function __construct()
    {
        $this->BankAccountOwner = new ArrayCollection();
        $this->debit = new ArrayCollection();
        $this->credit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIBAN(): ?string
    {
        return $this->IBAN;
    }

    public function setIBAN(string $IBAN): self
    {
        $this->IBAN = $IBAN;

        return $this;
    }

    public function getInitialBalance(): ?float
    {
        return $this->InitialBalance;
    }

    public function setInitialBalance(float $InitialBalance): self
    {
        $this->InitialBalance = $InitialBalance;

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
    public function __toString(){
        return $this->IBAN;
    }

    /**
     * @return Collection|UserBankAccount[]
     */
    public function getBankAccountOwner(): Collection
    {
        return $this->BankAccountOwner;
    }

    public function addBankAccountOwner(UserBankAccount $bankAccountOwner): self
    {
        if (!$this->BankAccountOwner->contains($bankAccountOwner)) {
            $this->BankAccountOwner[] = $bankAccountOwner;
            $bankAccountOwner->setBankaccount($this);
        }

        return $this;
    }

    public function removeBankAccountOwner(UserBankAccount $bankAccountOwner): self
    {
        if ($this->BankAccountOwner->removeElement($bankAccountOwner)) {
            // set the owning side to null (unless already changed)
            if ($bankAccountOwner->getBankaccount() === $this) {
                $bankAccountOwner->setBankaccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getDebit(): Collection
    {
        return $this->debit;
    }

    public function addDebit(Transaction $debit): self
    {
        if (!$this->debit->contains($debit)) {
            $this->debit[] = $debit;
            $debit->setDebitedAccount($this);
        }

        return $this;
    }

    public function removeDebit(Transaction $debit): self
    {
        if ($this->debit->removeElement($debit)) {
            // set the owning side to null (unless already changed)
            if ($debit->getDebitedAccount() === $this) {
                $debit->setDebitedAccount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getCredit(): Collection
    {
        return $this->credit;
    }

    public function addCredit(Transaction $credit): self
    {
        if (!$this->credit->contains($credit)) {
            $this->credit[] = $credit;
            $credit->setCreditedAccount($this);
        }

        return $this;
    }

    public function removeCredit(Transaction $credit): self
    {
        if ($this->credit->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getCreditedAccount() === $this) {
                $credit->setCreditedAccount(null);
            }
        }

        return $this;
    }

}
