<?php
    if(!empty($_POST['Submit']) || isset($_POST['Submit'])) {
        $category = xss_cleaner($_POST['category']);
        $parent_id = $_POST['parent_category'];

        echo $category . " ".  $parent_id;

    } else {
        header("Location: ./index.php?page=category-add&status=err");
        exit;
    }

?>