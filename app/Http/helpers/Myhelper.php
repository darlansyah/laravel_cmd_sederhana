<?php
if (! function_exists('potongstring')) {
    function potongstring($text)
    {
      if (strlen($text) > 60) {
        $text = substr($text,0,60);
        $text = $text . "...";
      };
      return $text;
    }
}
