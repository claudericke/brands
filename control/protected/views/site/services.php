

<div class="row">
    <h2>Services</h2>
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

<a href="/control/site/addservice">Add a service</a>
<br style="clear: both"/>
<?php
if (count($aServices) > 0) {
    foreach ($aServices as $aService) {
        ?>
        <div class="row">
            <div class="ProductName"><a href="/control/site/addservice/?pid=<?php echo $aService["id"]; ?>" title="<?php echo $aService["Service"]; ?>"><?php echo $aService["Service"]; ?></a></div>
            <div class="productDescription"><?php echo $aService["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No products added yet.</p>";
}
?>