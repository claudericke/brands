

<div class="row">
    <h2>Services</h2>
</div>

<a href="/control/site/addservice">Add a service</a>
<br style="clear: both"/>
<?php
if (count($aServices) > 0) {
    foreach ($aServices as $aService) {
        ?>
        <div class="row single-item">
            <div class="itemName six columns"><a href="/control/site/addservice/?pid=<?php echo $aService["id"]; ?>" title="<?php echo $aService["Service"]; ?>"><?php echo $aService["Service"]; ?></a></div>
            <div class="itemDescription six columns"><?php echo $aService["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No products added yet.</p>";
}
?>
