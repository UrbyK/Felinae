<?=template_header("Login")?>

<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Prijava</h1>
                    </div><!-- card-title -->
                    <div class="card-body">
                        <form method="post" action="./index.php?page=src/inc/login.inc" class="content">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="username">Uporabnik</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Uporabnik/elektronski naslov" required>
                                </div><!-- col-md-6 -->
                            </div><!-- form-group row -->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="password">Geslo</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Geslo" required>
                                </div><!-- col-md-6 -->
                            </div><!-- form-group row -->

                            <div class="col-md-6 offset-md-4 float-right float-sm-right">
                                <button type="submit" name="Submit" class="btn btn-primary" value="Vpiši se">Prijava</button>
                            </div><!-- col-md-6 offset-md-4 float-right float-sm-righ -->

                        </form>
                    </div><!-- card-body -->
                    <div class="card-footer">
                        Nimate računa? Ustvarite ga: <a href="./index.php?page=register-user">Registracija</a>
                    </div><!-- card-footer -->
                </div><!-- card user-form -->
            </div><!-- col-sm-8 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div><!-- container -->