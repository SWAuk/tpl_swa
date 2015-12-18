<?php

/**
 * Joomla Install -> GIT
 *
 * This file allows you to copy changes from a deployed version of the template
 * back to the git repo!
 * This means that you can develop on your live test code!
 *
 * The location of the templateRoot to copy from is taken from .templateRoot
 *     For example: X:\web\pub\joomla
 */
$templateRoot = trim(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '.templateRoot'));
if ($templateRoot === false) {
	die('Please create a .templateRoot file.');
}

#Copy all files
recurse_copy($templateRoot, __DIR__ . '/src');

echo "Done!";

/**
 * Taken from the doc page of copy
 * http://php.net/manual/en/function.copy.php#91010
 */
function recurse_copy($src, $dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while (false !== ( $file = readdir($dir))) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if (is_dir($src . '/' . $file)) {
				recurse_copy($src . '/' . $file, $dst . '/' . $file);
			} else {
				copy($src . '/' . $file, $dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}
