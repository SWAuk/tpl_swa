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
$bootstrapJs = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js";

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

<div id="swa-main">
<header class="swa-header">
	<?php echo $view->position('position-30', 'swa-nostyle'); ?>
    
    <?php if ($view->containsModules('position-1', 'position-28', 'position-29')) : ?>
    <nav class="navbar navbar-inverse navbar-fixed-top swa-top-nav">
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
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="swa-top-level-collapse">
				<?php echo $view->position('position-1'); ?>
				<?php if ($view->containsModules('position-28')) : ?>
                <?php echo $view->position('position-28'); ?></li>
                <?php endif; ?>
                <?php if ($view->containsModules('position-29')) : ?>
                <?php echo $view->position('position-29'); ?></li>
                <?php endif; ?>
                <form class="navbar-form navbar-right" role="search"
                	name="Search" action="<?php echo $document->baseurl; ?>/index.php" method="POST">
                    <div class="form-group">
                    	<input type="text" class="form-control" name="searchword">
                    </div>
                    <input type="hidden" name="task" value="search">
                    <input type="hidden" name="option" value="com_search">
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php endif; ?>
</header>

<div class="swa-sheet clearfix">
            <?php echo $view->position('position-15', 'swa-nostyle'); ?>
<?php echo $view->positions(array('position-16' => 33, 'position-17' => 33, 'position-18' => 34), 'swa-block'); ?>
<div class="swa-layout-wrapper">
                <div class="swa-content-layout">
                    <div class="swa-content-layout-row">
                        <?php if ($view->containsModules('position-7', 'position-4', 'position-5')) : ?>
<div class="swa-layout-cell swa-sidebar1">
<?php echo $view->position('position-7', 'swa-block'); ?>
<?php echo $view->position('position-4', 'swa-block'); ?>
<?php echo $view->position('position-5', 'swa-block'); ?>



                        </div>
<?php endif; ?>

                        <div class="swa-layout-cell swa-content">
<?php
  echo $view->position('position-19', 'swa-nostyle');
  if ($view->containsModules('position-2'))
    echo artxPost($view->position('position-2'));
  echo $view->positions(array('position-20' => 50, 'position-21' => 50), 'swa-article');
  echo $view->position('position-12', 'swa-nostyle');
  echo artxPost(array('content' => '<jdoc:include type="message" />', 'classes' => ' swa-messages'));
  echo '<jdoc:include type="component" />';
  echo $view->position('position-22', 'swa-nostyle');
  echo $view->positions(array('position-23' => 50, 'position-24' => 50), 'swa-article');
  echo $view->position('position-25', 'swa-nostyle');
?>



                        </div>
                    </div>
                </div>
            </div>
<?php echo $view->positions(array('position-9' => 33, 'position-10' => 33, 'position-11' => 34), 'swa-block'); ?>
<?php echo $view->position('position-26', 'swa-nostyle'); ?>

<footer class="swa-footer">
<?php if ($view->containsModules('position-27')) : ?>
    <?php echo $view->position('position-27', 'swa-nostyle'); ?>
<?php else: ?>
<a title="RSS" class="swa-rss-tag-icon" style="position: absolute; bottom: 15px; left: 6px; line-height: 32px;" href="#"></a><div style="position:relative;padding-left:10px;padding-right:10px"><p>Copyright © 2013 Student Windsurfing Association. All Rights Reserved.</p></div>
<?php endif; ?>
</footer>

    </div>
</div>



<?php echo $view->position('debug'); ?>
</body>

<script type="text/javascript" src="<?php echo $bootstrapJs; ?>"></script>

</html>