

<?=template_header("Registracija")?>
<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Registracija</h1>
                    </div>
                        <form method="post" action="./index.php?page=src/inc/register.inc" class="content my-form">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="username">Uporabniško ime<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Uporabniško ime" pattern=".{4,}" required>
                                        <span class="hint">Ime mora biti dolgo vsaj 4 znake.</span>
                                       
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="email">Elektronska pošta<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Elektronska pošta" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="password">Geslo<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" pattern="(?=.*\d).{8,}" class="form-control" name="password" id="password" placeholder="Geslo" data-limit=255 required>
                                        <span class="hint" id="minCharLenght">Geslo mora vsebovati najmanj 8 znakov!</span><br/>
                                        <span class="hint" id="bigChar">Vsebovati mora veliko črko [A-Ž],</span>
                                        <span class="hint" id="smallChar">malo črko [a-ž],</span>
                                        <span class="hint" id="numericChar">številko [0-9],</span>
                                        <span class="hint" id="specialChar">posebni znak [-_.,!?#&].</span>
                                        
                                        
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="confirm_password">Potrdite geslo<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Potrdite geslo" required>
                                        <span id="message"></span>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                            </div>

                            <hr/>
                            <!-- PERSONAL DATA -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="fname">Ime<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Ime" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="lname">Priimek<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Priimek" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="phoneNumber">Telefonska številka</label>
                                    <div class="col-md-6">
                                        <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}">
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->

                                <div class="form-group row">
                                    <lable class="col-md-4 col-form-label text-md-right" for="address">Naslov<span class="required">*</span></lable>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Velika ulica, 4" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <lable class="col-md-4 col-form-label text-md-right" for="postalCode">Poštna številka<span class="required">*</span></lable>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="1000" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <lable class="col-md-4 col-form-label text-md-right" for="city">Mesto<span class="required">*</span></lable>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Ljubljana" required>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="country">Država<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <select name="country" id="country" class="form-control">
                                        <?php foreach (countries() as $item): ?>
                                            <option value="<?=$item['id']?>"><?=$item['country']?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                            </div>

                            <div class="col-md-6 offset-md-4 float-right float-sm-right">
                                <button type="submit" name="Submit" class="btn btn-primary" id="reg_btn">Registracija</button>
                            </div><!-- col-md-4 offset-md-4 float-right float-sm-right -->

                        </form>
                    </div><!-- card-body -->

                    <script src="./src/js/pass-match.js"></script>

                    <div class="card-footer">
                        Že imate račun? Prijavite se: <a href="./index.php?page=login">Prijava</a>.
                    </div><!-- card-footer -->
                </div><!-- card user-form -->
            </div><!-- col-sm-8 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div><!-- container -->

<script>
    $('#password').on('keyup', function () {
        console.log("hello");
        var upperCase= new RegExp('[A-Z]');
        var lowerCase= new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var specialChar = new RegExp('[-_.,!?#&]');

        if($('#password').val().length >= 8){
            console.log($('#password').val().length);
            $('#minCharLenght').css('color', 'green');
        }
        else{
            $('#minCharLenght').css('color', 'red');
        }

        if($('#password').val().match(upperCase) ){
            $('#bigChar').css('color', 'green');
        }
        else{
            $('#bigChar').css('color', 'red');
        }

        if($('#password').val().match(lowerCase)){
            $('#smallChar').css('color', 'green');
        }
        else{
            $('#smallChar').css('color', 'red');
        }

        if($('#password').val().match(numbers)){
            $('#numericChar').css('color', 'green');
        }
        else{
            $('#numericChar').css('color', 'red');
        }

        if($('#password').val().match(specialChar)){
            $('#specialChar').css('color', 'green');
        }
        else{
            $('#specialChar').css('color', 'red');
        }
    });
</script>

<!--
<script>
    $(document).ready(function () {
    $('input').on("propertychange keyup input paste",

    function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
            $(this).val($(this).val().substring(0, limit));
        }
        $(this).next().text('Na voljo je še: ' + (remainingChars<=0?0:remainingChars) + ' znakov.');
    });
});
</script>
-->

<script>
    $('#password').on('keyup', function(){
        var string = $(this).val(); 

    if (/[a-z]/.test(str)) {
        console.log(string);
    }
    });
</script>