
<?=template_header("Registracija")?>

<div class="my-form">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card user-form">
                <div class="card-header">
                    <h1 class="card-title">Registracija</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="./register-personal.php" class="content">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="username">Uporabniško ime</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Uporabniško ime" pattern=".{4,}" required>
                                <span class="hint">Ime mora biti dolgo vsaj 4 znake!</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="email">Elektronska pošta</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Elektronska pošta" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="password">Geslo</label>
                            <div class="col-md-6">
                                <input type="password" pattern=".{8,}" class="form-control" name="password" id="password" placeholder="Geslo" required>
                                <span class="hint">Geslo mora vsebovati najmanj 8 znakov!</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="confirm_password">Potrdite geslo</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Potrdite geslo" required>
                                <span id="message"></span>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" name="reg_btn" class="btn btn-primary" id="reg_btn" disabled="true">Naprej</button>
                        </div>

                    </form>
                </div>

                <script src="./js/pass-match.js"></script>

                <div class="card-footer">
                    Že imate račun? Prijavite se: <a href="./index.php?page=login">Prijava</a>.
                </div>
            </div>
        </div>
    </div>
</div>