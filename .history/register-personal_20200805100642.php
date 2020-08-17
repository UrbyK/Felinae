<?php

    if(isset($_REQUEST['submit'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['confirm_password'] = $_POST['confirm_password'];
    }

?>


<?=template_header("Registracija")?>

<div class="my-form">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card user-form">
                <div class="card-header">
                    <h1 class="card-title">Registracija</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="./register.php" class="content">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="fname">Ime</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Ime" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="lname">Priimek</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="lname" id="lname" placeholder="Priimek" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="phone_number">Telefonska številka</label>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="000-000-000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required>
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