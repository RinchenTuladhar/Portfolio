<?php
if (! isset($_SESSION)) {
    session_start();
}

include ("api/api_index.php");

function buildPage()
{
    $retrieveShow = new TVShow();
    $showArray = $retrieveShow->getArray(10);

    $pageContent = <<<CONTENT
    <div class="list-of-shows">
    {$showArray}
    </div>
CONTENT;
    return $pageContent;
}

function createBanner()
{
    $banner = <<<BANNER
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/better_call_saul.jpg" alt="BetterCallSaul">
    </div>

    <div class="item">
      <img src="img/house_of_cards.jpeg" alt="HouseOfCards">
    </div>

    <div class="item">
      <img src="img/the_walking_dead.jpg" alt="WalkingDead">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="main-content">
    	<h3> Top TV Shows </h3>
    	<hr>

    </div>
BANNER;
    return $banner;
}

// If session has not been created, start one

$pageTitle = "FreshTomatoes: TV Shows";
$pageContent = buildPage();

$page = new MasterPage($pageTitle);
$page->setBanner(createBanner());
$page->setMainContent($pageContent);
$page->renderMasterPage();
?>
