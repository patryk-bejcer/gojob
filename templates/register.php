<?php require_once("libs/register.php"); ?>

<script>

  function setCompanyForm(){
    document.getElementById("company_register_form").style.display = "block";
    document.getElementById("seeker_register_form").style.display = "none";

        $('html,body').animate({
        scrollTop: $("#company_register_form").offset().top},
        'slow');

  }

  function setSeekerForm(){
    document.getElementById("company_register_form").style.display = "none";
    document.getElementById("seeker_register_form").style.display = "block";

    $('html,body').animate({
        scrollTop: $("#seeker_register_form").offset().top},
        'slow');

  }

  $('.datepicker').pickadate();

</script>


        <div class="container">
        <div class="col-12  col-md-6 offset-md-3 mb-5">

        <h3 class="text-center">Rejestracja</h3>
        <p class="text-center">Klikając poniższy przycisk wybierz jakiego typu konto chcesz utworzyc</p>

        <div class="row">
          <div class="col-12 col-xs-8 offset-xs-3" style="margin: auto; display: block; text-align: center;">
            <button class="btn btn-primary" onclick="setCompanyForm()">Konto pracodawcy</button>
            <button class="btn btn-success" onclick="setSeekerForm()">Konto kandydata</button>
          </div>
        </div>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger mt-4" role="alert">
                <?php foreach($errors as $field => $msg) : ?>
                  <?php echo $msg; ?> <br/>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

                       
        <!-- Form register Company -->
        <form action="" method="POST" class="mt-4" id="company_register_form">
            <p class="h5 text-center mb-4">Rejestrujesz się jako pracodawca.</p>

            <input type="hidden" name="user_type" value="2">

            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="company_name">
                <label for="orangeForm-name">Nazwa działalności</label>
            </div>
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="text" id="orangeForm-email" class="form-control" name="email" value="<?php echo $email; ?>">
                <label for="orangeForm-email">Adres Email</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="orangeForm-pass" class="form-control" name="password">
                <label for="orangeForm-pass">Hasło</label>
            </div>
            <div class="md-form">
                <i class="fa fa-phone prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="contact_number">
                <label for="orangeForm-name">Numer telefonu</label>
            </div>
            <div class="md-form">
                <i class="fa fa-globe prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="company_website">
                <label for="orangeForm-name">Adres strony WWW</label>
            </div>


           <div class="md-form">
            <i class="fa fa-pencil prefix grey-text"></i>
            <textarea type="text" id="form7" class="md-textarea" name="company_description"></textarea>
            <label for="form7">Krótki opis działalności</label>
        </div>

        <div class="checkbox pb-3" style="text-align: center;">
          <label style="font-size:13px;"><input name="accept" type="checkbox" value="" style="padding-right: 5px; "> Wyrażam zgodę na przetwarzanie danych osobowych.</label> 
        </div>

            <div class="text-center">
               <input type="submit" name="submit"  class="btn btn-deep-orange" value="Zarejestruj się">
            </div>

        </form>
        <!-- Form register Company  -->
   


        <!-- Form register Seeker -->
        <form action="" method="POST" class="mt-3" id="seeker_register_form" style="display: none;">
            <p class="h5 text-center mb-4">Rejestrujesz się jako kandydat.</p>

            <input type="hidden" name="user_type" value="1">

            <div class="md-form">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="first_name">
                <label for="orangeForm-name">Imie</label>
            </div>
            <div class="md-form">
                <i class="fa fa-id-card-o prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="last_name">
                <label for="orangeForm-name">Nazwisko</label>
            </div>
            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="text" id="orangeForm-email" class="form-control" name="email" value="<?php echo $email; ?>">
                <label for="orangeForm-email">Adres Email</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="orangeForm-pass" class="form-control" name="password">
                <label for="orangeForm-pass">Hasło</label>
            </div>
            <div class="md-form">
                <i class="fa fa-phone prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="contact_number">
                <label for="orangeForm-name">Numer telefonu</label>
            </div>
            <div class="md-form">
                <i class="fa fa-usd prefix grey-text"></i>
                <input type="text" id="orangeForm-name" class="form-control" name="current_salary">
                <label for="orangeForm-name">Oczekiwane zarobki</label>
            </div>
            <div class="md-form" style = "display: none">
              <i class="fa fa-usd prefix grey-text" style="position: relative;"></i>
              <!-- <i class="fa fa-phone prefix grey-text"></i> -->
              <select class="custom-select" name="currency" style="width: 85%">
                  <option value="" disabled selected>Waluta</option>
                  <option value="PLN">PLN</option>
                  <option value="EUR">EUR</option>
                  <option value="CZK">CZK</option>
                  <option value="CHF">CHF</option>
              </select> 
            </div>



        <div class="checkbox pb-3" style="text-align: center;">
          <label style="font-size:13px;"><input name="accept" type="checkbox" value="" style="padding-right: 5px; "> Wyrażam zgodę na przetwarzanie danych osobowych.</label> 
        </div>

            <div class="text-center">
               <input type="submit" name="submit"  class="btn btn-deep-orange" value="Zarejestruj się">
            </div>


        </form>
        <!-- Form register Seeker  -->             

        <!-- SEEKER FORM -->


    </div>
    </div><!-- /container -->