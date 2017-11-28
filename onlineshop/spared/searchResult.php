<!---->
<!---->
<!---->
<!---->
<!--    while($row = mysqli_fetch_assoc($result)) {-->
<!---->
<!--        echo '-->
<!--        <div class="col-lg-4 col-md-6 mb-4">-->
<!--        <div class="card h-100 products">-->
<!--            <a href="#"><img class="card-img-top" -->
<!--            src="'.$row['link'].'" alt="'.$row['title'].'"></a>-->
<!--            -->
<!--            <div class="card-body">-->
<!--            -->
<!--                <div>-->
<!--                    <h4 class="card-title">-->
<!--                    <a href="#">'.$row['title'].'</a>-->
<!--                    </h4>-->
<!--                    <p style="font-size: 0.9rem">'.$row['description'].'</p>-->
<!--                </div> -->
<!--                <div class="mb-auto">-->
<!--                    <h6>'.$row['category'].'</h6>-->
<!--                    <h5 class="btn btn-outline-success">'.number_format($row['price']).' kr</h5>-->
<!--                </div>-->
<!--            </div>-->
<!--            -->
<!--            <div class="card-footer">-->
<!--                <div class="text-center">-->
<!--                -->
<!--                    <a href="../php/addToCart.php?productID='.$row['bookid'].'"-->
<!--                        class="btn btn-primary" >-->
<!--                        <span style="font-size: 25px">+</span>-->
<!--                        &nbsp;&nbsp;&nbsp;Add to Cart-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    ';-->
<!--    }-->
<!---->
<!---->
<!---->
<!---->
<!--//mysqli_close($connection);-->
<!---->
<!--//header('Location: index.html');-->
<!--?>-->
<!---->
<!--</body>-->
<!--</html>-->
