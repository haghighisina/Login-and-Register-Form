<?php

function isPost():bool{
    return strtoupper($_SERVER['REQUEST_METHOD'] === 'POST');
}
function escape(string $value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
