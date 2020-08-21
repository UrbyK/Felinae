<?php

?>

<?=template_header("Product_insert")?>

<div class="my-form">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card user-form">
                <div class="card-header">
                    <h1 class="card-title">Vnesi produkt</h1>
                </div>
                <div class="card-body">
                    <form method="post" class="content">
                        <h2 class="segmant-name">Opis izdelka</h2>
                        <hr/>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-left" for="title">Naslov*</label>
                            <div class="col">
                                <input type="text" class="form-control" name="title" for="title" id="title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-left" for="summary">Povzetek</label>
                            <div class="col">
                                <textarea type="text" class="form-control" name="summary" id="summary" maxlength="255" placeholder="Povzetek je lahko dolg 255 znakov!"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-left" for="description">Opis</label>
                            <div class="col">
                                <textarea type="text" class="form-control" name="description" id="description"></textarea>
                            </div>                                
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="weight">Teža</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="weight" id="weight" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="length">Dolžina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="length" id="length" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="width">Širina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="width" id="width" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="depth">Globina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="depth" id="depth" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                            
                        <h2 class="segmant-name">Datumi</h2>
                        <hr/>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-12 col-form-label text-md-left" for="publishedAt">Datum objave</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="publishedAt" id="publishedAt">
                                    <script>
                                        function() {
                                        jQuery("#"+this.publishedAt+" .InputText").flatpickr();
                                        };
                                    </script>
                                </div>
                            </div>
                        </div>

                        <h2 class="segmant-name">Količine</h2>
                        <hr/>
                        <div class="row">

                            <div class="form-group col-sm-4">
                                <label class="col-12 col-form-label text-md-left" for="sku">Skladišče*</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="sku" id="sku">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="col-12 col-form-label text-md-left" for="quantity">Količina</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                    <span class="hint">Če ni vnosa je isto kot količina skladišče.</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

