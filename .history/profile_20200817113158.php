<?php
    if(empty($_SESSION['logged_in']) && empty($_SESSION['user_id']) && !isset($_SESSION['logged_in']) && !isset($_SESSION['user_id']) && $_SESSION['logged_in'] !== true){
        header("Location: ./index.php?page=login");
        exit();
    }

    $id = (int)$_SESSION['user_id'];

    $query = "SELECT * FROM account a INNER JOIN city c ON a.city_id = c.id 
        INNER JOIN country co ON c.country_id = co.id
        WHERE a.id = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<?=template_header("Profile")?>

<div class="my-form">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card user-form">
                <div class="card-header">
                    <h1 class="card-title">Profil</h1>
                </div>
                <div class="card-body">
                    <form method="post" class="content" id="profileForm">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="fname">Ime</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fname" id="fname" value="<?=$result['firstName']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="lname">Priimek</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="lname" id="lname" value="<?=$result['lastName']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="phoneNumber">Telefonska številka</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?=$result['phoneNumber']?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <lable class="col-md-4 col-form-label text-md-right" for="address">Naslov</lable>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" id="address" value="<?=$result['address']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <lable class="col-md-4 col-form-label text-md-right" for="postalCode">Poštna številka</lable>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="postalCode" id="postalCode" value="<?=$result['postalCode']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <lable class="col-md-4 col-form-label text-md-right" for="city">Mesto</lable>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city" value="<?=$result['city']?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="country">Država</label>
                            <div class="col-md-6">
                                <select name="country" id="country" class="form-control" disabled>
                                <?php foreach (countries() as $item): ?>
                                    <?php if($item['id'] == $result['country_id']): ?>
                                        <option value="<?=$item['id']?>" selected><?=$item['country']?></option>
                                    <?php endif; ?>
                                    <option value="<?=$item['id']?>"><?=$item['country']?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-6 offset-md-4 float-right float-sm-right">
                            <button type="button" name="update" class="btn btn-primary" id="update_btn" onclick="return profile_update();" disabled>Shrani</button>
                            <button type="button" name="edit" class="btn btn-primary" id="edit_btn">Uredi</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function profile_update(){
        if(confirm("Želite posodobiti podatke?")){
            $("#update_btn").click(function(e){
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var phoneNumber = $("#phoneNumber").val();
                var address = $("#address").val();
                var city = $("#city").val();
                var postalCode = $("#postalCode").val();
                var country = $("#country").val();

                console.log(fname);
                console.log(lname);
                console.log(phoneNumber);
                console.log(address);
                console.log(postalCode);
                console.log(city);
                console.log(country);

                $.ajax({
                    type: 'POST',
                    data: 'fname=' + fname + '&lname=' + lname + '&phoneNumber=' + phoneNumber + '&address=' + address + 
                                '&postalCode=' + postalCode + '&city=' + city + '&country=' + country,
                    url: './includes/profile-update.inc.php',
                    success:function(data){
                        alert(data);
                    }  

                })
            })
        }
    }
</script>

<!-- Omogočanje urejanja podatkov -->
<script>
    $(document).ready(function(){
        $('.content input[type=text]').prop("disabled", true);

        $("button[name=edit]").on("click", function(){
            $("input, button[name=update], select").removeAttr("disabled");
            $(".content button[name=edit]").prop("disabled", true);
        })
        $("button[name=update]").on("click", function(){
            $(".content input, .content button[name=update], select").prop("disabled", true);
            $(".content button[name=edit]").removeAttr("disabled");
        })
    })
</script>


