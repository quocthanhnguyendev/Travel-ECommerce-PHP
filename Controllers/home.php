<?php

$tour = new Tourist();
$tourResult = $tour->getTrendingTours();
$page = new Page();

$countTour = $tourResult->rowCount();
$limit = 2;
$allPage = $page->findPage($countTour, $limit);
$pageStart = $page->findStart($limit);
$tourData = $tour->getTrendingToursLimit($pageStart, $limit);
$CurrentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;

include_once('Views/home.php');
?>