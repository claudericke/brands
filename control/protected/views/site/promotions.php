

<div class="row">
    <h2>Promotions</h2>
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

<a href="/control/site/addpromotion">Add a promotion</a>
<br style="clear: both"/>
<?php
if (count($aPromotions) > 0) {
    foreach ($aPromotions as $aPromotion) {
        ?>
        <div class="row">
            <div class="ProductName"><a href="/control/site/addpromotion/?pid=<?php echo $aPromotion["id"]; ?>" title="<?php echo $aPromotion["Title"]; ?>"><?php echo $aPromotion["Title"]; ?></a></div>
            <div class="productDescription"><?php echo $aPromotion["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No promotion added yet.</p>";
}
?>