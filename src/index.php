<?php
defined('_JEXEC') or die;

/**
 * Template for Joomla! CMS, created with Artisteer.
 * See readme.txt for more details on how to use the template.
 */

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'functions.php';

// Create alias for $this object reference:
$document = $this;

// Shortcut for template base url:
$templateUrl = $document->baseurl . '/templates/' . $document->template;

Artx::load("Artx_Page");

// Initialize $view:
$view = $this->artx = new ArtxPage($this);

// Decorate component with Artisteer style:
$view->componentWrapper();

JHtml::_('behavior.framework', true);

$lessSiteFile = $templateUrl . "/css/site.less";
$lessGlobalVars = array(
	'testvar' => '#0000FF'
);

$lessJs = "//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js";

?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $document->language; ?>">
<head>
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/system.css" />
    <link rel="stylesheet" href="<?php echo $document->baseurl; ?>/templates/system/css/general.css" />

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    
    <link data-dump-line-numbers="all"
    	data-global-vars='<?php echo json_encode($lessGlobalVars); ?>'
        rel="stylesheet/less" type="text/css"
        href="<?php echo $lessSiteFile; ?>">

	<script type="text/javascript" src="<?php echo $lessJs; ?>"></script>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

</head>

<body>

<header class="swa-header">
    <?php echo $view->position('position-30', 'swa-nostyle'); ?>
    <?php if ($view->containsModules('position-1', 'position-28', 'position-29')) : ?>
    <nav class="navbar navbar-inverse navbar-static-top swa-top-nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#swa-top-level-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">SWA</a>
            </div>
            <!-- /.navbar-header -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="swa-top-level-collapse">
                <?php echo $view->position('position-1'); ?>
                <?php if ($view->containsModules('menu-login')) : ?>
                    <ul class="nav navbar-nav swa-hmenu navbar-right">
                        <li class="dropdown swa-megamenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu">
                                <li class="content"><?php echo $view->position('menu-login'); ?></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <?php if ($view->containsModules('menu-search')) : ?>
                    <div class="navbar-form navbar-right swa-menu-search">
                        <?php echo $view->position('menu-search'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php endif; ?>
</header>

<div class="swa-page">
	<div class="swa-spotlight">
    	<?php echo "<img src=\"$templateUrl/images/v5_spotlight_default.jpg\">"; ?>
    </div>
    <?php echo $view->position('breadcrumbs', 'swa-nostyle'); ?>
    <div class="container swa-content">
        <?php echo $view->position('position-15', 'swa-nostyle'); ?>
        <?php echo $view->positions(array('position-16' => 33, 'position-17' => 33, 'position-18' => 34), 'swa-block'); ?>
		<?php if ($view->containsModules('position-7', 'position-4', 'position-5')) : ?>
        <div class="col-md-2 swa-sidebar">
            <?php echo $view->position('position-7', 'swa-block'); ?>
            <?php echo $view->position('position-4', 'swa-block'); ?>
            <?php echo $view->position('position-5', 'swa-block'); ?>
        </div>
        <?php endif; ?>
        <div class="col-md-10 swa-content-main">
            <?php
                echo $view->position('position-19', 'swa-nostyle');
                if ($view->containsModules('position-2')){
                    echo artxPost($view->position('position-2'));
                }
                echo $view->positions(array('position-20' => 50, 'position-21' => 50), 'swa-article');
                echo $view->position('position-12', 'swa-nostyle');
                echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' swa-messages'));
                echo '<jdoc:include type="component" />';
                echo $view->position('position-22', 'swa-nostyle');
                echo $view->positions(array('position-23' => 50, 'position-24' => 50), 'swa-article');
                echo $view->position('position-25', 'swa-nostyle');
                ?>
        </div>
        <?php echo $view->positions(array('position-9' => 33, 'position-10' => 33, 'position-11' => 34), 'swa-block'); ?>
        <?php echo $view->position('position-26', 'swa-nostyle'); ?>
    </div>

    <footer class="swa-footer">
    	<div class="container">
			<?php if ($view->containsModules('position-27')) : ?>
            <?php echo $view->position('position-27', 'swa-nostyle'); ?>
            <?php else: ?>
            <a title="RSS" class="swa-rss-tag-icon" style="position: absolute; bottom: 15px; left: 6px; line-height: 32px;" href="#"></a>
            <div class="swa-copyright">
                <p>Copyright © 2015 Student Windsurfing Association. All Rights Reserved.</p>
            </div>
            <?php endif; ?>
        </div>
    </footer>
</div>

<?php echo $view->position('debug'); ?>

</body>
</html>
