<?php

  $dir = 'img/1/gallery';
/*
  $directories = glob($dir . '/*' , GLOB_ONLYDIR);
  //print_r($directories);

  foreach ($directories as $directory) {
    foreach (glob($directory . "/*.jpg") as $image) {
      var_dump($image);
    }
  }
*/

  //echo "string";

/*
  $directories = new DirectoryIterator($dir);
  foreach ($directories as $fileinfo) {
      if ($fileinfo->isDir() && !$fileinfo->isDot()) {
          echo $fileinfo->getFilename().'<br>';
      }
  }
*/
  //print_r($directories);

	// Open a known directory, and proceed to read its contents
/*
	foreach(glob($dir) as $file)
	{
		echo "filename: $file : filetype: " . filetype($file) . "<br />";
	}
*/

//$directories = array_filter(glob('*'), 'is_dir');
//print_r( $directories);

$dir_iterator = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
// could use CHILD_FIRST if you so wish

$album = [];
$currentDirectory = "";
$i = 0;

foreach ($iterator as $file) {
    //echo $file, "<br />";
    if ($file->isDir()) {
/*
      echo "-  ".$file->getFilename();
      echo "<br />";
*/
      $album[$file->getFilename()] = [];
      $currentDirectory = $file->getFilename();
    }
    if ($file->isFile() && ($file->getExtension() === 'jpg' || $file->getExtension() === 'jpeg')) {
/*
      echo "------------------------------------------------------------------<br>";
      echo "---- ".$file->getFilename()."   ||    ".$file->getExtension()."   ||    ".$file->getPathname();
      echo "<br>------------------------------------------------------------------<br>";
      list($width, $height) = getimagesize($file->getRealPath());
      echo $file->getSize()."   ||    ".$width."    ||    ".$height;
      echo "<br />";
*/
      list($width, $height) = getimagesize($file->getRealPath());
      $album[$currentDirectory][] = [
        "path" => $str = str_replace('\\', '/', $file->getPathname()),
        "size" => $file->getSize(),
        "width" => $width,
        "height" => $height
      ];
    }
}

echo json_encode($album, JSON_UNESCAPED_SLASHES);

?>
