<?php 
/**
 * Get Headers function
 * @param str #url
 * @return array
 */
function getHeaders($url)
{
  $ch = curl_init($url);
  curl_setopt( $ch, CURLOPT_NOBODY, true );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
  curl_setopt( $ch, CURLOPT_HEADER, false );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
  curl_setopt( $ch, CURLOPT_MAXREDIRS, 3 );
  curl_exec( $ch );
  $headers = curl_getinfo( $ch );
  curl_close( $ch );

  return $headers;
}

/**
 * Download
 * @param str $url, $path
 * @return bool || void
 */
function download($url, $path)
{
  # open file to write
  $fp = fopen ($path, 'w+');
  # start curl
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  # set return transfer to false
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
  curl_setopt( $ch, CURLOPT_BINARYTRANSFER, true );
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
  # increase timeout to download big file
  curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
  # write data to local file
  curl_setopt( $ch, CURLOPT_FILE, $fp );
  # execute curl
  curl_exec( $ch );
  # close curl
  curl_close( $ch );
  # close local file
  fclose( $fp );

  if (filesize($path) > 0) return true;
}
?>