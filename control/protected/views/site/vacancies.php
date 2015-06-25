

<div class="row">
    <h2>Vacancies</h2>
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

<a href="/control/site/addvacancy">Add a vacancy</a>
<br style="clear: both"/>
<?php
if (count($aVacancies) > 0) {
    foreach ($aVacancies as $aVacancy) {
        ?>
        <div class="row">
            <div class="ProductName"><a href="/control/site/addvacancy/?vid=<?php echo $aVacancy["id"]; ?>" title="<?php echo $aVacancy["Title"]; ?>"><?php echo $aVacancy["Title"]; ?></a></div>
            <div class="productDescription"><?php echo $aVacancy["Description"]; ?></div>
            <br style="clear: both"/>
        </div>
        <?php
    }
} else {
    echo "<p>No vacancy added yet.</p>";
}
?>
