<?php

class Account
{
    
    private $id;
    private $name;
    private $balance;

    
    public function __construct($id, $name, $balance = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance; 
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function getName()
    {
        return $this->name;
    }

    
    public function getBalance()
    {
        return $this->balance;
    }

    
    public function credit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this->balance;
    }

    
    public function debit($amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Amount exceeded balance<br>";
        }
        return $this->balance;
    }

    
    public function transferTo($anotherAccount, $amount)
    {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            $anotherAccount->credit($amount);
        } else {
            echo "Amount exceeded balance<br>";
        }
        return $this->balance;
    }

    
    public function __toString()
    {
        return "Account[id=" . $this->id . ", name=" . $this->name . ", balance=" . $this->balance . "]";
    }
}


$account1 = new Account("A001", "John Doe", 1000);
$account2 = new Account("A002", "Jane Smith", 500);

echo $account1 . "<br>"; 
echo $account2 . "<br>"; 

$account1->transferTo($account2, 300);

echo $account1 . "<br>"; 
echo $account2 . "<br>"; 
