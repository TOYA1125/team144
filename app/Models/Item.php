<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'status',
        'type',
        'datail',
        'price',
    ];

    // カテゴリーを文字変換
    const TYPES = [
        '1' => 'キッチン家電',
        '2' => 'オーディオ家電',
        '3' => '健康家電',
        '4' => '季節家電',
        '5' => '映像家電',
    ];


    public function user()
    {
        // ユーザーテーブルを紐づけ(itemからみたらuserは一人belongsTo)
        return $this->belongsTo(User::class);
    }
}
