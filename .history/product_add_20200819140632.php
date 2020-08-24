<?php

?>

<?=template_header("Product_insert")?>

<div class="product-form">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card user-form">
                <div class="card-header">
                    <h1 class="card-title">Vnesi produkt</h1>
                </div>
                <div class="card-body">
                    <form method="post" class="content">
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right" for="title">Naslov</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" for="title" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right" for="summary">Povzetek</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="summary" for="summary" id="summary" maxlength="255" placeholder="Povzetek je lahko dolg 255 znakov!">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-4 col-form-label text"
                            <div clas="col-md-6">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

