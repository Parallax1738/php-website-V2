<?php

namespace bikeshop\app\model;

class viewProduct extends products
{
    public function showProducts($catId)
    {
        $datas = $this->getProducts($catId);
        foreach ($datas as $data) {
            if ($data instanceof ProductEntity) {
                echo '<div class="content">
                    <form method="post" action="/products">
                        <a href="">
                            <h3>' . $data->getName() . '</h3>
                            <img src="' . $data->getImage() . '">
                            <p>' . $data->getDescription() . '</p>
                            <h6>$' . $data->getPrice() . '</h6>
                        </a>
                        <input type="hidden" name="id" value="' . $data->getId() . '" />
                        <button type="submit" class="actionBtn">Add To Cart</input>
                        </form>
                    </div>';
            }
        }
    }
}