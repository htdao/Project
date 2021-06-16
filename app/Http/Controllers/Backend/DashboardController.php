<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\userInfo;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
         return view('backend.dashboard');

        // dd(storage_path());
        // Storage::disk('local')->put('file.txt', 'test');

        // Storage::put('file1.txt', 'test1');
//        Storage::disk('public')->put('file2.txt', 'public');
//
//        $disk = Storage::disk('public');
//
//        $path = 'file2.txt';
//
//        if($disk->exists($path)){
//            $content = $disk->get($path);
//            dd($content);
//        }else{
//            dd('Không tồn tại!');
//        }


    }

}
