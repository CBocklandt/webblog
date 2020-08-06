<?php include ("includes/header.php");

if (!$session->is_signed_in()){
    redirect('login.php');
}
//$products = Product::find_all();
if (empty($_GET['id'])){
    redirect('products.php');
}else{
    $product = Product::find_by_id($_GET['id']);
    if (isset($_POST['update'])){
        if ($product){
            $product->title = $_POST['title'];
            $product->caption = $_POST['caption'];
            $product->description = $_POST['description'];
            $product->alternate_text = $_POST['alternate_text'];
            $product->type = $_POST['type'];
            $product->size = $_POST['size'];
            $product->update();
        }
    }
}
?>


<?php include ("includes/sidebar.php");?>
<?php include ("includes/content-top.php");?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Welkom op de edit Products pagina</h2>
            <form action="edit_product.php?id=<?php echo $product->id;?>" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $product->title;?>">
                    </div>
                    <div class="form-group">
                        <a href="#" class="tumbnail"><img src="<?php echo $product->picture_path();?>" alt=""></a>
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" class="form-control" value="<?php echo $product->caption; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="alternate_text">Alternate text</label>
                        <input type="text" name="alternate_text" class="form-control" value="<?php echo $product->alternate_text; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $product->description;?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product_info_box">
                        <div class="info-box-header">
                            <h4>Save<span id="toggle" class="fas fa-arrow-up"></span> </h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="fas fa-calendar">Uploaded on: April, 15 2019 @ 7:54</span>
                                </p>
                                <p class="text">
                                     <span class="data photo_id_box">Uploaded on: April, 15 2019 @ 7:54</span>
                                </p>
                                <p class="text">
                                    Photo id: <span class="data ">34</span>
                                </p>
                                <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                </p>
                                <p class="text">
                                    <label for="type">File Type</label>
                                    <input readonly type="text" name="type" class="form-control" value="<?php echo $product->type;?>">
                                </p>
                                <p class="text">
                                    <label for="size">File size</label>
                                    <input readonly type="text" name="size" class="form-control" value="<?php echo $product->size;?>">
                                </p>
                            </div>
                            <div class="info-box-footer float-left">
                                <div class="info-box-delete pull-left">
                                    <a href="delete_product.php?id=<?php echo $product->id; ?>" class="btn btn-danger btn-lg">Delete</a>
                                </div>
                                <div class="info-box-update float-right">
                                    <input type="submit" name="update" value="update" class="btn btn-primary btn-lg">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ("includes/footer.php");?>








