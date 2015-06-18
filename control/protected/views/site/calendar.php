<div class="row">
    <h2>Calendar</h2>
</div>
<style type="text/css">

</style>

<a href="/control/site/addcalendar">Add to Calendar</a>
<br style="clear: both"/>
<?php
if (count($aCalendar) > 0) {
    foreach ($aCalendar as $aCaledarItem) {
        ?>
        <div class="row single-item">
            <div class="itemName"><a href="/control/site/addcalendar/?cid=<?php echo $aCaledarItem["id"]; ?>" title="<?php echo $aCaledarItem["Title"]; ?>"> <?php echo $aCaledarItem["Title"]; ?>. Starting: <?php echo $aCaledarItem["StartDate"]; ?> And Ending:<?php echo $aCaledarItem["EndDate"]; ?></a></div>
            <div class="itemDescription"><?php echo $aCaledarItem["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No Calendar Items added yet.</p>";
}
?>
