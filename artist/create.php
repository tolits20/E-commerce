<?php
session_start();
include('../includes/header.php');
include('../includes/config.php');
// include('../includes/alert.php');
// var_dump($_SESSION);
?>

<body>
    <div class="container">
<!-- <?php include('../includes/alert.php');?> -->
        <form method="POST" action="store.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter item name" name="description" value="<?php echo isset($_SESSION['desc']) ? $_SESSION['desc'] : ''; ?>" />
                <small> <?php
                if(isset($_SESSION['descerror'])){
                    echo $_SESSION['descerror'];
                    unset($_SESSION['descerror']);
                }
                ?> </small>
                <label for="cost">Cost Price</label>

                <input type="text" class="form-control" id="cost" placeholder="Enter item cost price" name="cost_price" required >

                <label for="sell">sell price</label>

                <input type="text" class="form-control" id="sell" placeholder="Enter sell price" name="sell_price" required valu e="<?php echo isset($_SESSION['cost']) ? $_SESSION['cost'] : '';  ?>">
                <small> <?php 
                if(isset($_SESSION['costerror'])){
                    echo $_SESSION['costerror'];
                    unset($_SESSION['costerror']);
                }
                ?> </small>
                <label for="qty">quantity</label>

                <input type="number" class="form-control" id="qty" placeholder="1" name="quantity" />
                <input class="form-control" type="file" name="img_path" /><br />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" role="button" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>

</html>