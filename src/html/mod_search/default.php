<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_search
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

?>
<form action="<?php echo JRoute::_('index.php');?>" class="swa-search" method="post">
	<div class="search<?php echo $moduleclass_sfx ?>">
		<?php if ($button_pos == 'left' || $button_pos == 'top'): ?>
			<button type="submit" class="btn btn-default"><?php echo $button_text ?></button>
		<?php endif; ?>

		<div class="form-group">
			<input type="text" id="mod-search-searchword" class="form-control" name="searchword" placeholder="<?php echo $text ?>">
		</div>

		<?php if ($button_pos == 'right' || $button_pos == 'bottom'): ?>
			<button type="submit" class="btn btn-default"><?php echo $button_text ?></button>
		<?php endif; ?>

		<input type="hidden" name="task" value="search">
		<input type="hidden" name="option" value="com_search">
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>">
	</div>
</form>
