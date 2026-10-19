
<?php

function get_remote_addr() {
  if (getenv('CLOUDFLARE') === '1' && array_key_exists('HTTP_CF_CONNECTING_IP', $_SERVER)) {
    return $_SERVER['HTTP_CF_CONNECTING_IP'];
  } else if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    return  $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
    return $_SERVER['REMOTE_ADDR'];
  } else if (array_key_exists('HTTP_CLIENT_IP', $_SERVER)) {
    return $_SERVER['HTTP_CLIENT_IP'];
  }

  return '';
}
