<?php
    require('lib/AmazonECS.php'); //nom de la classe téléchargée
    const Aws_ID = "AKIAILL2ZJTYUB3EZYZA"; // Identifiant
    const Aws_SECRET = "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"; //Secret
    const associateTag="ecommerce0542-21"; // AssociateTag
    $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
    $category = $_POST["Category"];
    $title = $_POST['Titre'];
    $mode = $_POST['Mode'];
    if($mode == 'ASIN')
    {
        $response = $client->responseGroup('Large')->lookup($title);
        $items = $response["Items"];
        $it = $items["Item"];
        displayItem($it);
    }
?>
