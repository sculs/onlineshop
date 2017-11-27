
<div class="container">

<!--    <!-- Button to Open the Modal -->
<!--    <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#checkOutCart">-->
<!--        Open modal-->
<!--    </button>-->

    <!-- The Modal -->
    <div class="modal fade" id="checkOutCart">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Check out</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php

                    echo 'All items that have added into cart';
                    ?>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                        Continue shopping
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-success"
                            data-dismiss="modal">PAY</button>
                </div>

            </div>
        </div>
    </div>

</div>

</body>
</html>
