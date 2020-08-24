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
                            <label class="col-md-4 col-form-label text-md-left" for="title">Naslov</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" for="title" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-left" for="summary">Povzetek</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="summary" id="summary" maxlength="255" placeholder="Povzetek je lahko dolg 255 znakov!">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-left" for="description">Opis</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" id="description">
                            </div>                                
                        </div>

                        <div class="row">

                            <div class="form-group col-sm-2">
                                <label class="col-md-4 col-form-label text-md-left" for="sku">Skladišče</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="sku" id="sku">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <label class="col-md-4 col-form-label text-md-left" for="quantity">Količina</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

