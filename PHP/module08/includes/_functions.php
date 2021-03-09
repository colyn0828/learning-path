<?php
function addEmoticons($thisMessage)
{
    $thisEmoticon = "<img src=\"emoticons/icon_confused.gif\" />";
    $thisMessage = str_replace(":{", $thisEmoticon, $thisMessage);
    $thisEmoticon = "<img src=\"emoticons/icon_smile.gif\" />";
    $thisMessage = str_replace(":)", $thisEmoticon, $thisMessage);
    $thisEmoticon = "<img src=\"emoticons/icon_sad.gif\" />";
    $thisMessage = str_replace(":(", $thisEmoticon, $thisMessage);
    $thisEmoticon = "<img src=\"emoticons/icon_eek.gif\" />";
    $thisMessage = str_replace(":o", $thisEmoticon, $thisMessage);
    return $thisMessage;
}

function makeClickableLinks($text)
{
    $text = " " . $text;
    $text = preg_replace('/(((f|ht){1}tps?:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '<a href="\\1">\\1</a>', $text);
    $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i', '\\1<a href="http://\\2">\\2</a>', $text);
    $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i', '<a href="mailto:\\1">\\1</a>', $text);
    return trim($text);
}
?>
