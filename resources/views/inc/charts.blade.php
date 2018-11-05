<div class="well">
    <div id='temps_div'></div>
    <?= $lava->render('LineChart', 'Temps', 'temps_div') ?>
    <div id='wind_div'></div>
    <?= $lava->render('ComboChart', 'WindSpeed', 'wind_div') ?>
    <div id='windD_div'></div>
    <?= $lava->render('ScatterChart', 'WindDirection', 'windD_div') ?>
    <!--<div id='rain_div'></div>
    <?//= $lava->render('LineChart', 'Precipitation', 'rain_div') ?>-->
    <div id='pressure_div'></div>
    <?= $lava->render('LineChart', 'Pressure', 'pressure_div') ?>
</div>