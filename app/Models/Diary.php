<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    // id 一意,auto_increment
    // user_id int not_null
    // date 症状が発生し日付 date not_null 記録作成時は非表示にする。
    // time 症状が発生した時間 timestamp not_null
    // elapsed_time 経過時間、どれくらい続いたのか（分） tinyInteger (1-255) not_null
    // feeling その時の気分感情思などな text null許容
    // coping_measures 症状への対処法や反省点 text null許容
}
