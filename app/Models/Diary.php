<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date', 'time', 'elapsed_time', 'feeling', 'coping_measures'];
    // id 一意,auto_increment
    // user_id int not_null
    // date 症状が発生し日付 date not_null 記録作成時は非表示にする。
    // time 症状が発生した時間 timestamp not_null
    // elapsed_time 経過時間、どれくらい続いたのか（分） tinyInteger (1-255) not_null
    // feeling その時の気分感情思などな text null許容
    // coping_measures 症状への対処法や反省点 text null許容
    // importance tinyint その記録の重要度 not_null default 1

    public const DIARY_STATUS_VERY_BAD = 1;
    public const DIARY_STATUS_BAD = 2;
    public const DIARY_STATUS_SOSO = 3;
    public const DIARY_STATUS_GOOD = 4;
    public const DIARY_STATUS_VERY_GOOD = 5;

    public const DIARY_STATUS_NAME_VERY_BAD = '⭐️';
    public const DIARY_STATUS_NAME_BAD = '⭐️⭐️';
    public const DIARY_STATUS_NAME_SOSO = '⭐️⭐️⭐️';
    public const DIARY_STATUS_NAME_GOOD = '⭐️⭐️⭐️⭐️';
    public const DIARY_STATUS_NAME_VERY_GOOD = '⭐️⭐️⭐️⭐️⭐️';

    public const DIARY_STATUS_OBJECT = [
        self::DIARY_STATUS_VERY_BAD => self::DIARY_STATUS_NAME_VERY_BAD,
        self::DIARY_STATUS_BAD => self::DIARY_STATUS_NAME_BAD,
        self::DIARY_STATUS_SOSO => self::DIARY_STATUS_NAME_SOSO,
        self::DIARY_STATUS_GOOD => self::DIARY_STATUS_NAME_GOOD,
        self::DIARY_STATUS_VERY_GOOD => self::DIARY_STATUS_NAME_VERY_GOOD,
    ];

    // public const DIARY_STATUS_ARRAY = [
    //     self::DIARY_STATUS_READING,
    //     self::DIARY_STATUS_UNREAD,
    //     self::DIARY_STATUS_DONE,
    //     self::DIARY_STATUS_WANT_READ,
    // ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
