<?php

class checkout extends User{

    private $price;
    private $total

    function __checkout($n,$id,$add,$em,$pn,$un,$pass,$price,$total)
    {
        parent::__User($n,$id,$add,$em,$pn,$un,$pass);
        $this->price = $price;
        $this->total = $total;

        function setPrice($price)
        {
            $this->price = $price;
        }
        function getPrice()
        {
            return $this->peice;
        }

        function setTotal($total)
        {
            $this->total = $total;
        }
        function getTotal()
        {
            return $this->total;
        }

        function userDetails()
        {
            return "parent::userDetails() + Price: $this->price\n $this->total"; 
        }
    }


}

?>