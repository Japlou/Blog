
<?php


$recipient = "nefise.magalie@gmail.com";
$fmtMail= 'Bonjours, <name> (<email>) A été envoyé à partir du blog, le contenu du message:
<message>';

foreach($_POST as $key=> $val) {
$fmtMail= str_replace("<$key>", $val, $fmtMail);
}

if ($_POST["access"] == "stopspam") {
mail($recipient, $_POST["subject"], $fmtMail);
}

?>