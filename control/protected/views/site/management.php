<div class="row">
    <h2>Management</h2>
</div>
<style type="text/css">

</style>

<a href="/control/site/addmanagement">Add to Management</a>
<br style="clear: both"/>
<?php
if (count($aManagement) > 0) {
    foreach ($aManagement as $aManager) {
        ?>
        <div class="row single-item">
            <div class="itemName"><a href="/control/site/addmanagement/?mid=<?php echo $aManager["id"]; ?>" title="<?php echo $aManager["Name"]; ?>"> <?php echo $aManager["Title"]; ?>. <?php echo $aManager["Name"]; ?> <?php echo $aManager["Surname"]; ?> (<?php echo $aManager["Position"]; ?>)</a></div>
            <div class="itemDescription"><?php echo $aManager["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No management added yet.</p>";
}
?>
