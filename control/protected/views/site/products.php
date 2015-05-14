

<div class="row">
    <h2>Products</h2>
</div>
<style type="text/css">

</style>

<a href="/control/site/addproduct">Add a product</a>
<br style="clear: both"/>
<?php
if (count($aProducts) > 0) {
    foreach ($aProducts as $aProduct) {
        ?>
        <div class="row single-item">
            <div class="itemName"><a href="/control/site/addproduct/?pid=<?php echo $aProduct["id"]; ?>" title="<?php echo $aProduct["ProductName"]; ?>"><?php echo $aProduct["ProductName"]; ?></a></div>
            <div class="itemDescription"><?php echo $aProduct["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No products added yet.</p>";
}
?>
