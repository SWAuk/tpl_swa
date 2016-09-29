<?php
defined('_JEXEC') or die;

/**
 * Note from Addshore:
 * Something is messed up in this dile meaning that menue that are more than 2 levels deep DO NOT
 * WORK
 */

require_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . 'functions.php';

// Note: it is important to remove spaces between elements.

$tag = ($params->get('tag_id') != NULL) ? ' id="' . $params->get('tag_id') . '"' : '';
if (isset($attribs['name']) && $attribs['name'] == 'position-1') {
    $menutype = 'horizontal';

    $start = $params->get('startLevel');

    // true - skip the current node, false - render the current node.
    $skip = false;
    
	// limit of rendering - skip items when a level is exceeding the limit.
	// Submenus just don't have much of a place on the web right now, especially the mobile web.
	// - A wise man
	$limit = $start + 1;
	$limit = $params->get('showAllChildren') ? $limit : $start;
	
    echo '<ul class="nav navbar-nav swa-hmenu"' . $tag . '>';
    foreach ($list as $i => & $item) {
        if ($skip) {
            if ($item->shallower) {
                if (($item->level - $item->level_diff) <= $limit) {
                    echo '</li>' . str_repeat('</ul></li>', $limit - $item->level + $item->level_diff);
                    $skip = false;
                }
            }
            continue;
        }

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->parent ? ' dropdown swa-megamenu' : '';

        echo "<li class='$class'>";

        // Render the menu item.
        if (!$item->deeper) {
            switch ($item->type) {
                case 'separator':
                case 'url':
                case 'component':
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                    break;
                default:
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                    break;
            }
        }
		
        if ($item->deeper) {
			if ($item->level >= $limit) {
				$skip = true;
				continue;
			}

            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
            echo $item->title;
            echo ' <span class="caret"></span></a>';
            echo '<ul class="dropdown-menu">';
        }
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
} else if (0 === strpos($params->get('moduleclass_sfx'), 'swa-vmenu') || false !== strpos($params->get('moduleclass_sfx'), ' swa-vmenu')) {
    $menutype = 'vertical';

    $start = $params->get('startLevel');

    // true - skip the current node, false - render the current node.
    $skip = false;
    // limit of rendering - skip items when a level is exceeding the limit.
    $limit = $start;

    echo '<ul class="nav nav-stacked swa-vmenu"' . $tag . '>';
    foreach ($list as $i => & $item) {
        if ($skip) {
            if ($item->shallower) {
                if (($item->level - $item->level_diff) <= $limit) {
                    echo '</li>' . str_repeat('</ul></li>', $limit - $item->level + $item->level_diff);
                    $skip = false;
                }
            }
            continue;
        }

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->parent ? ' dropdown' : '';

        echo "<li class='$class'>";

        // Render the menu item.
        if (!$item->deeper) {
            switch ($item->type) {
                case 'separator':
                case 'url':
                case 'component':
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                    break;
                default:
                    require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                    break;
            }
        }

        if ($item->deeper) {
            if ($item->level >= $limit) {
                $skip = true;
                continue;
            }

            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
            echo $item->title;
            echo ' <span class="caret"></span></a>';
            echo '<ul class="dropdown-menu">';
        }
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
} else {
    $menutype = 'default';
    echo '<ul class="menu' . $params->get('class_sfx') . '"' . $tag . '>';
    foreach ($list as $i => &$item) {

        $class = 'item-' . $item->id;
        $class .= $item->id == $active_id ? ' current' : '';
        $class .= ('alias' == $item->type
            && in_array($item->params->get('aliasoptions'), $path)
            || in_array($item->id, $path)) ? ' active' : '';
        $class .= $item->deeper ? ' deeper' : '';
        $class .= $item->parent ? ' dropdown' : '';

        echo '<li class="' . $class . '">';

        // Render the menu item.
        switch ($item->type) {
            case 'separator':
            case 'url':
            case 'component':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
                break;
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        }

        if ($item->deeper)
            echo '<ul>';
        elseif ($item->shallower)
            echo '</li>' . str_repeat('</ul></li>', $item->level_diff);
        else
            echo '</li>';
    }
    echo '</ul>';
}
