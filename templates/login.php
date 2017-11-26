

<?php

    require_once("libs/login.php");

?>




    <div class="container">
        <div class="col-12 col-md-6 offset-md-3 mt-5 mb-5">

        <?php if (!empty($errors)) : ?>

        <div class="alert alert-danger mt-4" role="alert">


                <?php foreach($errors as $field => $msg) : ?>
                  <?php echo $msg; ?> <br/>
                <?php endforeach; ?>


        </div>

        <?php endif; ?>
            
        <!-- Form login -->
        <form method="POST" action="">
            <p class="h5 text-center mb-4">Zaloguj się</p>

            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="text" id="defaultForm-email" class="form-control" name="email" required>
                <label for="defaultForm-email">Twój email</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="defaultForm-pass" class="form-control" name="password" required>
                <label for="defaultForm-pass">Twoj hasło</label>
            </div>

            <div class="text-center">
               <input type="submit" name="submit"  class="btn btn-deep-orange" value="Zaloguj się">
            </div>
        </form>
        <!-- Form login -->
    </div>
    </div><!-- /container -->