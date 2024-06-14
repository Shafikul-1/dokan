<?php


class cart
{
    // cart product add
    public function cart($productId, $uniqueId)
    {
        $databaseFN = new database();
        if ($databaseFN->getData("cart", "*", null, " productId = $productId  AND uniqueId = '$uniqueId'")) {
            $result = $databaseFN->getResult();
            $qty = 1;
            $collectData = ['uniqueId' => $uniqueId, "productId" => $productId, "Qty" => $qty];

            // result 0 thake besi ki na?
            if (count($result) > 0) {
                return false;

                // Current User cart tabel exist then update qty
                // if ($databaseFN->incrementOrDecrement("cart", $increment, " productId = $productId AND uniqueId = '$uniqueId'", "+")) {
                //     return true;
                // } else {
                //     return false;
                // }
            } else {

                // Current User Does not cart tabel exist then insert data
                if ($databaseFN->insertData("cart", $collectData)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    // product increment
    public function increment($productId, $uniqueId, $incrementVal)
    {
        $databaseFN = new database();
        $increment =  ['Qty' => $incrementVal];
        if ($databaseFN->incrementOrDecrement("cart", $increment, " productId = $productId AND uniqueId = '$uniqueId'", "+")) {
            return true;
        } else {
            return false;
        }
    }

    // product qty decrement
    public function decrement($productId, $uniqueId, $decrementVal)
    {
        $databaseFN = new database();
        $decrement =  ['Qty' => $decrementVal];
        if ($databaseFN->incrementOrDecrement("cart", $decrement, " productId = $productId AND uniqueId = '$uniqueId'", "-")) {
            return true;
        } else {
            return false;
        }
    }
}
