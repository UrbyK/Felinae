
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
                        <form method="post" class="content" action="./index.php?page=src/inc/catagory-insert" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-md-4 col-form-label text-md-left" for="catagory">Kategorija</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="catagory" id="catagory" required>
                                    <option></option>
                                </div><!-- col --> 
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
