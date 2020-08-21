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
                                    <input type="number" clas="form-control" name="weight" id="weight" min="0" step="0.01" style="text-align:right;">kg
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="length">Dolžina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="length" id="length" min="0" step="0.01" style="text-align:right;">cm
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="width">Širina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="width" id="width" min="0" step="0.01" style="text-align:right;">cm
                                </div>
                            </div>
                            <div class="form-group col-12 col-sm-6 col-xl-3">
                                <label class="col-12 col-form-label text-md-left" for="depth">Globina</label>
                                <div class="col-12">
                                    <input type="number" clas="form-control" name="depth" id="depth" min="0" step="0.01" style="text-align:right;">cm
                                </div>
                            </div>
                        </div>
                            
                        <h2 class="segmant-name">Datumi</h2>
                        <hr/>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-12 col-form-label text-md-left" for="publishedAtDate publishedAtTime">Datum objave</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="publishedAt" id="publishedAtDate">
                                    <input type="time" class="form-control" name="publishedAt" id="publishedAtTime">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-12 col-form-label text-md-left" for="saleStartsAtDate saleStartsAtTime">Začetek popusta</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="saleStartsAtDate" id="saleStartsAtDate">
                                    <input type="time" class="form-control" name="saleStartsAtTime" id="saleStartsAtTime">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-12 col-form-label text-md-left" for="saleEndsAtDate saleEndsAtTime">Konec popusta</label>
                                <div class="col-12">
                                    <input type="date" class="form-control" name="saleEndsAtDate" id="saleEndsAtDate">
                                    <input type="time" class="form-control" name="saleEndsAtTime" id="saleEndsAtTime">
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

                        <h2 class="segmant-name">Cena</h2>
                        <hr/>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label class="col-12 col-form-label text-md-left" for="price" min="0">Cena</label>
                                <div class="col-10">
                                    <input type="number" class="form-control calc" name="price" id="price" min="0" step="0.01" style="text-align:right;">€
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="col-12 col-form-label text-md-left" for="discount">Popust</label>
                                <div class="col-10">
                                    <input type="number" class="form-control calc" name="discount" id="discount" min="0" style="text-align:right;">%
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label class="col-12 col-form-label text-md-left" for="discountPrice">Cena s popustom</label>
                                <div class="col-12">
                                    <input type="number" class="form-control calc" name="discountPrice" id="discountPrice" min="0" step="0.01" style="text-align:right;">€
                                </div>
                            </div>
                            
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".calc").keyup(function(){
            var price = +$("#price").val();
            var discount = +$("#discount").val();
            var newPrice = +$("#discountPrice").val();
            $("#discountPrice").val(price-(price*(discount/100)));
        })
    })
</script>
