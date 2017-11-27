<?php include "header.php" ?>


<!-- Page Content -->
<div class="container">


    <div class="row">

        <?php include "sidebar.php" ?>

        <div class="col-lg-9">


            <div class="row">

                <!-- login ==================-->
                <div class="container">
                    <div class="my-5 py-5 mx-5">
                    <h1 class="text-center mb-5">Log in</h1>
                    <form action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="inputEmail-l">Email:<sup class="warn">*</sup></label>
                            <input type="email" class="form-control"
                                   id="inputEmail-l" placeholder="Enter email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="inputPassword-l">Password:<sup class="warn">*</sup></label>
                            <input type="password" class="form-control"
                                   id="inputPassword-l" placeholder="Enter password" name="password">
                        </div>

                        <div class="">
                            <input class="btn btn-large btn-success" type="submit"
                                   value="Sign in" />
                            <sup class="warn">*</sup>Required field
                        </div>
                    </form>
                    </div>
                </div>
                <!-- login ends ==============================-->

            </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
