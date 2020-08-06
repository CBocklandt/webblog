<?php include ("includes/header.php");

if (!$session->is_signed_in()){
    redirect('login.php');
}
$products = Product::find_all();
?>


<?php include ("includes/sidebar.php");?>
<?php include ("includes/content-top.php");?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Products</h2>
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Size</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><img src="<?php echo $product->picture_path();?>" height="62" width="62" alt=""></td>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->title; ?></td>
                    <td><?php echo $product->filename; ?></td>
                    <td><?php echo $product->size; ?></td>
                    <td><a href="delete_product.php?id=<?php echo $product->id;?>"
                        class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ("includes/footer.php");?>







