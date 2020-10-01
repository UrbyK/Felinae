
<?=template_header('Catagory')?>

<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Vnesi kategorijo</h1>
                    </div><!--card-header -->
                    <div class="card-body">
                        <form method="post" class="content" action="./index.php?page=src/inc/category-insert.inc" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="category">Kategorija</label>
                                    <input type="text" class="form-control" id="category" name="category">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="parent_category">Nad kategorija</label>
                                    <select name="parent_category" id="parent_category" class="form-control">
                                        <option selected value="">---N/A---</option>
                                        <?php foreach (all_catagory() as $item): ?>
                                            <option value="<?=$item['id']?>"><?=$item['category']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr/>
                            <div class="col-md-3 offset-md-2 float-right float-sm-right">
                                <button type="submit" name="Submit" class="btn btn-primary" id="cat_ins">Dodaj</button>
                            </div><!-- col-md-3 offset-md-2 float-right float-sm-right -->
                            

                        </form>
                    </div><!-- card-body -->
                </div><!-- card user-form -->
            </div><!-- col-sm-10 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div> <!--CONTAINER-->


<div class="container">
    <div class="my-form">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card user-form">
                    <div class="card-header">
                        <h1 class="card-title">Vnesi kategorijo</h1>
                    </div><!--card-header -->
                    <div class="card-body">
                        <form method="post" class="content" action="./index.php?page=src/inc/category-insert.inc" enctype="multipart/form-data">
                            <div class="col-md-3 offset-md-2 float-right float-sm-right">
                                <button class="add_form_field">Add New Field &nbsp; 
                                    <span style="font-size:16px; font-weight:bold;">+ </span>
                                </button>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="category">Kategorija</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="category" id="category" required>
                                </div><!-- col --> 
                                <label class="col-md-4 col-form-label text-md-left" for="parent-catagory">Nad kategorija</label>
                                <div class="col">
                                    <select name="parent_category" id="parent_category" class="form-control">
                                        <option selected value="">---N/A---</option>
                                        <?php foreach (all_catagory() as $item): ?>
                                            <option value="<?=$item['id']?>"><?=$item['category']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- form-group -->
                            <hr/>
                            <div class="col-md-3 offset-md-2 float-right float-sm-right">
                                <button type="submit" name="Submit" class="btn btn-primary" id="cat_ins">Dodaj</button>
                            </div><!-- col-md-3 offset-md-2 float-right float-sm-right -->
                        </form>
                    </div><!-- card-body -->
                </div><!-- card user-form -->
            </div><!-- col-sm-10 -->
        </div><!-- row justify-content-center -->
    </div><!-- my-form -->
</div> <!--CONTAINER-->


<script>
    $(document).ready(function() {
        var max_fields = 5;
        var wrapper = $(".form-group");
        var add_button = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if(x < max_fields) {
                x++;
                $(wrapper).prepend(
                    '<div class="form-group">\
                        <label class="col-md-4 col-form-label text-md-left" for="category">Kategorija</label>\
                        <label class="col-md-4 col-form-label text-md-left" for="parent_category">Nad kategorija</label>\
                        <div class="col">\
                            <input type="text" class="form-control" name="category" id="category" required>\
                            <option></option>\
                        </div>\
                    </div>'
                );
            } else {
                alert('You Reached the limits');
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
        });
    });
</script>