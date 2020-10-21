<?php
    #print_r(all_catagory());

    $categories = all_catagory();
 #   echo '<pre>'; print_r( $categories ); echo '</pre>';


    /*---------------------------------
function parentChildSort_r
$idField        = The item's ID identifier (required)
$parentField    = The item's parent identifier (required)
$els            = The array (required)
$parentID       = The parent ID for which to sort (internal)
$result     = The result set (internal)
$depth          = The depth (internal)
----------------------------------*/

function parentChildSort_r($idField, $parentField, $els, $parentID = 0, &$result = array(), &$depth = 0){
    foreach ($els as $key => $value):
        if ($value[$parentField] == $parentID){
            $value['depth'] = $depth;
            array_push($result, $value);
            unset($els[$key]);
            $oldParent = $parentID; 
            $parentID = $value[$idField];
            $depth++;
            parentChildSort_r($idField,$parentField, $els, $parentID, $result, $depth);
            $parentID = $oldParent;
            $depth--;
        }
    endforeach;
    return $result;
}


function buildTree(array $elements, $parentId = null) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['child'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

$tree = buildTree($categories);


#echo '<pre>'; print_r( $tree ); echo '</pre>';

// function treeOut($tree) {
//     $markup = '';
//     $child = array();
//     // foreach($tree as $branch => $twig) {
        
//     //     $markup .= '<li>'. ((is_array($twig)) ? $branch . treeOut($twig) : $twig ) .'</li>';
        
//     //     if( is_array($twig) ) { 
//     //         $markup .= '<li>'.  $branch . treeOut($twig) . '</li>';
//     //     } else {
//     //         array_push($child, $twig);
//     //         $markup.=  $child[0];
//     //     }
//     //}

//     foreach($tree as $branch) {
//         if(is_array($branch)) {
//             $markup .= '<li>'. $branch['category'] . treeOut($branch). '</li>';
//         }
//         else {
//             $markup .= '<li>'. $branch. '</li>';
//         }
        
//     }

    

//     return '<ul>' .$markup. '</ul>';
// }

// echo treeOut($tree);



// function treeOut($tree) {
//     $markup = '';
//     $leafs = [];
//     $nodes = [];
//     foreach($tree as $branch => $twig) {
//       if (!is_array($twig)) {
//         array_push($leafs, $twig);
//       } else {
//         array_push($nodes, $twig);
//       }
//     }

//     if (count($leafs) > 0) {
//       #$markup .= '<li>'. implode(", ", $leafs) .'</li>';
//       print_r($leafs);
//     }

//     foreach($nodes as $branch => $twig) {

//         $markup .= '<li>'. ($branch . treeOut($twig)) .'</li>';
//     }

//     return '<ul>' .$markup. '</ul>';
// }

// echo treeOut($tree);

function printTree($array) {
    $output = "<ul>\n";
    foreach ($array as $a) {
        $output .= "<li>".$a->category."</li>\n";

        if (isset($a->children)) {
            $output .= printTree($a->children);
        }
    }
    $output .= "</ul>\n";
    return $output;
}



// function array_flatten($array) {

//     $return = array();
//     foreach ($array as $key => $value) {
//         if (is_array($value)) { 
//             $return = array_merge($return, array_flatten($value));
            
//         }
//         else {$return[$key] = $value;
//         }
//     }
//     return $return;
 
//  }
 

// $neki = array_flatten($tree);

/*
$oneDim = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($tree)), 0);
echo '<pre>'; print_r($oneDim); echo '</pre>';
*/

// function sortValues($array) {
//     $sorted = array();
//     $len = count($array);
//     for($i=0; $i<$len; $i++){
//         for($j=0; $j<$len-$i-1; $j++) {
//             if($array[$j]['id'] > $array[$j+1]['id']){
//                 $tem = $array[$j];
//                 $array[$j] = $array[$j+1];
//                 $array[$j+1] = $tem;
//             } 
            
//         }
//     }
//     return $array;
// }

    
?>




<select name="parent_category[]" id="parent_category" class="form-control">
    <option selected value="">---N/A---</option>
    <?php foreach ($categories as $item): ?>
        <option value="<?=$item['id']?>"><?=$item['category']?> | <?=$item['id']?> | <?=$item['parent_id']?></option>
    <?php endforeach; ?>
</select>