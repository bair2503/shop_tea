<?php
$globalKey = '';
$globalSort = 0;
function cmp($a, $b){
    global $globalKey, $globalSort;
    if ($globalSort==SORT_ASC)
        return strcmp($a[$globalKey],$b[$globalKey]);
    else
        return strcmp($b[$globalKey],$a[$globalKey]);
}

function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    global $globalKey, $globalSort;
    $globalKey =$key;
    $globalSort=$sort;
    usort($array,'cmp');
    return $array;
}
$menu = [[
    'title' => 'd',
    'sort' => 4,
    'path' => 'http://'
],
    [
        'title' => 'a',
        'sort' => 2,
        'path' => 'http://'
    ],
    [
    'title' => 'c',
    'sort' => 3,
    'path' => 'http://'
]
];
$menu = arraySort($menu, 'title');
var_dump($menu);
