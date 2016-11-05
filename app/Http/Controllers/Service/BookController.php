<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M3Result;
use App\Entity\Category;
use Mail;

class BookController extends Controller
{
   public function toCategory($parent_id){
       $categorys = Category::where('parent_id',$parent_id)->get();
       $m3_result = new M3Result();
       $m3_result->status = 0;
       $m3_result->message = '返回成功';
       $m3_result->data = $categorys;
       return $m3_result->toJson();
//       return $categorys;
   }
}
