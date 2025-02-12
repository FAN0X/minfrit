<div class="shop--main__inner">
    <div class="row justify-content-center section__row" id="list_club">
      <?php while ($club = $listclub->fetch_assoc()) { ?>
        <div class="col-sm-10 col-md-4 col-xl-4 section__col">
            <div class="shop__card">
                <div class="shop__card-thumb">
                    <a href="club-detail.php?id=<?php echo $club['id_club'] ?>">
                        <img src="images/<?php echo $club['foto_club'] ?>" alt="Image">
                    </a>
                </div>
                <div class="shop__card-info">
                    <h5><a href="club-detail.php?id=<?php echo $club['id_club'] ?>"><?php echo $club['nombre_club'] ?></a></h5>
                    <p style="color: #000000"><?php echo $club['desc_club'] ?></p>
                </div>
                <div class="shop__card-review">
                    <i class="golftio-star"></i>
                    <i class="golftio-star"></i>
                    <i class="golftio-star"></i>
                    <i class="golftio-star"></i>
                    <i class="golftio-star"></i>
                </div>
                <div class="shop__card-cta">
                    <a href="club-detail.php?id=<?php echo $club['id_club'] ?>" class="cmn-button">Subscribe</a>
                </div>
            </div>
        </div>
      <?php } ?>
    </div>
<!--    <div class="row">
        <div class="col-12 justify-content-center section__cta">
            <ul class="pagination">
                <li>
                    <button><i class="fa-solid fa-angle-left"></i></button>
                </li>
                <li><a href="facility.html">1</a></li>
                <li><a href="facility.html">2</a></li>
                <li><a href="facility.html">3</a></li>
                <li><a href="facility.html">...</a></li>
                <li>
                    <button><i class="fa-solid fa-angle-right"></i></button>
                </li>
            </ul>
        </div>
    </div>-->
</div>