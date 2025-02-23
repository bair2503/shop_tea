<?php

function cutString($line, $length = 12, $appends = '...'): string
{
    if(mb_strlen($line)>$length){
        $line = mb_substr($line, 0, $length).$appends;
    }
    return $line;
}

$arrya=['моя строквапвапвапваа', 'timenewsвапвапвапвапва', 'databaasdasвапвапвапвап'];

foreach ($arrya as $item){
    $aryas[] = cutString($item);
}
var_dump($aryas);

