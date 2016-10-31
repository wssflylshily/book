<?php

namespace App\Http\Controllers\Service;

use App\Http\Requests\Request;
use App\Tool\ValidateCode\ValidateCode;
use App\Tool\SMS\SendTemplateSMS;
use App\Entity\TempPhone;
use App\Http\Controllers\Controller;
use App\Models\M3Result;

class ValidateCodeController extends Controller
{
    public function create($value = '')
    {
        $validateCode = new ValidateCode();
        return $validateCode->doimg();
    }

    public function sendSMS(Request $request)
    {
        $m3_result = new M3Result();

        $phone = $request->input('phone', '');
        if ($phone == ''){
            $m3_result->status = 0;
            $m3_result->message = '手机号不能为空';
            return $m3_result->toJson();
        }
        $sendTemplateSMS = new SendTemplateSMS;
        $code = '';
        $charset = '1234567890';
        $_len = strlen($charset) - 1;
        for ($i = 0;$i < 6;++$i) {
            $code .= $charset[mt_rand(0, $_len)];
        }
        $sendTemplateSMS->sendTemplateSMS("18636476679", array($code, 60), 1);

        $tempPhone = new TempPhone();
        $tempPhone['phone'] = $phone;
        $tempPhone['code'] = $code;
        $tempPhone['deadline'] = date('Y-m-d H:i:s', time() + 60*60);
        $tempPhone->save();
        $m3_result->status = 1;
        $m3_result->message = '发送成功！';
        return $m3_result->toJson();
    }
}
