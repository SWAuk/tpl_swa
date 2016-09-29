<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<ol class="breadcrumb<?php echo $moduleclass_sfx; ?>">
<?php if ($params->get('showHere', 1))
	{
		echo '<span class="showHere">'.JText::_('MOD_BREADCRUMBS_HERE').'</span>';
	}
?>
<?php for ($i = 0; $i < $count; $i++) :
	// Workaround for duplicate Home when using multilanguage
	if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link) {
		continue;
	}
	
	// Special requests for current page
	if ($i == $count - 1) {
		if ($params->get('showLast', 1) == false) {
			continue;
		}
		
		// We don't need a link for the current page!
		$list[$i]->link = '';
		
		$active = 'class="active"';
	} else {
		$active = '';
	}
	
	echo "<li $active>";
	
	if (!empty($list[$i]->link)) {
		echo '<a href="'.$list[$i]->link.'">'.$list[$i]->name.'</a>';
	} else {
		echo $list[$i]->name;
	}
	
	echo '</li>';
	
endfor; ?>
</ol>
