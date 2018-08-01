<?php
$my_phone = "+1 (168) 666-8656";
if (preg_match("/\+1([- ])?\(?\d{3}\)? \d{3}-\d{4}/", $my_phone)) {
echo "$my_phone is a valid ";
}
else
{
  echo "$my_phone is NOT valid";
}
?>
<!-- ///^\s*(?:\+?(\d{1,3}))?[- (]*(\d{3})[- )]*(\d{3})[- ]*(\d{4})(?: *[x/#]{1}(\d+))?\s*$/ -->