<?php 
/* 
 * Format The date 
 */

function formatDate($date) {
  return date('F j, Y, g:i a', strtotime($date));
}

/* 
 * Shorten text
 */

function shortenText($text, $chars = 250) {
  $text = $text. " ";  //
  $text = substr($text, 0, $chars); // return parts of string (string, start, length)
  $text = substr($text, 0, strrpos($text, " ")); // to ensure that substring starts behind white space 
  $text = $text. "...";
  return $text;
}

