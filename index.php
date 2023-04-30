<?php

// Basic OOP Exercises

class Calculator
{
    public function add($number1, $number2)
    {
        if(! is_numeric($number1) || ! is_numeric($number2))
        {
            return "Both values should be numeric";
        }
        

        return $number1 + $number2;

        
    }
    
    public function subtract($number1, $number2)
    {
        if(! is_numeric($number1) || ! is_numeric($number2))
        {
            return "Both values should be numeric";
        }
        
        return $number1 - $number2;
        
    }
    
    public function multiply($number1, $number2)
    {
    
    if(! is_numeric($number1) || ! is_numeric($number2))
        {
            return "Both values should be numeric";
        }
        
        return $number1 * $number2;
    }
    
    public function divide($number1, $number2)
    {
    
        if(! is_numeric($number1) || ! is_numeric($number2))
        {
            return "Both values should be numeric";
        }
        
        if($number2 == 0)
        {
        
            return "Both values should be numeric and divisor shouldn't be zero";
        
        }
        
        return $number1 / $number2;
    
    }
    
}

$calc = new Calculator();
echo "<h1> Basic OOP Exercises (Calculator)</h1>";
echo "<hr>";
echo($calc->add(5,5));
echo "<br>";
echo($calc->subtract('a',3));
echo "<br>";
echo($calc->multiply(3,5));
echo "<br>";
echo($calc->divide(10, 0));
echo "<br>";

?>

<?php

    // Data Encapsulation Exercises

// First Exercise
class CreditCard
{
    const CARDNUMBER = "1111222233334444";
    private $totalBalance = 1000;
    private $pinNumber = "1234";
    
    public function getCardnumber()
    {
        return self::CARDNUMBER;
    }
    
    public function getTotalBalance()
    {
        return $this->totalBalance;
    }
    
    private function setTotalBalance($balance)
    {
        $this->totalBalance = $balance;
    }
    
    public function setPin($newPin)
    {
        
        if (preg_match("/^[1-9]\d{3}$/", $newPin))
        {
            $this->pinNumber = $newPin;
        }
        else
        {
            return "Pin number should be a string of 4 digits and first digit should not be zero.";
        }
        
    }
    
    public function getPin()
    {
        return $this->pinNumber;
    }
    
    public function shopping($cardNumber, $pinNumber, $spendingMoney)
    {
        if($cardNumber !== $this->getCardnumber() || $pinNumber !== $this->getPin())
        {
            return "Your card number or pin is invalid.";
        }
        
        if($spendingMoney > $this->getTotalBalance())
        {
            return  "You dont have enough balance in your account.";
        }
        
        $remBalance = $this->getTotalBalance() - $spendingMoney;
        $this->setTotalBalance($remBalance);
        
        return  "You have spend $spendingMoney pounds and your remaing balance is $remBalance.";
        
    }
    
}

echo "<h1> Data Encapsulation Exercises (Credit Card 1)</h1>";
echo "<hr>";

$mycard = new CreditCard();

$mycard->setPin(5678);

echo($mycard->shopping("1111222233334444", 5678, 100));

echo "<h1> Data Encapsulation Exercises (Credit Card 2)</h1>";
echo "<hr>";


// Second Exercise
class CreditCard1
{
    
    const CARDNUMBER = "1111222233334444";
    private $totalBalance = 1000; 
    private $pinNumber =  "1234";
    
    public function getCardnumber()
    {
        return self::CARDNUMBER;
    }
    
    public function getTotalBalance()
    {
        return $this->totalBalance;
    }
    
    private function setTotalBalance($balance)
    {
        $this->totalBalance = $balance;
    }
    
    public function setPin($newPin)
    {
        if( preg_match( "/^[1-9]\d{3}$/", $newPin ))
        {
            $this->pinNumber = $newPin;
        }
        else
        {
            return "Pin number should be a string of 4 digits and first digit should not be zero.";
        }
    }
    
    public function getPin()
    {
        return $this->pinNumber;
    }
    
    public function withdrawMoney($cardNumber, $pinNumber, $withdrawMoney)
    {
        $withdrawMoney += $withdrawMoney * (0.03);
        
        if($cardNumber!==$this->getCardnumber() || $pinNumber!== $this->getPin())
        {
            return "Your card number or pin is invalid.";
        }
        
        if($withdrawMoney > $this->getTotalBalance())
        {
            return "You dont have enough balance in your account.";
        }
        
        $remBalance = $this->getTotalBalance() - $withdrawMoney;
        
        $this->setTotalBalance($remBalance);
        
        return "You have withdrawn $withdrawMoney  pounds and your remaing balance is $remBalance.";
        
    }
    
}

$mycard = new CreditCard1();
$mycard->setPin('5678');
echo($mycard->withdrawMoney("1111222233334444", "5678", 970));




?>