<?php
// If session has not been created, start one
if (! isset($_SESSION)) {
    session_start();
}

include ("api/api_index.php");

function buildPage()
{
    $pageContent = <<<CONTENT
<div class="container log-in-page">
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#login" data-toggle="tab">Log In</a>
			</li>
			<li><a href="#signup" data-toggle="tab">Sign Up</a>
			</li>
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="login">
                  <form class="form-signin" action="login.php" method="post">
                    <h2 class="form-signin-heading">Log In</h2>
                    <label for="logInEmail" class="sr-only">Email Address</label>
                    <input type="email" id="logInEmail" name="logInEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                    <label for="logInPassword" class="sr-only">Password</label>
                    <input type="password" id="logInPassword" class="form-control" placeholder="Password" required="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                  </form>
				</div>
				<div class="tab-pane" id="signup">
                    <form class="form-signup">
                        <h2 class="form-signin-heading">Sign Up</h2>
                        <label for="inputEmail" class="sr-only">Email Address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                        <label for="inputUsername" class="sr-only">Username</label>
                        <input type="email" id="inputUsername" class="form-control" placeholder="Username" required="" autofocus="">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" required="">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
                    </form>
				</div>
			</div>
  </div>
CONTENT;
    return $pageContent;
}

$pageTitle = "FreshTomatoes: Login / Sign Up";
$pageContent = buildPage();

$page = new MasterPage($pageTitle);
$page->setMainContent($pageContent);
$page->renderMasterPage();
?>
