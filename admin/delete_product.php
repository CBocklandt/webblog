<?php
include ("includes/header.php");
if (!$session->is_signed_in()){
    redirect('login.php');;
}
if (empty($_GET['id'])){
    redirect('products.php');
}
$product =Product::find_by_id($_GET['id']);
if ($product){
    $product->delete_product();
    redirect('products.php');
}else{
    redirect('products.php');
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>
<h1>Welkom op de Delet Product pagina</h1>
<?php include ("includes/footer.php");
