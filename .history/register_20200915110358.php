

<?=template_header("Registracija")?>
<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Registracija</h1>
                    </div>
                        <form method="post" action="./index.php?page=src/inc/register.inc" class="content">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="username">Uporabniško ime<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Uporabniško ime" pattern=".{4,}" data-limit=120 required>
                                        <span class="hint">Ime mora biti dolgo vsaj 4 znake.</span>
                                        <span clas="countdown"></span>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="email">Elektronska pošta<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Elektronska pošta" data-limit=120 required>
                                        <span clas="countdown"></span>
                                    </div><!-- col-md-6 -->
                                </div><!-- form-group row -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="password">Geslo<span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="password" pattern=".{8,}" class="form-control" name="password" id="password" placeholder="Geslo" data-limit=120 required>
                                        <span class="hint">Geslo mora vsebovati najmanj 8 znakov!</span>
                                        <span clas="countdown"></span>
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

                    <div class="card-footer">
                        Že imate račun? Prijavite se: <a href="./index.php?page=login">Prijava</a>.
                    </div><!-- card-footer -->
                </div><!-- card user-form -->
            </div><!-- col-sm-8 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div><!-- container -->


<script>
    $(document).ready(function () {
    $('input').on("propertychange keyup input paste",

    function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
            $(this).val($(this).val().substring(0, limit));
        }
        $('span.countdown').next().text('Na voljo je še: ' + (remainingChars<=0?0:remainingChars) + ' znakov.');
    });
});
</script>

<script>
    function countChar(val) {
        var len = val.value.length;
        if (len >= 256) {
            val.value = val.value.substring(0, 255);
        } else {
            $('#charNum').text('Na voljo je še: ' + (255 - len) + ' znakov.');
        }
    };
</script>