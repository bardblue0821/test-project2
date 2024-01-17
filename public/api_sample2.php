<?php
// APIアクセスURL
$url = 'https://api.vrchat.cloud/api/1/worlds/wrld_7acbb0fb-0c54-4ab0-948a-34e2f924c568';

// ストリームコンテキストのオプションを作成
$options = array(
    // HTTPコンテキストオプションをセット
    'http' => array(
        'method'=> 'GET',
        'header'=> 'Content-type: application/json; charset=UTF-8' //JSON形式で表示
    )
);

// ストリームコンテキストの作成
$context = stream_context_create($options);

$raw_data = file_get_contents($url, false,$context);

// debug
var_dump($raw_data);

// json の内容を連想配列として $data に格納する
$data = json_decode($raw_data,true);
?>
<table>
    <tr>
        <th>name</th>
        <th>note</th>
    </tr>
    <?php foreach($data as $key => $value){ // 連想配列を取り出す ?>
        <?php if(is_array($value)){ // 値が配列のみループで回して表示 ?>
            <?php foreach($value as $column){ ?>
            <tr>
                <td><?php echo $column['authorId']; ?></td>
                <td><?php echo $column['authorName']; ?></td>
            </tr>
           <?php } ?>
        <?php } ?>
    <?php } ?>
</table>