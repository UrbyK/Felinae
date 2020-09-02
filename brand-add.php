
<?=template_header("Insert brands")?>

<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Blagovna znamka</h1>
                    </div><!-- card-heaaer -->
                    <div class="card-body">
                        <form method="post" class="content" action="./index.php?page=includes/brand-insert.inc" enctype="multipart/form-data">
                            <h2 class="segmant-name">Ime blagovne znamke</h2>
                            <hr/>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="title"></label>
                                <div class="col">
                                    <input type="text" name="title" class="form-control" id="title" maxlength="120" placeholder="Ime blagovne znamke" onkeyup="countChar(this)" required>
                                    <span id="charNum" class="text-right">Na voljo je še: 120 znakov</span>
                                </div><!-- col -->
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="image">Slika</label>
                                <input type="file" name="image" class="form-control" id="image" max="1" required>
                                <div id="preview"></div>
                            </div><!-- form-group -->
                            <div class="col-md-3 offset-md-2 float-right float-sm-right">
                                <button type="submit" name="submit" class="btn btn-primary" id="brand-insert">Dodaj</button>
                            </div><!-- col-md-3 offset-md-2 float-righ float-sm-right -->

                        </form>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-sm-10 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div><!-- container -->

<?=template_footer()?>

<script>
    function countChar(val) {
        var len = val.value.length;
        if (len >= 121) {
            val.value = val.value.substring(0, 120);
        } else {
            $('#charNum').text('Na voljo je še: ' + (120 - len) + ' znakov.');
        }
    };
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