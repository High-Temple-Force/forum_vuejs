<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <title>AmazonAPITest</title>
</head>
<body>

<?php

define("Access_Key_ID", "AKIAJENXPUIECBXHF3EA");
define("Secret_Access_Key", "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");

define("Associate_tag", "dd11blues-22");

ItemSerch("Books", "滝沢和典");

function ItemSerch($SerchIndex, $Keywords){
    include("base_request.php");
    $amazon_xml = simplexml_load_string(file_get_contents($base_request));
    foreach($amazon_xml->Items->Item as $item) {

        $item_id = $item->ASIN;
        $item_title = $item->ItemAttributes->Title;
        $item_author = $item->ItemAttibutes->Author;
        
        <div class="container">
        <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
          <div class="col-xs-6">
            <!-- 商品の画像を表示 -->
            <img class="img-responsive" src="<?php
              if (isset($item_image)) {
                echo $item_image; // サムネイル画像がある場合
              } else {
                echo "http://bit.ly/29Ikwlm"; // サムネイル画像がない場合
              }
            ?>">
          </div>
          <div class="col-xs-6">
            <ul>
              <!-- 商品情報をリストで表示 -->
              <li><a href="<?php echo $item_url; ?>"><?php echo $item_title; ?></a></li>
              <li><?php echo $item_author; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
        </div>
    <?php }
}
?>
    
</body>
</html>