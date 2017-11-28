<?php include "site/header.php" ?>


<!-- Page Content -->
<div class="container">


    <div class="row">

        <?php include "site/sidebar.php" ?>

        <div class="col-lg-9">
            <div class="row">

                <!-- Register begins ==================-->
                <div class="container">
                    <div class="mb-5 py-4 mx-auto" style="width: 75%;">
                        <h1 class="text-center mb-4">Create an account</h1>

                        <form action="php/register.php" method="post" >
                            <div>
                                <label style="margin-bottom: 0"
                                    for="Email">Email:<sup class="warn">*</sup></label><br>
                                <input type="email" class="form-control"
                                       id="Email" name="email" placeholder="Email" required><br>
                            </div>
                            <div>
                                <label style="margin-bottom: 0"
                                    for="Password">Password:<sup class="warn">*</sup></label><br>
                                <input type="password" class="form-control"
                                       id="Password" name="password_1"
                                       placeholder="Enter your password" required><br>
                            </div>
                            <div>
                                <label style="margin-bottom: 0"
                                    for="Password">Confirm Password:
                                    <sup class="warn">*</sup> </label><br>
                                <input type="password" class="form-control"
                                       id="Password2" name="password_2"
                                       placeholder="Re-enter your password" required><br>
                            </div>
                            <div>
                                <label style="margin-bottom: 0"
                                    for="Name">Name:</label><br>
                                <input type="text" class="form-control"
                                       id="Name" name="name"
                                       placeholder="Name"><br>
                            </div>
                            <div>
                                <label style="margin-bottom: 0"
                                    for="Number">Phone Number:</label><br>
                                <input type="text" class="form-control"
                                       id="Number" name="number"
                                       placeholder="Contact Number"><br>
                            </div>

                            <input type="submit" class="btn btn-large btn-primary"
                                   value="Register">
                            <sup class="warn">*</sup>Required field
                        </form>
                    </div>
                </div>


                <!-- Register ends ==============================-->

            </div>
            <div class="my-5"></div>
        </div>
    </div>
</div>

<?php include "site/footer.php" ?>
