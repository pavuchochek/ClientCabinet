
<?php
//à définir :
// $titre = titre de la page
// $css = tableau des css à inclure
echo'
    <head>
        <meta charset="utf-8" />
        <title>'.$titre.' - Cabinet Médical</title>';
foreach ($css as $value) {
    echo '<link rel="stylesheet" href="css/'.$value.'">';
}
echo'
        <link rel="stylesheet" href="css/CSSheader.css">
        <link rel="stylesheet" href="css/CSSfooter.css">
        <link rel="icon" href="img/logo.png">
    </head>';

?>