<?php
class Card
{
    
    public $reg, $reg2, $luna, $space;
    function __construct($reg =  '/^5[1-5][0-9]{10}|6[27][0-9]{10}$/u', $reg2 = '/^4[0-9][0-9]{10}|14[0-9]{10}$/u', $luna = 0,  $space = '/\\s/u'){
     $this->reg = $reg;
     $this->reg2 = $reg2 ;
     $this->luna = $luna;
     $this-> space = $space;
    
}

    
    public function validate($number) {
        
        $number = preg_replace($this->space, '', $number);
        

        for ($a = 0; $a < strlen($number); $a++){
        if ($a%2 == 0) {
            $b = $number[$a]*2;
            $b = (string)$b;
            if (strlen($b) == 2){
                $this->luna += (int)$b[0];
                $this->luna += (int)$b[1];
            
            }
            else {
                $this->luna += $b;
            }  
            
        }
        else {
            $this->luna += $number[$a];
        } 
            
        }
        if ($this->luna%10 == 0 && preg_match($this->reg, $number)){
            
            echo 'валидная, MasterCard';
        }
        elseif ($this->luna%10 == 0 && preg_match($this->reg2, $number)){
            echo 'валидная, Visa';
        }
        elseif ($this->luna%10 == 0){
            echo 'валидная, название эмитента не определено';
        }
        else {
            echo 'невалидна';
        } 
        
    }
}
