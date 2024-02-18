<?php /** @noinspection TypeUnsafeComparisonInspection */

use App\Helpers\SmsHelper;
use App\Helpers\YalidineHttpHelper;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SendSmsController;
use App\Http\Controllers\SerachController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Modules\Orders\Entities\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sync', function () {
    YalidineHttpHelper::updateParcelsInDb();
});

Route::name('store.')->group(function () {
    Route::middleware('hsd')->group(function () {
        Route::get('/', function (Request $request) {
            $host = $request->getHttpHost();
            $host = str_replace("www.", "", $host);
            if (
                $host == 'kenzii.me' || $host == "www.kenzii.me" ||
                $host == 'lasoft.pro' || $host == "www.lasoft.pro"

            ) {
                return App::call('Modules\Kenzii\Http\Controllers\KenziiController@index');
            }

            if ($host == 'order-kenzii.shop' || $host == "www.order-kenzii.shop") {
                return App::call('Modules\Kenzii\Http\Controllers\KenziiController@index');
            }

            if ($host == 'barbarostools.com' || $host == "www.barbarostools.com" || $host == "bodyfuel.shop") {
                return App::call('Modules\BarbarosTools\Http\Controllers\BarbarosToolsController@index');
            }

            if ($host == 'darlbricole.com' || $host == "www.darlbricole.com") {
                return App::call('Modules\BarbarosTools\Http\Controllers\BarbarosToolsController@index');
            }

            return App::call('Modules\Kenzii\Http\Controllers\KenziiController@index');
        })->name('home');
    });
});

Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [HomeController::class, 'home']);
        Route::get('home', [StaterkitController::class, 'home'])->name('home');
    });
});

// Route Components


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::get('sms/{num}', function ($num) {
    // SmsHelper::sendSms("تم استلام طلبك رقم 453 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("تم تأكيد طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    SmsHelper::sendSms("تم ارسال طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("يرجى الرد على الهاتف لتأكيد طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("وصل طلبك  رقم 432 إلى ولايتك \nfb.com/rimoucha.shop", $num);
    //  SmsHelper::sendSms("عامل التسلم في طريقه لتسليم الطرد الخاص بك \nfb.com/rimoucha.shop", $num);
    return SmsHelper::sendSms("تم إلغاء طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
});

Route::post('send/sms', [SendSmsController::class, 'store'])->name('send.sms');

Route::get('search', [SerachController::class, 'index'])->name('search');


Route::get('yalidine/get/{yal}', function ($yal) {
    return YalidineHttpHelper::getParcelHistoryByYal($yal)['data'];
});

Route::get('yalidine/create', function () {
    return YalidineHttpHelper::createParcel(Order::all()->first());
});


Route::get('yalidine/update', function () {
    YalidineHttpHelper::updateParcelsInDb();
});


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::get('sms/{num}', function ($num) {
    // SmsHelper::sendSms("تم استلام طلبك رقم 453 سنتصل بك للتأكيد. \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("تم تأكيد طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    SmsHelper::sendSms("تم ارسال طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("يرجى الرد على الهاتف لتأكيد طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
    //SmsHelper::sendSms("وصل طلبك  رقم 432 إلى ولايتك \nfb.com/rimoucha.shop", $num);
    //  SmsHelper::sendSms("عامل التسلم في طريقه لتسليم الطرد الخاص بك \nfb.com/rimoucha.shop", $num);
    return SmsHelper::sendSms("تم إلغاء طلبك رقم 432 \nfb.com/rimoucha.shop", $num);
});

Route::post('send/sms', [SendSmsController::class, 'store'])->name('send.sms');

Route::get('search', [SerachController::class, 'index'])->name('search');


Route::get('yalidine/get/{yal}', function ($yal) {
    return YalidineHttpHelper::getParcelHistoryByYal($yal)['data'];
});

Route::get('yalidine/create', function () {
    return YalidineHttpHelper::createParcel(Order::all()->first());
});


Route::get('yalidine/update', function () {
    YalidineHttpHelper::updateParcelsInDb();
});


Route::get('/download_apk', function () {

    $file = public_path() . "/ActiCom.apk";

    $headers = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, 'ActiCom.apk', $headers);

    /* return asset('ActiCom.apk'); */
})->middleware('auth');


/*
142 Pcs combinatio n tools set   (THKTHP21426)
147pcs handtools set   (THKTHP21476)
Digital AC clamp meter   (TMT42002)
Digital AC clamp meter   (TMT46003)
Digital AC clamp meter   (TMT410002)
Digital multimeter   (TMT47503)
Digital multimeter   (TMT460012)
Digital multimeter   (TMT46001)
Laser Distance Detector   (TMT5402)
Laser Distance Detector   (TMT56016)
Inverter MMA Welding machine   (TW21306)
Inverter MMA Welding machine   (TW21606)
Inverter MMA Welding machine   (TW21806)
Inverter MMA Welding machine   (TW21605)
Digital Humidity& Temperatu re Meter   (TETHT01)
High pressure washer   (TGT11316)
SelfLeveling Line Laser(Red laser beams)   (TLL306505)
SelfLeveling Line Laser   (TLL156506)
Circular saw   (TS11418526)
7 Pcs Telecom Tools set   (THKTV02T071)
29 Pcs household tools set   (THKTV02H291)
4 Pcs Pliers set   (THKTV02P041)
High pressure washer   (TGT11236)
Angle grinder   (TG10711556)
Vacuum cleaner   (TVC20258)
Reciprocati ng saw   (TS100806)
Electric drill (TD502106)
Auto air compressor (TTAC1406)
LithiumIon Cordless 2- Pc. Combo Kit (TCKLI200)

*/