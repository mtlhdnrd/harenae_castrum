<?php
    function calculate_price($hostility, $landable, $participants) {
        $price = $hostility * $participants;
        if($landable == 0) {
            $price *= 1.2;
        }
        return $price;
    }
