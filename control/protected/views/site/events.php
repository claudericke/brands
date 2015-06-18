<div class="row">
    <h2>Events</h2>
</div>
<style type="text/css">

</style>

<a href="/control/site/addevent">Add an Event</a>
<br style="clear: both"/>
<?php
if (count($aEvents) > 0) {
    foreach ($aEvents as $aEvent) {
        ?>
        <div class="row single-item">
            <div class="itemName"><a href="/control/site/addevent/?eid=<?php echo $aEvent["id"]; ?>" title="<?php echo $aEvent["Title"]; ?>"> <?php echo $aEvent["Title"]; ?>. <?php echo $aEvent["StartDate"]; ?> <?php echo $aEvent["EndDate"]; ?> (<?php echo $aEvent["Location"]; ?>)</a></div>
            <div class="itemDescription"><?php echo $aEvent["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No events added yet.</p>";
}
?>
