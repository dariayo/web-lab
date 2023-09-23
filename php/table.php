<div class="table-form"  id="answer">

    <div class="table" >
        <div class="table-header" >
            <div class="header__item"><a id="x-table" class="space" >X</a></div>
            <div class="header__item"><a id="y-table" class="space">Y</a></div>
            <div class="header__item"><a id="r-table" class="space">R</a></div>
            <div class="header__item"><a id="result-table" class="space">result</a></div>
            <div class="header__item"><a id="time-table" class="space">Time</a></div>
            <div class="header__item"><a id="runtime-table" class="space" >Runtime</a></div>
        </div>
        <?php foreach ($_SESSION['userHistory'] as $value) { ?>
            <div class="table-content">
                <div class="table-row">
                    <div class="table-data"><?php echo $value[0] ?></div>
                    <div class="table-data"><?php echo $value[1] ?></div>
                    <div class="table-data"><?php echo $value[2] ?></div>
                    <div class="table-data"><?php echo $value[3] ?></div>
                    <div class="table-data"><?php echo $value[4] ?></div>
                    <div class="table-data"><?php echo number_format($value[5], 10, ".", "")*1000000 ?></div>
                </div>
            </div>
        <?php }?>
    </div>
</div>