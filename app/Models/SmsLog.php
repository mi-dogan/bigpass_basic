<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsLog extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

  public function sendSms($message, $phone)
  {
    $postUrl = env('SMS_POSTURL', 'http://websms.telsam.com.tr/xmlapi/sendsms');
    $originator = env('SMS_ORGINATOR', 'HAREZMI'); //Buraya Başlık gireceksiniz
    $username = env('SMS_USERNAME', 'harezmi');   //Panel girişi yaptığınız Kullanıcı Adınız
    $password = env('SMS_PASSWORD', 'harezmi.4264');    //Panel girişi yaptığınız Şifreniz

    $xmlStr = '<?xml version="1.0"?>
        <SMS>
        <authentication>
          <username>' . $username . '</username>
          <password>' . $password . '</password>
        </authentication>
        <message>
          <originator>' . $originator . '</originator>
          <text>' . $message . '</text>
          <unicode></unicode>
              <international></international>
        </message>
        <receivers><receiver>' . $phone . '</receiver></receivers>
        </SMS>';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $postUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    SmsLog::where("phone", $phone)->latest()->first()->update(["response" => json_encode($response), 'responsed_at' => now()]);

    return $response;
  }
  public function scopeByCompany($query)
  {
    return $query->where('company_id', auth()->user()->company_id);
  }
}
