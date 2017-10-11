<?php
$mainContent = "";

class PageContent
{

    private $siteTitle = "";

    private $mainContent = "";

    function __construct($title)
    {
        $this->siteTitle = $title;
    }

    // Public Functions
    public function setMainContent($mainContent)
    {
        $this->mainContent = $mainContent;
    }

    public function renderMasterPage()
    {
        echo $this->createHTMLPage();
    }

    public function createHTMLPage()
    {
        $html = <<<HTML
        <!DOCTYPE html>
        <html>
        <head>
        {$this->createHTMLPageHead()}
        </head>
        <body>
        <!-- PAGE CONTENT -->
        <div class="container">
        {$this->createHTMLPageBody()}
        </div>
        </body>
        </html>
HTML;
        return $html;
    }

    public function createHTMLPageHead()
    {
        $head = <<<HEAD
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>FreshTomatoes - The Greatest TV show reviews site</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.2.4.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
HEAD;
        return $head;
    }

    public function createHTMLPageBody()
    {
        $body = <<<BODY
        {$this->mainContent}
BODY;
        return $body;
    }

    public function createTVShowList(array $showList)
    {
        $data = "";

        foreach ($showList as $show) {
            $url = "<a class=\"btn btn-info\" href=\"staff.php?type=show&id={$show->id}\">View</a>";
            $data .= "<tr><td>{$show->showName} {$show->description}</td><td>{$show->genre}</td><td>{$url}</td></tr>";
        }

        $content = <<<CONTENT
        {$data}
CONTENT;
        return $content;
    }
}
?>