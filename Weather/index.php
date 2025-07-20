<?php

use App\Weather\FakeWeatherFetcher;

require __DIR__ . '/inc/all.inc.php';

$fetcher = new FakeWeatherFetcher();

$info = $fetcher->fetch('Cairo');


require __DIR__ . '/views/index.view.php';
