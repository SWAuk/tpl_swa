<?php

/**
 * GIT -> Joomla Install
 *
 * This file allows you to copy changes from this git repo to a deployed version of the template!
 * This means that you can develop here and easily push to a live joomla install!
 *
 * The location of the templateRoot to copy from is taken from .templateRoot
 *     For example: X:\web\pub\joomla
 */
$templateRoot = trim(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '.templateRoot'));
if ($templateRoot === false) {
	die('Please create a .templateRoot file.');
}

#Copy all files
recurse_copy( __DIR__ . '/src', $templateRoot );

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
