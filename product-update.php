<?php
    if (!user_login_status() || !is_admin()) {
        header("Location: ./index.php");
        exit();
    }
    
    if(!isset($_GET['pid']) && empty($_GET['pid'])) {
        header("Location: ./index.php");
        exit();
    }
    $pid = $_GET['pid'];
    $product = get_product($pid);
    $images = get_image($pid);

?>

<?=template_header("Product_insert")?>
<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Vnesi produkt</h1>
                    </div><!--card-header -->
                    <div class="card-body">
                        <form method="post" class="content" action="./index.php?page=src/inc/product-update.inc" enctype="multipart/form-data">
                            <h2 class="segmant-name">Opis izdelka</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="title">Naslov*</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="title" id="title" value="<?=$product[0]['title']?>" >
                                </div><!-- col -->
                            </div><!-- form-group -->

                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="image">Slike</label>
                                <input type="file" name="image[]" class="form-control" id="image" multiple accept='image/*' max="4" >
                                <div id="preview">
                                    <?php foreach($images as $image): ?>
                                        <img src="<?=$image['image']?>" alt="<?=$image['caption']?>" height="100">
                                    <?php endforeach; ?>
                                </div>
                            </div><!-- form-group -->
                            
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="summary">Povzetek</label>
                                <div class="col">
                                    <textarea type="text" class="form-control" name="summary" id="summary" onkeyup="countChar(this)" maxlength="255" placeholder="Povzetek je lahko dolg 255 znakov!"><?=$product[0]['summary']?></textarea>
                                    <span id="charNum" class="text-right">Na voljo je še: 255 znakov.</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="description">Opis</label>
                                <div class="col">
                                    <textarea type="text" class="form-control" name="description" id="description"><?=$product[0]['content']?></textarea>
                                </div><!-- col -->
                            </div><!-- form-group -->

                            <div class="row">

                                <div class="form-group col-12 col-sm-6 col-xl-3">
                                    <label class="col-12 col-form-label text-md-left" for="weight">Teža</label>
                                    <div class="col-12">
                                        <input type="number" clas="form-control" name="weight" id="weight" min="0" step="0.01" style="text-align:right;" value="<?=$product[0]['weight']?>">kg
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-12 col-sm-6 col-xl-3">
                                    <label class="col-12 col-form-label text-md-left" for="length">Dolžina</label>
                                    <div class="col-12">
                                        <input type="number" clas="form-control" name="length" id="length" min="0" step="0.01" style="text-align:right;" value="<?=$product[0]['length']?>">cm
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-12 col-sm-6 col-xl-3">
                                    <label class="col-12 col-form-label text-md-left" for="width">Širina</label>
                                    <div class="col-12">
                                        <input type="number" clas="form-control" name="width" id="width" min="0" step="0.01" style="text-align:right;" value="<?=$product[0]['width']?>">cm
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-12 col-sm-6 col-xl-3">
                                    <label class="col-12 col-form-label text-md-left" for="depth">Višina</label>
                                    <div class="col-12">
                                        <input type="number" clas="form-control" name="depth" id="depth" min="0" step="0.01" style="text-align:right;" value="<?=$product[0]['depth']?>">cm
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                            </div><!-- row -->
                                
                            <h2 class="segmant-name">Datumi</h2>
                            <hr/>
                            <div class="row">

                                <div class="form-group">
                                    <label class="col-12 col-form-label text-md-left" for="publishedAtDate publishedAtTime">Datum objave</label>
                                    <div class="col-12">
                                        <input type="date" class="form-control" name="publishedAtDate" id="publishedAtDate" value="<?=get_date($product[0]['publishedAt'])?>">
                                        <input type="time" class="form-control" name="publishedAtTime" id="publishedAtTime" value="<?=get_time($product[0]['publishedAt'])?>">
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-12 col-form-label text-md-left" for="saleStartsAtDate saleStartsAtTime">Začetek popusta</label>
                                    <div class="col-12">
                                        <input type="date" class="form-control" name="saleStartsAtDate" id="saleStartsAtDate" value="<?=get_date($product[0]['startsAt'])?>">
                                        <input type="time" class="form-control" name="saleStartsAtTime" id="saleStartsAtTime" value="<?=get_time($product[0]['startsAt'])?>">
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-12 col-form-label text-md-left" for="saleEndsAtDate saleEndsAtTime">Konec popusta</label>
                                    <div class="col-12">
                                        <input type="date" class="form-control" name="saleEndsAtDate" id="saleEndsAtDate" value="<?=get_date($product[0]['endsAt'])?>">
                                        <input type="time" class="form-control" name="saleEndsAtTime" id="saleEndsAtTime" value="<?=get_time($product[0]['endsAt'])?>">
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                            </div><!-- row -->

                            <h2 class="segmant-name">Količine</h2>
                            <hr/>
                            <div class="row">

                                <div class="form-group col-sm-4">
                                    <label class="col-12 col-form-label text-md-left" for="sku">Skladišče*</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control" name="sku" id="sku" value="<?=$product[0]['sku']?>">
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-sm-4">
                                    <label class="col-12 col-form-label text-md-left" for="quantity">Količina</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control" name="quantity" id="quantity" value="<?=$product[0]['quantity']?>">
                                        <span class="hint">Če ni vnosa je isto kot količina skladišče.</span>
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                            </div><!-- row -->

                            <h2 class="segmant-name">Cena</h2>
                            <hr/>
                            <div class="row">
                                
                                <div class="form-group col-sm-3">
                                    <label class="col-12 col-form-label text-md-left" for="price" min="0">Cena</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control calc" name="price" id="price" min="0" step="0.01" style="text-align:right;" value="<?=$product[0]['price']?>">€
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-sm-3">
                                    <label class="col-12 col-form-label text-md-left" for="discount">Popust</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control calc" name="discount" id="discount" min="0" style="text-align:right;" value="<?=$product[0]['discount']?>">%
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->

                                <div class="form-group col-sm-3">
                                    <label class="col-12 col-form-label text-md-left" for="discountPrice">Cena s popustom</label>
                                    <div class="col-12">
                                        <input type="number" class="form-control calc" name="discountPrice" id="discountPrice" min="0" step="0.01" style="text-align:right;" disabled placeholder="<?=discountPrice($product[0]['price'],$product[0]['discount'])?>">€
                                    </div><!-- col-12 -->
                                </div><!-- form-group -->
                            </div><!-- row -->

                            <hr/>
                            <div class="col-md-3 offset-md-2 float-right float-sm-right">
                                <input type="hidden" name="id" class="form-control" value="<?=$pid?>">
                                <button type="submit" name="update" class="btn btn-primary" id="prdct_upd">Posodobi</button>
                            </div><!-- col-md-3 offset-md-2 float-right float-sm-right -->

                        </form>
                    </div><!-- card-body -->
                </div><!-- card user-form -->
            </div><!-- col-sm-10 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div> <!--CONTAINER-->

<script>
    $(document).ready(function(){
        $(".calc").keyup(function(){
            var price = +$("#price").val();
            var discount = +$("#discount").val();
            $("#discountPrice").val(price-(price*(discount/100)).toFixed(2));
        })
    })
</script>

<script>
    
    function previewImages() {
        var $preview = $('#preview').empty();
        if (this.files) $.each(this.files, readAndPreview);
        function readAndPreview(i, file) {
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                return alert(file.name +" is not an image");
            } // else...
            var reader = new FileReader();
            $(reader).on("load", function() {
                $preview.append($("<img/>", {src:this.result, height:100}));
            });
            reader.readAsDataURL(file);
        }
    }
    $('#image').on("change", previewImages);

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

<script>
var limit = 5;
$(document).ready(function(){
    $('#image').change(function(){
        var files = $(this)[0].files;
        if(files.length > limit){
            alert("You can select max "+limit+" images.");
            $('#image').val('');
            $('#preview').empty();
            return false;
        }else{
            return true;s
        }
    });
});
</script>