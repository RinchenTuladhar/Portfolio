<?php
require_once ("scripts.php");

class MasterPage
{

    /*
     * PAGE SECTIONS
     */
    private $htmlPage;

    private $header;

    private $banner;

    private $mainContent;

    private $script;

    private $footer;

    function __construct($title)
    {
        $this->htmlPage = new PageContent($title);
        $this->reset();
    }

    private function reset()
    {
        $this->mainContent = "";
        $this->banner = "";
        $this->footer = "";
    }

    /*
     * GET & SET FUNCTIONS
     */
    public function getHeader()
    {
        return $this->header;
    }

    public function getMainContent()
    {
        return $this->mainContent;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function getPage(): PageContent
    {
        return $this->htmlPage;
    }

    public function getBanner()
    {
        return $this->banner;
    }

    public function setHeader($section)
    {
        $this->header = $section;
    }

    public function setMainContent($section)
    {
        $this->mainContent = $section;
    }

    public function setBanner($section)
    {
        $this->banner = $section;
    }

    public function setFooter($section)
    {
        $this->footer = $section;
    }

    public function setScript($section)
    {
        $this->script = $section;
    }

    public function createMasterPage()
    {
        $this->setMasterPage();
        return $this->htmlPage->createMasterPage();
    }

    public function renderMasterPage()
    {
        $this->setMasterPage();
        $this->htmlPage->renderMasterPage();
    }

    public function setMasterPage()
    {
        $overallPage = <<<OVERALL
        <div class="main-header">
	   	 <nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#mainNavBar">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">FreshTomatoes</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="tv-shows.php">TV Shows</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="access.php"><span class="glyphicon glyphicon-log-in"></span>
							Login / Sign Up</a></li>
					</ul>
				</div>
			   </div>
			</nav>
        </div>
        <!-- BANNER -->
        {$this->banner}
       	<div class="main-content">
        	{$this->mainContent}
       	</div>
        <div class="main-footer">
        	<footer class="footer">
        		<p>FreshTomatoes | Home | TV Shows | Log In - Sign Up</p>
        	</footer>
        </div>
        <!-- JAVASCRIPT -->
        <script>
        	{$this->script}
        </script>
OVERALL;
        $this->htmlPage->setMainContent($overallPage);
    }
}

?>