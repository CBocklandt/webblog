<?php include ("includes/header.php");?>
<?php include ("includes/sidebar.php");?>
<?php include ("includes/content-top.php");?>
<?php include ("includes/content.php");?>
<?php
//inloggen
if ((!$session->is_signed_in())){
    redirect('login.php');
}
//upload
$message = "";
if (isset($_POST['submit'])){
    $product = new Product();
    $product->title = $_POST['title'];
    $product->set_file($_FILES['file']);

    if ($product->save()){
        $message = "Product uploaded succesfully";
    }else{
        $message = join("<br>", $product->errors);
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">Upload</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include ("includes/footer.php");?>







