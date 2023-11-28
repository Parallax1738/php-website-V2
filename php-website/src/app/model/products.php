<?php

namespace bikeshop\app\model;
use bikeshop\app\model\productEntity;
class products extends databaseConnect
{
    protected function getProducts(int $catId) : array
    {
        $this->connect();

        $sql = "SELECT * FROM PRODUCT WHERE CATEGORY_ID = ?";
        $prepare = $this->connection->prepare($sql);
        $prepare->bind_param('i', $catId);

        $result[] = [];
        if ($prepare->execute())
        {
            $prepare->bind_result($id, $category_id, $name, $image, $description, $price);
            while ($prepare->fetch())
            {
                $result[] = new ProductEntity($id, $category_id, $name, $image, $description, $price);
            }
        }
        return $result;
    }
}