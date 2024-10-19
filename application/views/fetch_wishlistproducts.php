<?php
if ($wishlist) {
    foreach ($wishlist as $row) {
        $products_image = getSingleRowById('product_image', ['product_id' => $row['product_id']]);
        $variant_list = getRowByMoreId('product_variant', ['product_id' => $row['product_id']]);
        $details = getSingleRowById('product', ['product_id' => $row['product_id']]);
        $ss = 'new';
        echo '<div class="col">';
        product($details, 'new');
        echo '</div>';
?>       
<?php
    }
} else {
    echo 'No product in Wishlist';
}
?>