<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'based_alcohol_id',
        'based_cups',
        'target_alcohol_id',
    ];

    // alcohols tableに対して，多対１でリレーション（alcoholsが親conversionsが子）
    // これで子のデータから親のデータを呼び出せる
    public function alcohol()
    {
        return $this->belongsTo(Alcohol::class);
    }

    // conversions tabelに一番新しく追加されたデータだけをoutput画面に表示するために必要かもしれない？？
    // やっぱいらんわ
    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }
}
