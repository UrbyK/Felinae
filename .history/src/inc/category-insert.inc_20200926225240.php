<?php
    if(!empty($_POST['Submit']) || isset($_POST['Submit'])) {
        $category = xss_cleaner($_POST['category']);
        $parent_id = $_POST['parent_category'];

        echo $category . " ".  $parent_id;

        $query = "INSERT INTO category(category, parent_id) VALUES(?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$category, $parent_id]);

        header("Location: ./index.php?page=category-add");
        exit;

    } else {
        header("Location: ./index.php?page=category-add&status=err");
        exit;
    }

?>