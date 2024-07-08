<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sms_codes extends Model
{
    use HasFactory;

    protected $table = 'sms_codes';
    protected $fillable = [
        'phone_number',
        'sms_code'
    ];

    public static function sendSMS($phone_number)
    {
        $code = rand(10000, 99999);

        $check2min = self::CheckTwoMinute($phone_number);

        if (!$check2min) {
            $sms = self::create([
                'phone_number' => $phone_number,
                'sms_code' => $code
            ]);
            self::BroadcastToPhone($phone_number, $code);

            return response()->json([
                'status' => 201,
                'message' => 'SMS Code Sent.',
                'data' => [
                    'sms' => $code
                ]
            ]);
        } else {
            return response()->json([
                'status' => 403,
                'message' => 'Too Many Request. Wait 2 Min',
            ]);
        }


    }

    public static function BroadcastToPhone($phone_number, $code)
    {
        // Use Send To User Mobile Phone
    }

    public static function CheckTwoMinute($phone_number)
    {
        $check = self::query()->where('phone_number', $phone_number)->where('created_at', '>', Carbon::now()->subMinute(2))->first();

        if ($check) {
            return true;
        } else {
            return false;
        }

        return false;
    }
}
