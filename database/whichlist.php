<?php


class whichlist
{
    public function check($productId, $uniqueId)
    {
        $databaseFN = new database();
        $databaseFN->getData('whichlist', "*", null, " productId = $productId AND uniqueId = '$uniqueId'");
        $whichlistResult = $databaseFN->getResult();
        $whichlistResultCount = count($whichlistResult);
        if ($whichlistResultCount > 0) {
            echo "<a href='" . basename($_SERVER['PHP_SELF']) . "?id=" . $productId . "&whichlist=remove'><i class='fa-solid fa-heart'></i></a>";
        } else {
            echo "<a href='" . basename($_SERVER['PHP_SELF']) . "?id=" . $productId . "&whichlist=add'><i class='fa-regular fa-heart'></i></a>";
        }
    }
    public function add($productId, $uniqueId)
    {
        $databaseFN = new database();
        $whichlistarr = ['uniqueId' => $uniqueId, 'productId' => $productId];
        if ($databaseFN->insertData('whichlist', $whichlistarr)) {
            return true;
        } else {
            return false;
        }
    }
    public function remove($productId, $uniqueId)
    {
        $databaseFN = new database();
        if ($databaseFN->deleteData('whichlist', " uniqueId = '$uniqueId' AND productId = $productId")) {
            return true;
        } else {
            return false;
        }
    }
}
