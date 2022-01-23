<?php
function filemtimeHash($file, $algo='ripemd160') {
    return hash($algo, filemtime($file));
}
