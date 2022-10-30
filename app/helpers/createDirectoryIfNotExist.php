<?php
/**
 * @param string $dir
 * @return string
 */
function createDirectoryIfNotExist(string $dir = ''): string
{
	if (!is_dir($dir)) {
		mkdir($dir);
	}
	
	return $dir;
}