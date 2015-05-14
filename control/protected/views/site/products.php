

<div class="row">
    <h2>Products</h2>
</div>
<style type="text/css">
    .productDescription,
    .ProductName {
        display: block;
        float: left;
        clear: right;
        width: 250px;
        line-height: 25px;
        min-height: 60px;
        margin: 4px;
        background-color: #EEE;
        padding: 2px;
    }

    .productDescription {
        width: 350px;
    }
</style>

<a href="/control/site/addproduct">Add a product</a>
<br style="clear: both"/>
<?php
if (count($aProducts) > 0) {
    foreach ($aProducts as $aProduct) {
        ?>
        <div class="row">
            <div class="ProductName"><a href="/control/site/addproduct/?pid=<?php echo $aProduct["id"]; ?>" title="<?php echo $aProduct["ProductName"]; ?>"><?php echo $aProduct["ProductName"]; ?></a></div>
            <div class="productDescription"><?php echo $aProduct["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No products added yet.</p>";
}
?>