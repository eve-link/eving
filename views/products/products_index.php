<nav class="shop-nav-top">
    <ul class="nav-top">
        <li><a class="active">Kõik tooted</a></li>
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">Lorem ipsum</a></li>
        <li><a href="#">Lorem ipsum</a></li>
    </ul>
</nav>
<div class="shop-content">
    <div class="shop-content1">
        <? foreach ($products as $product): ?>
            <div class="shop-img1"><img
                    src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTa77sWRyddHTU6EtueoXDVIvydmCfi34-S_OnvsI-6ViAw_29Z"
                    alt="Tootepilt">

                <h1><a href="products/view/<?= $product['product_id'] ?>"><?= $product['product_name'] ?></a></h1>

                <p><?= $product['product_price'] ?></p>
            </div>
        <? endforeach ?>
    </div>

</div>
</div>