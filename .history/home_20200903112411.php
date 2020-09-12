<?=template_header('Home')?>
<div class="row">
    <h1>Nova Izbira 48</h1>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non ante dui. Ut erat neque, eleifend id tellus vitae, viverra hendrerit tellus. Sed ultrices auctor mauris, at lobortis tellus euismod ut. Phasellus at tincidunt sem. Nunc a consequat libero. In maximus massa eget diam hendrerit, eget lobortis elit congue. Vivamus eget laoreet tellus. Ut luctus nisi et faucibus porttitor. Donec in eros blandit, pretium nulla sed, sagittis tortor.
    </p>
    <p>
    Sed tincidunt elit ligula, nec tincidunt dolor sodales quis. Donec laoreet tristique ante, ut egestas lorem accumsan id. Phasellus id libero odio. Duis neque sem, eleifend a elit a, fermentum malesuada enim. Nullam vitae posuere risus. Donec et molestie sapien. Aenean sagittis cursus metus. Nunc fringilla augue sed risus convallis, vel imperdiet lacus blandit. Sed non varius risus. Nam ut semper justo. Praesent ac justo mollis, aliquam sem eget, rhoncus leo. Nullam sodales, nulla eu vehicula varius, ex orci efficitur massa, in faucibus mi nisl ut urna. Pellentesque nec felis non odio sodales mollis at eget neque. Ut et imperdiet quam. Phasellus blandit sapien eget neque dapibus efficitur.
    </p>
    <p>
    Donec augue dolor, cursus at porttitor sit amet, finibus sed mi. Sed dapibus risus in iaculis convallis. Pellentesque ac erat nulla. Curabitur vel eros quis sem dictum molestie. Integer tincidunt sapien lorem, ut egestas justo finibus et. Nullam in nisi quis libero posuere aliquet vel non lacus. Fusce euismod, dui sit amet vestibulum aliquam, augue mauris consectetur est, quis ultrices lorem dolor et ligula. Proin sodales mauris diam, vel sagittis ex aliquet vel. Curabitur tempus orci eu urna molestie, id accumsan felis malesuada. In hac habitasse platea dictumst. Morbi venenatis nec ipsum nec tincidunt. Quisque scelerisque quam odio, vitae dictum lacus finibus id. Ut id ligula finibus, ultrices ex sit amet, venenatis mauris. Sed vehicula leo a maximus interdum. Morbi consectetur enim dui, nec hendrerit urna semper et.
    </p>
    <p>
    Curabitur id velit id magna euismod placerat. Aenean ornare arcu justo, sit amet bibendum diam vestibulum et. Sed id nibh vel neque cursus dictum vel ut arcu. Curabitur in elit luctus, consectetur enim at, interdum lectus. Duis et elementum lectus. Vestibulum ullamcorper ac dolor vel vehicula. Etiam in mollis elit, eget maximus mauris. Sed sit amet tellus gravida, feugiat mauris eu, congue est. Proin sed vestibulum magna, vel luctus libero. Mauris neque risus, convallis eget euismod eu, faucibus vel tellus. Nulla id rhoncus magna. Integer a ex gravida, ultrices est molestie, tristique orci. Suspendisse potenti. Maecenas in ligula hendrerit, mollis mi sit amet, laoreet nisi. Nam commodo porttitor justo molestie facilisis. Morbi venenatis lorem non ante sagittis molestie.
    </p>
    <p>
    Proin nec magna dictum, rhoncus lorem vitae, aliquet urna. Vivamus sed odio metus. Vestibulum sit amet tortor vitae velit aliquam vehicula ut eget mi. Curabitur gravida laoreet quam, vitae lobortis nulla ultrices nec. Fusce purus felis, pharetra euismod tincidunt eget, luctus in ligula. Sed quis neque condimentum, mollis velit at, vehicula lectus. Nunc tincidunt, urna eget sagittis eleifend, libero dui efficitur quam, et ullamcorper felis magna a arcu. Aenean ac blandit odio. Quisque bibendum fringilla felis. Pellentesque laoreet urna vel dolor scelerisque, et suscipit purus convallis. Quisque tempor lacus volutpat finibus maximus. Pellentesque varius, nulla non consequat aliquam, risus elit ultrices nulla, et fringilla sem risus id nibh. Cras eget justo dapibus dolor tristique auctor eu ut nulla. 
    </p>
</div>
<div class="wrapper">
<h1>Novi izdelki</h1>
<?=template_products(new_products())?>
</div>

<div class="wrapper">
<h1>Najbolj ocenjeni izdelki</h1>
<?=template_products(get_product(best_rated()))?>

</div>
<?=template_footer()?>