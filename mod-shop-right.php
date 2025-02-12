<div class="sidebar wow fadeInUp" data-wow-duration="0.4s">
    <div class="shop__sidebar">
        <h5>Filter</h5>
        <hr>
        <div class="shop__sidebar-single">
            <div class="shop__sidebar-head">
                <button>
                    Search
                    <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="shop__sidebar-content">
                <form action="#" method="post">
                    <div class="search_form">
                        <input type="text" name="post-search" id="postSearch"
                               placeholder="Search">
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="shop__sidebar-single">
            <div class="shop__sidebar-head">
                <button>
                    Location map
                    <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="shop__sidebar-content">
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-map-location" style="margin-top: 10px;"></i></a>
            </div>
        </div>

        <hr>
        <div class="shop__sidebar-single">
            <div class="shop__sidebar-head">
                <button>
                    Age
                    <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="shop__sidebar-content">
                <div class="price-range-slider text-center">
                    <p style="color: red" id="i_resrange">18</p>
                    <input type="range" id="amount" readonly 
                           style="width: 100%"  min="5" max="110" value="18" step="1">
                </div>
            </div>
        </div>

        <hr>
        <div class="shop__sidebar-single">
            <div class="shop__sidebar-head">
                <button>
                    Clubs
                    <i class="fa-solid fa-angle-down"></i>
                </button>
            </div>
            <div class="shop__sidebar-content">
                <form action="#" method="post" id="filter">
                    <input type="hidden" name="dato_0" value="1">
                    <div class="category__form" style="margin-left: 10px; margin-top: 5px;">
                        <?php
                        while ($categoria = $detcate->fetch_assoc()) {
                            ?>
                            <li class="category__form-single">
                                <label for="productAccessories" 
                                       style="font-weight: 500; padding-bottom: 10px; margin-top: 15px;"><?php echo $categoria['nombre_categoria'] ?></label>
                            </li>
                            <?php
                            $detsubcate = $fnindex->fnindex_rcategoria_xidcategoriapadre($categoria['id_categoria']);
                            if ($detsubcate->num_rows > 0) {
                                ?>
                                <ul>
                                    <?php
                                    while ($subcategoria = $detsubcate->fetch_assoc()) {
                                        ?>
                                        <li class="category__form-single">
                                            <input onchange="cnindex_f1()" value="<?php echo $subcategoria['id_categoria'] ?>" type="checkbox" name="categories[]"
                                                   id="productAccessories" >
                                            <label for="productAccessories"><?php echo $subcategoria['nombre_categoria'] ?></label>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>