<?php

namespace App;


class Helper
{
    public static function likeQuery($keyword) {
        return '%' . $keyword . '%';
    }
}