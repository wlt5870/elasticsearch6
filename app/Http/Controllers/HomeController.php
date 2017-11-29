<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Jobs\Insert;
use App\Jobs\SendEmail;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Exception;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Intervention\Image\ImageManagerStatic as Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function upload(Request $request)
    {
        if($request->isMethod('post')){
           $file =  $request->file('file');
            $name = date("Y-m-d-H-m-s");
           if($file->isValid()){
               $bool = Storage::disk('upload')->put($name.$file->getClientOriginalName(), file_get_contents($file->getRealPath()));
               if($bool){
                   return "上传成功";
               }
           }
        }
        return view('login');
    }
    public function mail(){
		echo "ok";
	//Mail::raw('你好吗',function($message){
		//$message->from('wlt5870@163.com');
		//$message->subject('你好');
		//$message->to('781692742@qq.com');
	//});
        //Mail::send('mail',['name'=>'abc'],function($message){
            //$message->from('wlt5870@163.com');
            //$message->to('781692742@qq.com');
        //});
    }
    public function cache1(){
        //Cache::forget('key2');
       $res =  Cache::add('key2','value2',1);
       //$res =  Cache::put('key2','put',1);
       dd($res);
    }
    public function cache2(){
        //$key = Cache::get('key2');
        $key = Cache::pull('key2');
        dd($key);
    }
    public function getError(){
        Log::info('info');
        //if(!isset($key)){
        //    abort('503');
        //}
    }
    public function queueSend(){
        dispatch(new SendEmail('781692742@qq.com'));
    }
    public function qrcode()
    {
        event(new TestEvent('test'));
        dd(0=='a1');
        dispatch(new Insert());
        dd('ok');
        //try{
        //    throw new Exception('ok');
        //}catch (Exception $exception){
        //    dd($exception);
        //}
        //dd('ok');
        //dispatch(new SendEmail('781692742@qq.com'));
        //sleep(2);
        Redis::publish('test-channel', json_encode(['foo' => 'bar']));
        dd('ok');
        $image = Image::make('images/2.png')->insert('images/water.png')->resize(200, 200)->save('images/3.png');
        //$height = $image->width();
        //dd($height);
       echo "<img src='images/3.png'>";
        //return QrCode::encoding('UTF-8')->generate('你好，Laravel学院！');
    }

    /**
     *设置共享锁
     */
    public function sharedLock(){
       $users = DB::table('users')->where('id', '>', 2)->lockForUpdate()->get();
       if($users->count()){
           foreach($users as $user){
               if($user->id== 5){
                   DB::beginTransaction();
                    $res1  = DB::table('users')->where('id', 5)->update(['name'=>'xiaoxiao']);
                   $resBegin = DB::table('users')->where('id', 5)->lockForUpdate()->get();
                   DB::commit();
               }
           }
       }
       //$res = DB::table('users')->where('id', 5)->lockForUpdate()->get();
       return [$users,$res1,$resBegin];
    }
    public function updateForLock(){
        return DB::table('users')->where('id', 5)->lockForUpdate()->get();
    }

    /**
     *
     */
    public function excel(){
        $file = storage_path().'/number.xlsx';
        Excel::load($file,function($item){
            $all = $item->getSheet(0);
            dd($all->getNumberFormat());
        });
    }
}
