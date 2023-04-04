    <?php

    use App\Http\Controllers\listingController;
    use App\Http\Controllers\userController;
    use App\Models\Listing;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', [listingController::class, 'index']);
    Route::get(
        '/listings/create',
        [listingController::class, 'create']
    )->middleware('auth');
    Route::get(
        '/listings/manage',
        [listingController::class, 'manage']
    );

    Route::post(
        '/listings/create',
        [listingController::class, 'store']
    )->middleware('auth');
    Route::put(
        '/listings/update/{listing}',
        [listingController::class, 'update']
    )->middleware('auth');
    Route::delete(
        '/listings/delete/{listing}',
        [listingController::class, 'destroy']
    )->middleware('auth');


    Route::get(
        '/listing/{listing}/edit',
        [listingController::class, 'edit']
    )->middleware('auth');

    Route::get(
        '/listings/{listing}',
        [listingController::class, 'show']
    );


    // user
    Route::get('/foo', function () {
        Artisan::call('storage:link');
    });
    Route::get(
        '/register',
        [userController::class, 'create']
    )->middleware('guest');
    Route::post(
        '/user',
        [userController::class, 'store']
    )->middleware('guest');;
    Route::post(
        '/logout',
        [userController::class, 'logout']
    )->middleware('auth');;
    Route::get(
        '/user/login',
        [userController::class, 'login']
    )->middleware('guest')->name('login');
    Route::post(
        '/user/authntiacate',
        [userController::class, 'authntiacate']
    )->middleware('guest');;
