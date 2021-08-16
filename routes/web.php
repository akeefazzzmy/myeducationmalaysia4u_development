<?php
//hgkh
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

// Route::get('/', function()
// {
//     return view('welcome');
// });

//-----------------------------------------------------------------------------------CODING SEBELUM-------------------------------------------------------------------------------------------------------------------//
//--------------------------------------------------------------------WELCOME----------------------------------------------------------------------------------------------------------//
// Route::get('/', [App\Http\Controllers\welcomeController::class, 'welcomeShow']);

// Route::get('/populateEM', [App\Http\Controllers\welcomeController::class, 'populateEM'])->name('welcome.populateEM');
//--------------------------------------------------------------------CARIAN PELAJAR----------------------------------------------------------------------------------------------------------//

// Auth::routes();

//Reload captcha register
// Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

// Route::redirect('/login','/new-login',301);

// //reset new password
// Route::get('/reset-pwd', [App\Http\Controllers\ResetPwdController::class, 'index'])->name('reset');
// Route::post('/reset-pwd', [App\Http\Controllers\ResetPwdController::class, 'resetProcess'])->name('reset:process');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// //Login User Interface
// Route::get('/new-login', [App\Http\Controllers\LoginController::class, 'loginInterface'])->name('new-login:ui');
// Route::post('/new-login', [App\Http\Controllers\LoginController::class, 'loginProcess'])->name('new-login:process');

//User Admin Dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

//method (uri,action)
Route::get('/list-em',[App\Http\Controllers\EMController::class, 'show'])->name('em.show');
//Route::get('/list-em',[App\Http\Controllers\EMController::class, 'senaraiEM'])->name('list-em.senaraiEM');
Route::get('/list-em',[App\Http\Controllers\EMController::class, 'senaraiLiputan'])->name('list-em.senaraiLiputan');

// //User Admin Profile
// Route::get('/pengurusan/my-profile', [App\Http\Controllers\Pengurusan\ProfileController::class, 'myProfile'])->name('my-profile');
// Route::post('/pengurusan/my-profile', [App\Http\Controllers\Pengurusan\ProfileController::class, 'updateProfile'])->name('update-profile');
// Route::get('/pengurusan/password', [App\Http\Controllers\Pengurusan\ProfileController::class, 'myProfilePassword'])->name('my-profile-password');
// Route::post('/pengurusan/password', [App\Http\Controllers\Pengurusan\ProfileController::class, 'updatePassword'])->name('update-password');

//User Admin Add EM/Duta User
Route::get('/pengurusan/admin', [App\Http\Controllers\Pengurusan\AdminController::class, 'senarai'])->name('admin.senarai');
Route::get('/pengurusan/admin-create', [App\Http\Controllers\Pengurusan\AdminController::class, 'showCreateNew'])->name('admin.create');
Route::post('/pengurusan/admin-create', [App\Http\Controllers\Pengurusan\AdminController::class, 'adminCreateSimpan'])->name('admin-simpan');
Route::get('/pengurusan/admin/{admin}', [App\Http\Controllers\Pengurusan\AdminController::class, 'showAdmin'])->name('admin.show');
Route::post('/pengurusan/admin/{admin}', [App\Http\Controllers\Pengurusan\AdminController::class, 'updateAdmin'])->name('admin-update');
//---------------------------------------------------------------------------------------------------------------------------CODING SBELUM end------------------------------------------------------------------------------//
Route::get('/std/std-profile', [App\Http\Controllers\Std\ProfileController::class, 'stdProfile'])->name('std-profile');
Route::post('/std/std-profile', [App\Http\Controllers\Std\ProfileController::class, 'stdUpdateProfile'])->name('update-std-profile');

//----------------------------------------------------------CODING BARU start----------------------------------//

//WELCOME start
Route::get('/', [App\Http\Controllers\welcomeController::class, 'welcomeShow']);
//WELCOME-maklumatkorporat start
Route::get('/pengenalan', [App\Http\Controllers\Welcome\PengenalanController::class, 'index'])->name('welcome-pengenalan:index');
Route::get('/sejarah', [App\Http\Controllers\Welcome\SejarahController::class, 'index'])->name('welcome-sejarah:index');
Route::get('/cartaorganisasi', [App\Http\Controllers\Welcome\CartaOrganisasiController::class, 'index'])->name('welcome-cartaorganisasi:index');
Route::get('/polisi', [App\Http\Controllers\Welcome\PolisiController::class, 'index'])->name('welcome-polisi:index');
//WELCOME-maklumatkorporat end
//WELCOME-hubungikami start
Route::get('/direktoriEm', [App\Http\Controllers\Welcome\DirektoriEmController::class, 'index'])->name('welcome-direktoriEm:index');
Route::get('/direktoriBem', [App\Http\Controllers\Welcome\DirektoriBemController::class, 'index'])->name('welcome-direktoriBem:index');
//WELCOME-hubungikami end
// Route::get('/', function(){return view('welcome');}); //from blog1
//WELCOME end

//populate
Route::get('/populateEM', [App\Http\Controllers\welcomeController::class, 'populateEM'])->name('welcome.populateEM');
Route::get('/populateNegaraToState', [App\Http\Controllers\PopulateController::class, 'populateNegaraToState'])->name('populateNegaraToState');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('redirect.role');
Route::get('/reload-captcha', [App\Http\Controllers\Auth\RegisterController::class, 'reloadCaptcha']);

//reset new password
Route::get('/reset-pwd', [App\Http\Controllers\ResetPwdController::class, 'index'])->name('reset');
Route::post('/reset-pwd', [App\Http\Controllers\ResetPwdController::class, 'resetProcess'])->name('reset:process');

//Login User Interface
// Route::get('/new-login', [App\Http\Controllers\LoginController::class, 'loginInterface'])->name('new-login:ui');
// Route::post('/new-login', [App\Http\Controllers\LoginController::class, 'loginProcess'])->name('new-login:process');

//ADMIN start
    Route::middleware(['auth', 'admin'])->group(function()
    {
        //masukkan apa2 route admin dalam ni

        //dashboard
        Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin-dashboard:dashboard');

        //User Admin Profile
        Route::get('/admin/my-profile', [App\Http\Controllers\Admin\MyProfileController::class, 'myProfile'])->name('admin-my-profile');
        Route::post('/admin/my-profile', [App\Http\Controllers\Admin\MyProfileController::class, 'updateProfile'])->name('admin-update-profile');
        Route::get('/admin/password', [App\Http\Controllers\Admin\MyProfileController::class, 'myProfilePassword'])->name('admin-my-profile-password');
        Route::post('/admin/password', [App\Http\Controllers\Admin\MyProfileController::class, 'updatePassword'])->name('admin-update-password');

        //em
        Route::get( '/admin/em', [App\Http\Controllers\Admin\EmController::class, 'index'])->name('admin-em:index');
        Route::get('/admin/em/create', [App\Http\Controllers\Admin\EmController::class, 'create'])->name('admin-em:create');
        Route::post('/admin/em/create', [App\Http\Controllers\Admin\EmController::class, 'store'])->name('admin-em:store');
        Route::get('/admin/em/{em}', [App\Http\Controllers\Admin\EmController::class, 'show'])->name('admin-em:show');
        Route::get('/admin/em/edit/{em}', [App\Http\Controllers\Admin\EmController::class, 'edit'])->name('admin-em:edit');
        Route::post('/admin/em/edit/{em}', [App\Http\Controllers\Admin\EmController::class, 'update'])->name('admin-em:update');
        Route::get('/admin/em/delete/{em}', [App\Http\Controllers\Admin\EmController::class, 'destroy'])->name('admin-em:destroy');

        Route::get('admin/emList', [App\Http\Controllers\Admin\EmController::class, 'getEm'])->name('admin-em:list'); //DATATABLE YAJRA
        // Route::get('admin/negaraLiputanList', [App\Http\Controllers\Admin\EmController::class, 'getNegaraLiputan'])->name('admin-negaraLiputan:list'); //DATATABLE YAJRA

        Route::get('/admin/em/createLiputan/{em}', [App\Http\Controllers\Admin\EmController::class, 'createLiputan'])->name('admin-em-createLiputan:create');
        Route::post('/admin/em/createLiputan/{em}', [App\Http\Controllers\Admin\EmController::class, 'storeLiputan'])->name('admin-em-createLiputan:store');
        Route::get('/admin/em/deleteLiputan/{em}', [App\Http\Controllers\Admin\EmController::class, 'destroyLiputan'])->name('admin-em-createLiputan:destroy');
        
        //liputan em
        Route::get( '/admin/liputanEm', [App\Http\Controllers\Admin\LiputanEmController::class, 'index'])->name('admin-liputanEm:index');
        Route::get('/admin/liputanEm/create', [App\Http\Controllers\Admin\LiputanEmController::class, 'create'])->name('admin-liputanEm:create');
        Route::post('/admin/liputanEm/create', [App\Http\Controllers\Admin\LiputanEmController::class, 'store'])->name('admin-liputanEm:store');
        Route::get('/admin/liputanEm/{liputan}', [App\Http\Controllers\Admin\LiputanEmController::class, 'show'])->name('admin-liputanEm:show');
        Route::get('/admin/liputanEm/edit/{liputan}', [App\Http\Controllers\Admin\LiputanEmController::class, 'edit'])->name('admin-liputanEm:edit');
        Route::post('/admin/liputanEm/edit/{liputan}', [App\Http\Controllers\Admin\LiputanEmController::class, 'update'])->name('admin-liputanEm:update');
        Route::get('/admin/liputanEm/delete/{liputan}', [App\Http\Controllers\Admin\LiputanEmController::class, 'destroy'])->name('admin-liputanEm:destroy');
        Route::get('admin/liputanEmList', [App\Http\Controllers\Admin\LiputanEmController::class, 'getLiputanEm'])->name('admin-liputanEm:list'); //DATATABLE YAJRA
        //negara
        Route::get( '/admin/negara', [App\Http\Controllers\Admin\NegaraController::class, 'index'])->name('admin-negara:index');
        Route::get('/admin/negara/create', [App\Http\Controllers\Admin\NegaraController::class, 'create'])->name('admin-negara:create');
        Route::post('/admin/negara/create', [App\Http\Controllers\Admin\NegaraController::class, 'store'])->name('admin-negara:store');
        Route::get('/admin/negara/{negara}', [App\Http\Controllers\Admin\NegaraController::class, 'show'])->name('admin-negara:show');
        Route::get('/admin/negara/edit/{negara}', [App\Http\Controllers\Admin\NegaraController::class, 'edit'])->name('admin-negara:edit');
        Route::post('/admin/negara/edit/{negara}', [App\Http\Controllers\Admin\NegaraController::class, 'update'])->name('admin-negara:update');
        Route::get('/admin/negara/delete/{negara}', [App\Http\Controllers\Admin\NegaraController::class, 'destroy'])->name('admin-negara:destroy');
        Route::get('admin/negaraList', [App\Http\Controllers\Admin\NegaraController::class, 'getNegara'])->name('admin-negara:list'); //DATATABLE YAJRA
        //states
        Route::get( '/admin/states', [App\Http\Controllers\Admin\StatesController::class, 'index'])->name('admin-states:index');
        Route::get('/admin/states/create', [App\Http\Controllers\Admin\StatesController::class, 'create'])->name('admin-states:create');
        Route::post('/admin/states/create', [App\Http\Controllers\Admin\StatesController::class, 'store'])->name('admin-states:store');
        Route::get('/admin/states/{states}', [App\Http\Controllers\Admin\StatesController::class, 'show'])->name('admin-states:show');
        Route::get('/admin/states/edit/{states}', [App\Http\Controllers\Admin\StatesController::class, 'edit'])->name('admin-states:edit');
        Route::post('/admin/states/edit/{states}', [App\Http\Controllers\Admin\StatesController::class, 'update'])->name('admin-states:update');
        Route::get('/admin/states/delete/{states}', [App\Http\Controllers\Admin\StatesController::class, 'destroy'])->name('admin-states:destroy');
        Route::get('admin/statesList', [App\Http\Controllers\Admin\StatesController::class, 'getStates'])->name('admin-states:list'); //DATATABLE YAJRA
        Route::get('/admin/populateStates', [App\Http\Controllers\Admin\StatesController::class, 'populateStates'])->name('admin-populateStates'); //Retrieve
        //negeri
        Route::get( '/admin/negeri', [App\Http\Controllers\Admin\NegeriController::class, 'index'])->name('admin-negeri:index');
        Route::get('/admin/negeri/create', [App\Http\Controllers\Admin\NegeriController::class, 'create'])->name('admin-negeri:create');
        Route::post('/admin/negeri/create', [App\Http\Controllers\Admin\NegeriController::class, 'store'])->name('admin-negeri:store');
        Route::get('/admin/negeri/{negeri}', [App\Http\Controllers\Admin\NegeriController::class, 'show'])->name('admin-negeri:show');
        Route::get('/admin/negeri/edit/{negeri}', [App\Http\Controllers\Admin\NegeriController::class, 'edit'])->name('admin-negeri:edit');
        Route::post('/admin/negeri/edit/{negeri}', [App\Http\Controllers\Admin\NegeriController::class, 'update'])->name('admin-negeri:update');
        Route::get('/admin/negeri/delete/{negeri}', [App\Http\Controllers\Admin\NegeriController::class, 'destroy'])->name('admin-negeri:destroy');
        Route::get('admin/negeriList', [App\Http\Controllers\Admin\NegeriController::class, 'getNegeri'])->name('admin-negeri:list'); //DATATABLE YAJRA
        //tahap pengajian
        Route::get( '/admin/tahappengajian', [App\Http\Controllers\Admin\TahapPengajianController::class, 'index'])->name('admin-tahappengajian:index');
        Route::get('/admin/tahappengajian/create', [App\Http\Controllers\Admin\TahapPengajianController::class, 'create'])->name('admin-tahappengajian:create');
        Route::post('/admin/tahappengajian/store', [App\Http\Controllers\Admin\TahapPengajianController::class, 'store'])->name('admin-tahappengajian:store');
        Route::get('/admin/tahappengajian/{tahap}', [App\Http\Controllers\Admin\TahapPengajianController::class, 'show'])->name('admin-tahappengajian:show');
        Route::get('/admin/tahappengajian/edit/{tahap}', [App\Http\Controllers\Admin\TahapPengajianController::class, 'edit'])->name('admin-tahappengajian:edit');
        Route::post('/admin/tahappengajian/edit/{tahap}', [App\Http\Controllers\Admin\TahapPengajianController::class, 'update'])->name('admin-tahappengajian:update');
        Route::get('/admin/tahappengajian/delete/{tahap}', [App\Http\Controllers\Admin\TahapPengajianController::class, 'destroy'])->name('admin-tahappengajian:destroy');
        Route::get('admin/tahapPengajianList', [App\Http\Controllers\Admin\TahapPengajianController::class, 'getTahapPengajian'])->name('admin-tahappengajian:list'); //DATATABLE YAJRA
        //bidang
        Route::get( '/admin/bidangpengajian', [App\Http\Controllers\Admin\BidangPengajianController::class, 'index'])->name('admin-bidangpengajian:index');
        Route::get('/admin/bidangpengajian/create', [App\Http\Controllers\Admin\BidangPengajianController::class, 'create'])->name('admin-bidangpengajian:create');
        Route::post('/admin/tahappengajian/create', [App\Http\Controllers\Admin\BidangPengajianController::class, 'store'])->name('admin-bidangpengajian:store');
        Route::get('/admin/bidangpengajian/show/{bidang}', [App\Http\Controllers\Admin\BidangPengajianController::class, 'show'])->name('admin-bidangpengajian:show');
        Route::get('/admin/bidangpengajian/edit/{bidang}', [App\Http\Controllers\Admin\BidangPengajianController::class, 'edit'])->name('admin-bidangpengajian:edit');
        Route::post('/admin/bidangpengajian/edit/{bidang}', [App\Http\Controllers\Admin\BidangPengajianController::class, 'update'])->name('admin-bidangpengajian:update');
        Route::get('/admin/bidangpengajian/delete/{bidang}', [App\Http\Controllers\Admin\BidangPengajianController::class, 'destroy'])->name('admin-bidangpengajian:destroy');
        
        Route::get('/admin/bidangpengajianList', [App\Http\Controllers\Admin\BidangPengajianController::class, 'getBidangPengajian'])->name('admin-bidangpengajian:list'); //DATATABLE YAJRA
        //status pengajian
        Route::get( '/admin/statuspengajian', [App\Http\Controllers\Admin\StatusPengajianController::class, 'index'])->name('admin-statuspengajian:index');
        Route::get('/admin/statuspengajian/create', [App\Http\Controllers\Admin\StatusPengajianController::class, 'create'])->name('admin-statuspengajian:create');
        Route::post('/admin/statuspengajian/create', [App\Http\Controllers\Admin\StatusPengajianController::class, 'store'])->name('admin-statuspengajian:store');
        Route::get('/admin/statuspengajian/{status}', [App\Http\Controllers\Admin\StatusPengajianController::class, 'show'])->name('admin-statuspengajian:show');
        Route::get('/admin/statuspengajian/edit/{status}', [App\Http\Controllers\Admin\StatusPengajianController::class, 'edit'])->name('admin-statuspengajian:edit');
        Route::post('/admin/statuspengajian/edit/{status}', [App\Http\Controllers\Admin\StatusPengajianController::class, 'update'])->name('admin-statuspengajian:update');
        Route::get('/admin/statuspengajian/delete/{status}', [App\Http\Controllers\Admin\StatusPengajianController::class, 'destroy'])->name('admin-statuspengajian:destroy');

        Route::get('admin/statusPengajianList', [App\Http\Controllers\Admin\StatusPengajianController::class, 'getStatusPengajian'])->name('admin-statuspengajian:list'); //DATATABLE YAJRA
        //institusi
        Route::get( '/admin/institusi', [App\Http\Controllers\Admin\InstitusiController::class, 'index'])->name('admin-institusi:index');
        Route::get('/admin/institusi/create', [App\Http\Controllers\Admin\InstitusiController::class, 'create'])->name('admin-institusi:create');
        Route::post('/admin/institusi/create', [App\Http\Controllers\Admin\InstitusiController::class, 'store'])->name('admin-institusi:store');
        Route::get('/admin/institusi/{institusi}', [App\Http\Controllers\Admin\InstitusiController::class, 'show'])->name('admin-institusi:show');
        Route::get('/admin/institusi/edit/{institusi}', [App\Http\Controllers\Admin\InstitusiController::class, 'edit'])->name('admin-institusi:edit');
        Route::post('/admin/institusi/edit/{institusi}', [App\Http\Controllers\Admin\InstitusiController::class, 'update'])->name('admin-institusi:update');
        Route::get('/admin/institusi/delete/{institusi}', [App\Http\Controllers\Admin\InstitusiController::class, 'destroy'])->name('admin-institusi:destroy');
        Route::get('/admin/institusiList', [App\Http\Controllers\Admin\InstitusiController::class, 'getInstitusi'])->name('admin-institusi:list'); //DATATABLE YAJRA
        //penaja
        Route::get( '/admin/penaja', [App\Http\Controllers\Admin\PenajaController::class, 'index'])->name('admin-penaja:index');
        Route::get('/admin/penaja/create', [App\Http\Controllers\Admin\PenajaController::class, 'create'])->name('admin-penaja:create');
        Route::post('/admin/penaja/create', [App\Http\Controllers\Admin\PenajaController::class, 'store'])->name('admin-penaja:store');
        Route::get('/admin/penaja/{penaja}', [App\Http\Controllers\Admin\PenajaController::class, 'show'])->name('admin-penaja:show');
        Route::get('/admin/penaja/edit/{penaja}', [App\Http\Controllers\Admin\PenajaController::class, 'edit'])->name('admin-penaja:edit');
        Route::post('/admin/penaja/edit/{penaja}', [App\Http\Controllers\Admin\PenajaController::class, 'update'])->name('admin-penaja:update');
        Route::get('/admin/penaja/delete/{penaja}', [App\Http\Controllers\Admin\PenajaController::class, 'destroy'])->name('admin-penaja:destroy');

        Route::get('admin/penajaList', [App\Http\Controllers\Admin\PenajaController::class, 'getPenaja'])->name('admin-penaja:list'); //DATATABLE YAJRA
        //status pengguna
        Route::get( '/admin/statusUsers', [App\Http\Controllers\Admin\StatusUserController::class, 'index'])->name('admin-statusUsers:index');
        Route::get('/admin/statusUsers/create', [App\Http\Controllers\Admin\StatusUserController::class, 'create'])->name('admin-statusUsers:create');
        Route::post('/admin/statusUsers/create', [App\Http\Controllers\Admin\StatusUserController::class, 'store'])->name('admin-statusUsers:store');
        Route::get('/admin/statusUsers/{status}', [App\Http\Controllers\Admin\StatusUserController::class, 'show'])->name('admin-statusUsers:show');
        Route::get('/admin/statusUsers/edit/{status}', [App\Http\Controllers\Admin\StatusUserController::class, 'edit'])->name('admin-statusUsers:edit');
        Route::post('/admin/statusUsers/edit/{status}', [App\Http\Controllers\Admin\StatusUserController::class, 'update'])->name('admin-statusUsers:update');
        Route::get('/admin/statusUsers/delete/{status}', [App\Http\Controllers\Admin\StatusUserController::class, 'destroy'])->name('admin-statusUsers:destroy');
        //hubungan
        Route::get( '/admin/hubungan', [App\Http\Controllers\Admin\HubunganController::class, 'index'])->name('admin-hubungan:index');
        Route::get('/admin/hubungan/create', [App\Http\Controllers\Admin\HubunganController::class, 'create'])->name('admin-hubungan:create');
        Route::post('/admin/hubungan/create', [App\Http\Controllers\Admin\HubunganController::class, 'store'])->name('admin-hubungan:store');
        Route::get('/admin/hubungan/{hubungan}', [App\Http\Controllers\Admin\HubunganController::class, 'show'])->name('admin-hubungan:show');
        Route::get('/admin/hubungan/edit/{hubungan}', [App\Http\Controllers\Admin\HubunganController::class, 'edit'])->name('admin-hubungan:edit');
        Route::post('/admin/hubungan/edit/{hubungan}', [App\Http\Controllers\Admin\HubunganController::class, 'update'])->name('admin-hubungan:update');
        Route::get('/admin/hubungan/delete/{hubungan}', [App\Http\Controllers\Admin\HubunganController::class, 'destroy'])->name('admin-hubungan:destroy');

        Route::get('admin/hubunganList', [App\Http\Controllers\Admin\HubunganController::class, 'getHubungan'])->name('admin-hubungan:list'); //DATATABLE YAJRA
        //agama
        Route::get( '/admin/agama', [App\Http\Controllers\Admin\AgamaController::class, 'index'])->name('admin-agama:index');
        Route::get('/admin/agama/create', [App\Http\Controllers\Admin\AgamaController::class, 'create'])->name('admin-agama:create');
        Route::post('/admin/agama/create', [App\Http\Controllers\Admin\AgamaController::class, 'store'])->name('admin-agama:store');
        Route::get('/admin/agama/{agama}', [App\Http\Controllers\Admin\AgamaController::class, 'show'])->name('admin-agama:show');
        Route::get('/admin/agama/edit/{agama}', [App\Http\Controllers\Admin\AgamaController::class, 'edit'])->name('admin-agama:edit');
        Route::post('/admin/agama/edit/{agama}', [App\Http\Controllers\Admin\AgamaController::class, 'update'])->name('admin-agama:update');
        Route::get('/admin/agama/delete/{agama}', [App\Http\Controllers\Admin\AgamaController::class, 'destroy'])->name('admin-agama:destroy');
        Route::get('admin/agamaList', [App\Http\Controllers\Admin\AgamaController::class, 'getAgama'])->name('admin-agama:list'); //DATATABLE YAJRA
        //bangsa
        Route::get( '/admin/bangsa', [App\Http\Controllers\Admin\BangsaController::class, 'index'])->name('admin-bangsa:index');
        Route::get('/admin/bangsa/create', [App\Http\Controllers\Admin\BangsaController::class, 'create'])->name('admin-bangsa:create');
        Route::post('/admin/bangsa/create', [App\Http\Controllers\Admin\BangsaController::class, 'store'])->name('admin-bangsa:store');
        Route::get('/admin/bangsa/{bangsa}', [App\Http\Controllers\Admin\BangsaController::class, 'show'])->name('admin-bangsa:show');
        Route::get('/admin/bangsa/edit/{bangsa}', [App\Http\Controllers\Admin\BangsaController::class, 'edit'])->name('admin-bangsa:edit');
        Route::post('/admin/bangsa/edit/{bangsa}', [App\Http\Controllers\Admin\BangsaController::class, 'update'])->name('admin-bangsa:update');
        Route::get('/admin/bangsa/delete/{bangsa}', [App\Http\Controllers\Admin\BangsaController::class, 'destroy'])->name('admin-bangsa:destroy');
        Route::get('admin/bangsaList', [App\Http\Controllers\Admin\BangsaController::class, 'getBangsa'])->name('admin-bangsa:list'); //DATATABLE YAJRA

        //vaksinasi
        // Route::get( '/admin/vaksinasi', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'index'])->name('admin-vaksinasi:index');
        Route::get( '/admin/vaksinasi', [App\Http\Controllers\Admin\VaksinasiController::class, 'index'])->name('admin-vaksinasi:index');
            //vaksinasi-status
            Route::get('/admin/vaksinasi-status/create', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'create'])->name('admin-vaksinasi-status:create');
            Route::post('/admin/vaksinasi-status/create', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'store'])->name('admin-vaksinasi-status:store');
            Route::get('/admin/vaksinasi-status/edit/{statusVaksinasi}', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'edit'])->name('admin-vaksinasi-status:edit');
            Route::post('/admin/vaksinasi-status/edit/{statusVaksinasi}', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'update'])->name('admin-vaksinasi-status:update');
            Route::get('/admin/vaksinasi-status/delete/{statusVaksinasi}', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'destroy'])->name('admin-vaksinasi-status:destroy');
            Route::get('admin/vaksinasi-status-list', [App\Http\Controllers\Admin\VaksinasiStatusController::class, 'getVaksinasiStatus'])->name('admin-vaksinasi-status:list'); //DATATABLE YAJRA
            //vaksinasi-jenis
            Route::get('/admin/vaksinasi-jenis/create', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'create'])->name('admin-vaksinasi-jenis:create');
            Route::post('/admin/vaksinasi-jenis/create', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'store'])->name('admin-vaksinasi-jenis:store');
            Route::get('/admin/vaksinasi-jenis/edit/{jenisVaksinasi}', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'edit'])->name('admin-vaksinasi-jenis:edit');
            Route::post('/admin/vaksinasi-jenis/edit/{jenisVaksinasi}', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'update'])->name('admin-vaksinasi-jenis:update');
            Route::get('/admin/vaksinasi-jenis/delete/{jenisVaksinasi}', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'destroy'])->name('admin-vaksinasi-jenis:destroy');
            Route::get('admin/vaksinasi-jenis-list', [App\Http\Controllers\Admin\VaksinasiJenisController::class, 'getVaksinasiJenis'])->name('admin-vaksinasi-jenis:list'); //DATATABLE YAJRA

        //waris
        Route::get( '/admin/waris', [App\Http\Controllers\Admin\WarisController::class, 'index'])->name('admin-waris:index');
        // Route::get('/admin/waris/create', [App\Http\Controllers\Admin\WarisController::class, 'create'])->name('admin-waris:create');
        // Route::post('/admin/waris/create', [App\Http\Controllers\Admin\WarisController::class, 'store'])->name('admin-waris:store');
        // Route::get('/admin/waris/{waris}', [App\Http\Controllers\Admin\WarisController::class, 'show'])->name('admin-waris:show');
        // Route::get('/admin/waris/edit/{waris}', [App\Http\Controllers\Admin\WarisController::class, 'edit'])->name('admin-waris:edit');
        // Route::post('/admin/waris/edit/{waris}', [App\Http\Controllers\Admin\WarisController::class, 'update'])->name('admin-waris:update');
        // Route::get('/admin/waris/delete/{waris}', [App\Http\Controllers\Admin\WarisController::class, 'destroy'])->name('admin-waris:destroy');
        //alamat penginapan pengajian pelajar
        Route::get('/admin/alamatpenginapanpengajian', [App\Http\Controllers\Admin\AlamatPenginapanPengajianController::class, 'index'])->name('admin-alamatpenginapanpengajian:index');
        Route::get('/admin/alamatpenginapanpengajian/create', [App\Http\Controllers\Admin\AlamatPenginapanPengajianController::class, 'create'])->name('admin-alamatpenginapanpengajian:create');
        Route::post('/admin/alamatpenginapanpengajian/create', [App\Http\Controllers\Admin\AlamatPenginapanPengajianController::class, 'store'])->name('admin-alamatpenginapanpengajian:store');
        //program pengajian
        Route::get( '/admin/programpengajian', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'index'])->name('admin-programpengajian:index');
        Route::get('/admin/programpengajian/create', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'create'])->name('admin-programpengajian:create');
        Route::post('/admin/programpengajian/create', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'store'])->name('admin-programpengajian:store');
        Route::get('/admin/programpengajian/{programpengajian}', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'show'])->name('admin-programpengajian:show');
        Route::get('/admin/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'edit'])->name('admin-programpengajian:edit');
        Route::post('/admin/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'update'])->name('admin-programpengajian:update');
        Route::get('/admin/programpengajian/delete/{programpengajian}', [App\Http\Controllers\Admin\ProgramPengajianController::class, 'destroy'])->name('admin-programpengajian:destroy');
        //pengajian pelajar
        Route::get( '/admin/pengajianpelajar', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'index'])->name('admin-pengajianpelajar:index');
        Route::get('/admin/pengajianpelajar/create', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'create'])->name('admin-pengajianpelajar:create');
        // Route::post('/admin/pengajianpelajar/create', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'store'])->name('admin-pengajianpelajar:store');
        // Route::get('/admin/pengajianpelajar/{pengajianpelajar}', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'show'])->name('admin-pengajianpelajar:show');
        // Route::get('/admin/pengajianpelajar/edit/{pengajianpelajar}', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'edit'])->name('admin-pengajianpelajar:edit');
        // Route::post('/admin/pengajianpelajar/edit/{pengajianpelajar}', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'update'])->name('admin-pengajianpelajar:update');
        // Route::get('/admin/pengajianpelajar/delete/{pengajianpelajar}', [App\Http\Controllers\Admin\PengajianPelajarController::class, 'destroy'])->name('admin-pengajianpelajar:destroy');
        //penaja pengajian
        Route::get( '/admin/penajapengajian', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'index'])->name('admin-penajapengajian:index');
        //not done yet START
        Route::get('/admin/penajapengajian/create', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'create'])->name('admin-penajapengajian:create');
        Route::post('/admin/penajapengajian/create', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'store'])->name('admin-penajapengajian:store');
        Route::get('/admin/penajapengajian/{penajapengajian}', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'show'])->name('admin-penajapengajian:show');
        Route::get('/admin/penajapengajian/edit/{penajapengajian}', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'edit'])->name('admin-penajapengajian:edit');
        Route::post('/admin/penajapengajian/edit/{penajapengajian}', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'update'])->name('admin-penajapengajian:update'); 
        Route::get('/admin/penajapengajian/delete/{penajapengajian}', [App\Http\Controllers\Admin\PenajaPengajianPelajarController::class, 'destroy'])->name('admin-penajapengajian:destroy');
        //not done yet END
        //pengguna
        Route::get( '/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin-users:index');
        //not done yet START
        Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin-users:create');
        Route::post('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin-users:store');
        Route::get('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin-users:show');
        Route::get('/admin/users/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin-users:edit');
        Route::post('/admin/users/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin-users:update');
        Route::get('/admin/users/delete/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin-users:destroy');
        //not done yet END
        //profil pelajar
        // Route::get( '/admin/profilpelajar', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'index'])->name('admin-profilpelajar:index');
        // Route::get('/admin/profilpelajar/create', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'create'])->name('admin-profilpelajar:create');
        // Route::post('/admin/profilpelajar/create', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'store'])->name('admin-profilpelajar:store');
        // Route::get('/admin/profilpelajar/{pelajar}', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'show'])->name('admin-profilpelajar:show');
        // Route::get('/admin/profilpelajar/edit/{pelajar}', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'edit'])->name('admin-profilpelajar:edit');
        // Route::post('/admin/profilpelajar/edit/{pelajar}', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'update'])->name('admin-profilpelajar:update');
        // Route::get('/admin/profilpelajar/delete/{pelajar}', [App\Http\Controllers\Admin\ProfilPelajarController::class, 'destroy'])->name('admin-profilpelajar:destroy');

        //PENGURUSAN PENGGUNA start
        //Pengguna-Admin
        Route::get( '/admin/penggunaAdmin', [App\Http\Controllers\Admin\PenggunaAdminController::class, 'index'])->name('admin-penggunaAdmin:index');
        Route::get( '/admin/penggunaAdmin/create', [App\Http\Controllers\Admin\PenggunaAdminController::class, 'create'])->name('admin-penggunaAdmin:create');
        Route::post('/admin/penggunaAdmin/create/{capaianID}/{statusUser}', [App\Http\Controllers\Admin\PenggunaAdminController::class, 'store'])->name('admin-penggunaAdmin:store');
        Route::get('/admin/penggunaAdmin/edit/{user}', [App\Http\Controllers\Admin\PenggunaAdminController::class, 'edit'])->name('admin-penggunaAdmin:edit');
        Route::post('/admin/penggunaAdmin/edit/{user}', [App\Http\Controllers\Admin\PenggunaAdminController::class, 'update'])->name('admin-penggunaAdmin:update');
        //Pengguna-BEM
        Route::get( '/admin/penggunaBem', [App\Http\Controllers\Admin\PenggunaBemController::class, 'index'])->name('admin-penggunaBem:index');
        Route::get( '/admin/penggunaBem/create', [App\Http\Controllers\Admin\PenggunaBemController::class, 'create'])->name('admin-penggunaBem:create');
        Route::post('/admin/penggunaBem/create/{capaianID}/{statusUser}', [App\Http\Controllers\Admin\PenggunaBemController::class, 'store'])->name('admin-penggunaBem:store');
        Route::get('/admin/penggunaBem/edit/{user}', [App\Http\Controllers\Admin\PenggunaBemController::class, 'edit'])->name('admin-penggunaBem:edit');
        Route::post('/admin/penggunaBem/edit/{user}', [App\Http\Controllers\Admin\PenggunaBemController::class, 'update'])->name('admin-penggunaBem:update');
        //Pengguna-EM
        Route::get( '/admin/penggunaEm', [App\Http\Controllers\Admin\PenggunaEmController::class, 'index'])->name('admin-penggunaEm:index');
        Route::get( '/admin/penggunaEm/create', [App\Http\Controllers\Admin\PenggunaEmController::class, 'create'])->name('admin-penggunaEm:create');
        Route::post('/admin/penggunaEm/create/{capaianID}/{statusUser}', [App\Http\Controllers\Admin\PenggunaEmController::class, 'store'])->name('admin-penggunaEm:store');
        Route::get('/admin/penggunaEm/edit/{user}', [App\Http\Controllers\Admin\PenggunaEmController::class, 'edit'])->name('admin-penggunaEm:edit');
        Route::post('/admin/penggunaEm/edit/{user}', [App\Http\Controllers\Admin\PenggunaEmController::class, 'update'])->name('admin-penggunaEm:update');
        //Pengguna-Kedutaan
        Route::get( '/admin/penggunaKedutaan', [App\Http\Controllers\Admin\PenggunaKedutaanController::class, 'index'])->name('admin-penggunaKedutaan:index');
        Route::get( '/admin/penggunaKedutaan/create', [App\Http\Controllers\Admin\PenggunaKedutaanController::class, 'create'])->name('admin-penggunaKedutaan:create');
        Route::post('/admin/penggunaKedutaan/create/{capaianID}/{statusUser}', [App\Http\Controllers\Admin\PenggunaKedutaanController::class, 'store'])->name('admin-penggunaKedutaan:store');
        
        //Pengguna-Pelajar
        Route::get( '/admin/penggunaPelajar', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'index'])->name('admin-penggunaPelajar:index');
        Route::post('/admin/penggunaPelajar/kp', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpShow'])->name('admin-penggunaPelajar-cariPelajarKp:show');

        Route::post('/admin/penggunaPelajar/kp/store', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpStore'])->name('admin-penggunaPelajar-cariPelajarKp:store');

        Route::get('/admin/penggunaPelajar/kp/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpShowGet'])->name('admin-penggunaPelajar-cariPelajarKp:show-get');
        Route::get('/admin/penggunaPelajar/kp/edit/{user}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpEdit'])->name('admin-penggunaPelajar-cariPelajarKp:edit');
        // Route::get('/admin/penggunaPelajar/kp-kemaskini/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpKemaskini'])->name('admin-penggunaPelajar-cariPelajarKpKemaskini:edit');
        Route::post('/admin/penggunaPelajar/kp/edit/{user}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpUpdate'])->name('admin-penggunaPelajar-cariPelajarKp:update');

        //pengguna pelajar not done yet
        Route::get('/admin/penggunaPelajar/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpGet'])->name('admin-penggunaPelajar:cariPelajarKp-get');

        Route::get( '/admin/penggunaPelajar/create/{no_kp}/{profilPelajarId}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'createWaris'])->name('admin-penggunaPelajar-waris:create');
        Route::post('/admin/penggunaPelajar/create/{no_kp}{profil_pelajar_id}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'storeWaris'])->name('admin-penggunaPelajar-waris:store');
        Route::get('/admin/penggunaPelajar/show/{waris}/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'showWaris'])->name('admin-penggunaPelajar-waris:show');
        Route::get('/admin/penggunaPelajar/edit/{waris}/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'editWaris'])->name('admin-penggunaPelajar-waris:edit');
        Route::post('/admin/penggunaPelajar/edit/{waris}/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'updateWaris'])->name('admin-penggunaPelajar-waris:post');
        Route::get('/admin/penggunaPelajar/delete/{waris}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'destroyWaris'])->name('admin-penggunaPelajar-waris:destroy');
        //pengguna pelajar not done yet end

        // Route::get( '/admin/penggunaPelajar/pengajian/create/{no_kp}{profilPelajarId}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'createpPengajianPelajar'])->name('admin-penggunaPelajar-pengajianpelajar:create');

        // Route::get('/admin/penggunaPelajar/create/{no_kp}{profil_pelajar_id}/populateNegaraToStates', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'populateNegaraToStates'])->name('admin-populateNegaraToStates'); //Retrieve
        // Route::get('/pelajar/populateStatesToInstitusi', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateStatesToInstitusi'])->name('pelajar-populateStatesToInstitusi'); //Retrieve
        // Route::get('/pelajar/populateBidangToProgram', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateBidangToProgram'])->name('pelajar-populateBidangToProgram'); //Retrieve
        //PENGURUSAN PENGGUNA end

        //Carian Pelajar START
            //Kad Pengenalan START
            Route::get('/admin/carianPelajar/kp', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'index'])->name('admin-carianPelajar-noKP:index');
            Route::post('/admin/carianPelajar/show', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'show'])->name('admin-carianPelajar-noKP:show');
            Route::get('/admin/carianPelajar/kp/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'showGet'])->name('admin-carianPelajar-noKP:showGet');

            Route::get('admin/warisList/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'getWaris'])->name('admin-carianPelajar-noKP-waris:list'); //DATATABLE YAJRA WARIS PELAJAR
            Route::get( '/admin/carianPelajar/waris/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'warisPelajarCreate'])->name('admin-carianPelajar-noKP-waris:create');
            Route::post('/admin/carianPelajar/waris/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'warisPelajarStore'])->name('admin-carianPelajar-noKP-waris:store');
            Route::get('/admin/carianPelajar/waris/edit/{waris}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'warisPelajarEdit'])->name('admin-carianPelajar-noKP-waris:edit');
            Route::post('/admin/carianPelajar/waris/edit/{waris}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'warisPelajarUpdate'])->name('admin-carianPelajar-noKP-waris:update');
            Route::get('/admin/carianPelajar/delete/{waris}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'warisPelajarDestroy'])->name('admin-carianPelajar-noKP-waris:destroy');

            Route::get('admin/pengajianPelajarList/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'getPengajianPelajar'])->name('admin-carianPelajar-noKP-pengajianpelajar:list'); //DATATABLE YAJRA PENGAJIAN PELAJAR
            Route::get( '/admin/carianPelajar/pengajianPelajar/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarCreate'])->name('admin-carianPelajar-noKP-pengajianPelajar:create');
            Route::post('/admin/carianPelajar/pengajianPelajar/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarStore'])->name('admin-carianPelajar-noKP-pengajianPelajar:store');
            // Route::get('/admin/carianPelajar/pengajianPelajar/{pengajian}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarShow'])->name('admin-carianPelajar-noKP-pengajianPelajar:show');
            Route::get('/admin/carianPelajar/pengajianPelajar/edit/{pengajian}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarEdit'])->name('admin-carianPelajar-noKP-pengajianPelajar:edit');
            Route::post('/admin/carianPelajar/pengajianPelajar/edit/{pengajian}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarUpdate'])->name('admin-carianPelajar-noKP-pengajianPelajar:update');
            Route::get('/admin/carianPelajar/pengajianPelajar/delete/{pengajian}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'pengajianPelajarDestroy'])->name('admin-carianPelajar-noKP-pengajianPelajar:destroy');
            Route::get('/admin/populateNegaraToStates', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'populateNegaraToStates'])->name('admin-populateNegaraToStates'); //populate
            Route::get('/admin/populateStatesToInstitusi', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'populateStatesToInstitusi'])->name('admin-populateStatesToInstitusi'); //populate
            Route::get('/admin/populateBidangToProgram', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'populateBidangToProgram'])->name('admin-populateBidangToProgram'); //populate

            Route::get('admin/vaksinasiPelajarList/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'getVaksinasi'])->name('admin-carianPelajar-noKP-vaksinasipelajar:list'); //DATATABLE YAJRA VAKSINASI PELAJAR
            Route::get( '/admin/carianPelajar/vaksinasiPelajar/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'vaksinasiPelajarCreate'])->name('admin-carianPelajar-noKP-vaksinasiPelajar:create');
            Route::post( '/admin/carianPelajar/vaksinasiPelajar/create/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'vaksinasiPelajarStore'])->name('admin-carianPelajar-noKP-vaksinasiPelajar:store');
            Route::get('/admin/carianPelajar/vaksinasiPelajar/delete/{vaksinasi}/{pelajar}', [App\Http\Controllers\Admin\CarianPelajarKadPengenalanController::class, 'vaksinasiPelajarDestroy'])->name('admin-carianPelajar-noKP-vaksinasiPelajar:destroy');

            // Route::get('/admin/penggunaPelajar/{no_kp}', [App\Http\Controllers\Admin\PenggunaPelajarController::class, 'cariPelajarKpGet'])->name('admin-penggunaPelajar:cariPelajarKp-get');

            //Kad Pengenalan END
            
            //Negara START
            Route::get('/admin/carianPelajar/negara', [App\Http\Controllers\Admin\CarianPelajarNegara::class, 'index'])->name('admin-carianPelajar-negara:index');
            //Negara END
        //Carian Pelajar END
    });
//ADMIN end

//BEM start
Route::middleware(['auth', 'bem'])->group(function()
    {
        //dashboard
        Route::get('/bem/dashboard', [App\Http\Controllers\Bem\DashboardController::class, 'dashboard'])->name('bem-dashboard:dashboard');

        //pengurusan profil
        Route::get('/bem/my-profile', [App\Http\Controllers\Bem\MyProfileController::class, 'myProfile'])->name('bem-my-profile');
        Route::post('/bem/my-profile', [App\Http\Controllers\Bem\MyProfileController::class, 'updateProfile'])->name('bem-update-profile');
        Route::get('/bem/password', [App\Http\Controllers\Bem\MyProfileController::class, 'myProfilePassword'])->name('bem-my-profile-password');
        Route::post('/bem/password', [App\Http\Controllers\Bem\MyProfileController::class, 'updatePassword'])->name('bem-update-password');

        //PENGURUSAN KOD start
        //program pengajian
        Route::get( '/bem/programpengajian', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'index'])->name('bem-programpengajian:index');
        Route::get('/bem/programpengajian/create', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'create'])->name('bem-programpengajian:create');
        Route::post('/bem/programpengajian/create', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'store'])->name('bem-programpengajian:store');
        Route::get('/bem/programpengajian/{programpengajian}', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'show'])->name('bem-programpengajian:show');
        Route::get('/bem/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'edit'])->name('bem-programpengajian:edit');
        Route::post('/bem/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'update'])->name('bem-programpengajian:update');
        Route::get('/bem/programpengajian/delete/{programpengajian}', [App\Http\Controllers\Bem\ProgramPengajianController::class, 'destroy'])->name('bem-programpengajian:destroy');
        //penaja
        Route::get( '/bem/penaja', [App\Http\Controllers\Bem\PenajaController::class, 'index'])->name('bem-penaja:index');
        Route::get('/bem/penaja/create', [App\Http\Controllers\Bem\PenajaController::class, 'create'])->name('bem-penaja:create');
        Route::post('/bem/penaja/create', [App\Http\Controllers\Bem\PenajaController::class, 'store'])->name('bem-penaja:store');
        Route::get('/bem/penaja/{penaja}', [App\Http\Controllers\Bem\PenajaController::class, 'show'])->name('bem-penaja:show');
        Route::get('/bem/penaja/edit/{penaja}', [App\Http\Controllers\Bem\PenajaController::class, 'edit'])->name('bem-penaja:edit');
        Route::post('/bem/penaja/edit/{penaja}', [App\Http\Controllers\Bem\PenajaController::class, 'update'])->name('bem-penaja:update');
        Route::get('/bem/penaja/delete/{penaja}', [App\Http\Controllers\Bem\PenajaController::class, 'destroy'])->name('bem-penaja:destroy');
        //em
        Route::get( '/bem/em', [App\Http\Controllers\Bem\EmController::class, 'index'])->name('bem-em:index');
        Route::get('/bem/em/create', [App\Http\Controllers\Bem\EmController::class, 'create'])->name('bem-em:create');
        Route::post('/bem/em/create', [App\Http\Controllers\Bem\EmController::class, 'store'])->name('bem-em:store');
        Route::get('/bem/em/{em}', [App\Http\Controllers\Bem\EmController::class, 'show'])->name('bem-em:show');
        Route::get('/bem/em/edit/{em}', [App\Http\Controllers\Bem\EmController::class, 'edit'])->name('bem-em:edit');
        Route::post('/bem/em/edit/{em}', [App\Http\Controllers\Bem\EmController::class, 'update'])->name('bem-em:update');
        Route::get('/bem/em/delete/{em}', [App\Http\Controllers\Bem\EmController::class, 'destroy'])->name('bem-em:destroy');
        //liputan em
        Route::get( '/bem/liputanEm', [App\Http\Controllers\Bem\LiputanEmController::class, 'index'])->name('bem-liputanEm:index');
        Route::get('/bem/liputanEm/create', [App\Http\Controllers\Bem\LiputanEmController::class, 'create'])->name('bem-liputanEm:create');
        Route::post('/bem/liputanEm/create', [App\Http\Controllers\Bem\LiputanEmController::class, 'store'])->name('bem-liputanEm:store');
        Route::get('/bem/liputanEm/{em}', [App\Http\Controllers\Bem\LiputanEmController::class, 'show'])->name('bem-liputanEm:show');
        // Route::get('/bem/liputanEm/edit/{em}', [App\Http\Controllers\Bem\LiputanEmController::class, 'edit'])->name('bem-liputanEm:edit');
        // Route::post('/bem/liputanEm/edit/{liputan}', [App\Http\Controllers\Bem\LiputanEmController::class, 'update'])->name('bem-liputanEm:update');
        Route::get('/bem/liputanEm/delete/{liputanEmID}/{emID}', [App\Http\Controllers\Bem\LiputanEmController::class, 'destroy'])->name('bem-liputanEm:destroy'); //ToDo
        //negara
        Route::get( '/bem/negara', [App\Http\Controllers\Bem\NegaraController::class, 'index'])->name('bem-negara:index');
        Route::get('/bem/negara/create', [App\Http\Controllers\Bem\NegaraController::class, 'create'])->name('bem-negara:create');
        Route::post('/bem/negara/create', [App\Http\Controllers\Bem\NegaraController::class, 'store'])->name('bem-negara:store');
        Route::get('/bem/negara/{negara}', [App\Http\Controllers\Bem\NegaraController::class, 'show'])->name('bem-negara:show');
        Route::get('/bem/negara/edit/{negara}', [App\Http\Controllers\Bem\NegaraController::class, 'edit'])->name('bem-negara:edit');
        Route::post('/bem/negara/edit/{negara}', [App\Http\Controllers\Bem\NegaraController::class, 'update'])->name('bem-negara:update');
        Route::get('/bem/negara/delete/{negara}', [App\Http\Controllers\Bem\NegaraController::class, 'destroy'])->name('bem-negara:destroy');
        Route::get('bem/negaraList', [App\Http\Controllers\Bem\NegaraController::class, 'getNegara'])->name('bem-negara:list'); //DATATABLE YAJRA
        //states
        Route::get( '/bem/states', [App\Http\Controllers\Bem\StatesController::class, 'index'])->name('bem-states:index');
        Route::get('/bem/states/create', [App\Http\Controllers\Bem\StatesController::class, 'create'])->name('bem-states:create');
        Route::post('/bem/states/create', [App\Http\Controllers\Bem\StatesController::class, 'store'])->name('bem-states:store');
        Route::get('/bem/states/{states}', [App\Http\Controllers\Bem\StatesController::class, 'show'])->name('bem-states:show');
        Route::get('/bem/states/edit/{states}', [App\Http\Controllers\Bem\StatesController::class, 'edit'])->name('bem-states:edit');
        Route::post('/bem/states/edit/{states}', [App\Http\Controllers\Bem\StatesController::class, 'update'])->name('bem-states:update');
        Route::get('/bem/states/delete/{states}', [App\Http\Controllers\Bem\StatesController::class, 'destroy'])->name('bem-states:destroy');
        //negeri
        Route::get( '/bem/negeri', [App\Http\Controllers\Bem\NegeriController::class, 'index'])->name('bem-negeri:index');
        Route::get('/bem/negeri/create', [App\Http\Controllers\Bem\NegeriController::class, 'create'])->name('bem-negeri:create');
        Route::post('/bem/negeri/create', [App\Http\Controllers\Bem\NegeriController::class, 'store'])->name('bem-negeri:store');
        Route::get('/bem/negeri/{negeri}', [App\Http\Controllers\Bem\NegeriController::class, 'show'])->name('bem-negeri:show');
        Route::get('/bem/negeri/edit/{negeri}', [App\Http\Controllers\Bem\NegeriController::class, 'edit'])->name('bem-negeri:edit');
        Route::post('/bem/negeri/edit/{negeri}', [App\Http\Controllers\Bem\NegeriController::class, 'update'])->name('bem-negeri:update');
        Route::get('/bem/negeri/delete/{negeri}', [App\Http\Controllers\Bem\NegeriController::class, 'destroy'])->name('bem-negeri:destroy');
        //hubungan
        Route::get( '/bem/hubungan', [App\Http\Controllers\Bem\HubunganController::class, 'index'])->name('bem-hubungan:index');
        Route::get('/bem/hubungan/create', [App\Http\Controllers\Bem\HubunganController::class, 'create'])->name('bem-hubungan:create');
        Route::post('/bem/hubungan/create', [App\Http\Controllers\Bem\HubunganController::class, 'store'])->name('bem-hubungan:store');
        Route::get('/bem/hubungan/{hubungan}', [App\Http\Controllers\Bem\HubunganController::class, 'show'])->name('bem-hubungan:show');
        Route::get('/bem/hubungan/edit/{hubungan}', [App\Http\Controllers\Bem\HubunganController::class, 'edit'])->name('bem-hubungan:edit');
        Route::post('/bem/hubungan/edit/{hubungan}', [App\Http\Controllers\Bem\HubunganController::class, 'update'])->name('bem-hubungan:update');//
        Route::get('/bem/hubungan/delete/{hubungan}', [App\Http\Controllers\Bem\HubunganController::class, 'destroy'])->name('bem-hubungan:destroy');
        //agama
        Route::get( '/bem/agama', [App\Http\Controllers\Bem\AgamaController::class, 'index'])->name('bem-agama:index');
        Route::get('/bem/agama/create', [App\Http\Controllers\Bem\AgamaController::class, 'create'])->name('bem-agama:create');
        Route::post('/bem/agama/create', [App\Http\Controllers\Bem\AgamaController::class, 'store'])->name('bem-agama:store');
        Route::get('/bem/agama/{agama}', [App\Http\Controllers\Bem\AgamaController::class, 'show'])->name('bem-agama:show');
        Route::get('/bem/agama/edit/{agama}', [App\Http\Controllers\Bem\AgamaController::class, 'edit'])->name('bem-agama:edit');
        Route::post('/bem/agama/edit/{agama}', [App\Http\Controllers\Bem\AgamaController::class, 'update'])->name('bem-agama:update');
        Route::get('/bem/agama/delete/{agama}', [App\Http\Controllers\Bem\AgamaController::class, 'destroy'])->name('bem-agama:destroy');
        //bangsa
        Route::get( '/bem/bangsa', [App\Http\Controllers\Bem\BangsaController::class, 'index'])->name('bem-bangsa:index');
        Route::get('/bem/bangsa/create', [App\Http\Controllers\Bem\BangsaController::class, 'create'])->name('bem-bangsa:create');
        Route::post('/bem/bangsa/create', [App\Http\Controllers\Bem\BangsaController::class, 'store'])->name('bem-bangsa:store');
        Route::get('/bem/bangsa/{bangsa}', [App\Http\Controllers\Bem\BangsaController::class, 'show'])->name('bem-bangsa:show');
        Route::get('/bem/bangsa/edit/{bangsa}', [App\Http\Controllers\Bem\BangsaController::class, 'edit'])->name('bem-bangsa:edit');
        Route::post('/bem/bangsa/edit/{bangsa}', [App\Http\Controllers\Bem\BangsaController::class, 'update'])->name('bem-bangsa:update');
        Route::get('/bem/bangsa/delete/{bangsa}', [App\Http\Controllers\Bem\BangsaController::class, 'destroy'])->name('bem-bangsa:destroy');
        //PENGURUSAN KOD end
    });
//BEM end

//EM start
Route::middleware(['auth', 'em'])->group(function()
    {
        //dashboard
        Route::get('/em/dashboard', [App\Http\Controllers\Em\DashboardController::class, 'dashboard'])->name('em-dashboard:dashboard');

        //pengurusan profil
        Route::get('/em/my-profile', [App\Http\Controllers\Em\MyProfileController::class, 'myProfile'])->name('em-my-profile');
        Route::post('/em/my-profile', [App\Http\Controllers\Em\MyProfileController::class, 'updateProfile'])->name('em-update-profile');
        Route::get('/em/password', [App\Http\Controllers\Em\MyProfileController::class, 'myProfilePassword'])->name('em-my-profile-password');
        Route::post('/em/password', [App\Http\Controllers\Em\MyProfileController::class, 'updatePassword'])->name('em-update-password');

        //programpengajian
        Route::get( '/em/programpengajian', [App\Http\Controllers\Em\ProgramPengajianController::class, 'index'])->name('em-programpengajian:index');
        Route::get('/em/programpengajian/create', [App\Http\Controllers\Em\ProgramPengajianController::class, 'create'])->name('em-programpengajian:create');
        Route::post('/em/programpengajian/create', [App\Http\Controllers\Em\ProgramPengajianController::class, 'store'])->name('em-programpengajian:store');
        Route::get('/em/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'edit'])->name('em-programpengajian:edit');
        Route::post('/em/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'update'])->name('em-programpengajian:update');
        Route::get('/em/programpengajian/delete/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'destroy'])->name('em-programpengajian:destroy');
        
        //penajapengajian
        Route::get( '/em/penajapengajian', [App\Http\Controllers\Em\PenajaPengajianController::class, 'index'])->name('em-penajapengajian:index');
        // Route::get('/em/programpengajian/create', [App\Http\Controllers\Em\ProgramPengajianController::class, 'create'])->name('em-programpengajian:create');
        // Route::post('/em/programpengajian/create', [App\Http\Controllers\Em\ProgramPengajianController::class, 'store'])->name('em-programpengajian:store');
        // Route::get('/em/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'edit'])->name('em-programpengajian:edit');
        // Route::post('/em/programpengajian/edit/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'update'])->name('em-programpengajian:update');
        // Route::get('/em/programpengajian/delete/{programpengajian}', [App\Http\Controllers\Em\ProgramPengajianController::class, 'destroy'])->name('em-programpengajian:destroy');
        
        //pengurusanpelajar
        Route::get( '/em/pengurusanpelajar/kp', [App\Http\Controllers\Em\PengajianPelajarController::class, 'index'])->name('em-pengajianpelajar:index');
        Route::post( '/em/pengurusanpelajar/kp', [App\Http\Controllers\Em\PengajianPelajarController::class, 'show'])->name('em-pengajianpelajar:show');


        Route::get('/em/warisList/{pelajar}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'getWaris'])->name('em-pengurusanpelajar-noKP-waris:list'); //DATATABLE YAJRA WARIS PELAJAR
        Route::get('/em/pengajianPelajarList/{pelajar}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'getPengajianPelajar'])->name('em-carianPelajar-noKP-pengajianpelajar:list'); //DATATABLE YAJRA PENGAJIAN PELAJAR
        Route::get('/em/vaksinasiPelajarList/{pelajar}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'getVaksinasi'])->name('em-carianPelajar-noKP-vaksinasipelajar:list'); //DATATABLE YAJRA VAKSINASI PELAJAR

        // Route::get( '/em/pengajianpelajar/{negarapengajian}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'indexShow'])->name('em-pengajianpelajar:indexShow');
        Route::get('/em/pengajianpelajar/create', [App\Http\Controllers\Em\PengajianPelajarController::class, 'create'])->name('em-pengajianpelajar:create');
        Route::post('/em/pengajianpelajar/create', [App\Http\Controllers\Em\PengajianPelajarController::class, 'store'])->name('em-pengajianpelajar:store');
        // Route::get('/em/pengajianpelajar/{pengajian}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'show'])->name('em-pengajianpelajar:show');
        // Route::get('/em/pengajianpelajar/edit/{pengajianpelajar}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'edit'])->name('em-pengajianpelajar:edit');
        Route::get('/em/pengajianpelajar/edit/{pengajianpelajar}/{negarapengajian}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'edit'])->name('em-pengajianpelajar:edit');
        Route::post('/em/pengajianpelajar/edit/{pengajianpelajar}/{negarapengajian}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'update'])->name('em-pengajianpelajar:update');
        Route::get('/em/pengajianpelajar/delete/{pengajianpelajar}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'destroy'])->name('em-pengajianpelajar:destroy');
        
        // Route::get('/em/populateNegaraToPengajianPelajar', [App\Http\Controllers\Em\PengajianPelajarController::class, 'populateNegaraToPengajianPelajar'])->name('em-populateNegaraToPengajianPelajar'); //Retrieve
        Route::get('/em/populateNegaraToStates', [App\Http\Controllers\Em\PengajianPelajarController::class, 'populateNegaraToStates'])->name('em-populateNegaraToStates'); //Retrieve
        Route::get('/em/populateStatesToInstitusi', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateStatesToInstitusi'])->name('em-populateStatesToInstitusi'); //Retrieve
        Route::get('/em/populateBidangToProgram', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateBidangToProgram'])->name('em-populateBidangToProgram'); //Retrieve

        //negara
        Route::get( '/em/negara', [App\Http\Controllers\Em\NegaraController::class, 'index'])->name('em-negara:index');
        // Route::get('/em/negara/create', [App\Http\Controllers\Em\NegaraController::class, 'create'])->name('em-negara:create');
        // Route::post('/em/negara/create', [App\Http\Controllers\Em\NegaraController::class, 'store'])->name('em-negara:store');
        Route::get('/em/negara/{negara}', [App\Http\Controllers\Em\NegaraController::class, 'show'])->name('em-negara:show');
        // Route::get('/em/negara/edit/{negara}', [App\Http\Controllers\Em\NegaraController::class, 'edit'])->name('em-negara:edit');
        // Route::post('/em/negara/edit/{negara}', [App\Http\Controllers\Em\NegaraController::class, 'update'])->name('em-negara:update');
        // Route::get('/em/negara/delete/{negara}', [App\Http\Controllers\Em\NegaraController::class, 'destroy'])->name('em-negara:destroy');
        Route::get('em/negaraList', [App\Http\Controllers\Em\NegaraController::class, 'getNegara'])->name('em-negara:list'); //DATATABLE YAJRA

        //states
        Route::get( '/em/states', [App\Http\Controllers\Em\StatesController::class, 'index'])->name('em-states:index');
        Route::get('/em/states/create', [App\Http\Controllers\Em\StatesController::class, 'create'])->name('em-states:create');
        Route::post('/em/states/create', [App\Http\Controllers\Em\StatesController::class, 'store'])->name('em-states:store');
        Route::get('/em/states/{negara}', [App\Http\Controllers\Em\StatesController::class, 'show'])->name('em-states:show');
        // Route::get('/em/states/edit/{negara}', [App\Http\Controllers\Em\StatesController::class, 'edit'])->name('em-states:edit');
        // Route::post('/em/states/edit/{negara}', [App\Http\Controllers\Em\StatesController::class, 'update'])->name('em-states:update');
        // Route::get('/em/states/delete/{negara}', [App\Http\Controllers\Em\StatesController::class, 'destroy'])->name('em-states:destroy');
        Route::get('em/statesList', [App\Http\Controllers\Em\StatesController::class, 'getStates'])->name('em-states:list'); //DATATABLE YAJRA
    });
//EM end

//KEDUTAAN start
Route::middleware(['auth', 'kedutaan'])->group(function()
    {
        //dashboard
        Route::get('/kedutaan/dashboard', [App\Http\Controllers\Kedutaan\DashboardController::class, 'dashboard'])->name('kedutaan-dashboard:dashboard');

        //pengurusan profil
        Route::get('/kedutaan/my-profile', [App\Http\Controllers\Kedutaan\MyProfileController::class, 'myProfile'])->name('kedutaan-my-profile');
        Route::post('/kedutaan/my-profile', [App\Http\Controllers\Kedutaan\MyProfileController::class, 'updateProfile'])->name('kedutaan-update-profile');
        Route::get('/kedutaan/password', [App\Http\Controllers\Kedutaan\MyProfileController::class, 'myProfilePassword'])->name('kedutaan-my-profile-password');
        Route::post('/kedutaan/password', [App\Http\Controllers\Kedutaan\MyProfileController::class, 'updatePassword'])->name('kedutaan-update-password');

        //pengurusan pelajar
        // pengurusan pelajar-pengurusanpelajar-nokp
        Route::get( '/kedutaan/pengurusanpelajar/kp', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'index'])->name('kedutaan-pengurusanpelajar:index');
        Route::post('/kedutaan/pengurusanpelajar/kp', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'show'])->name('kedutaan-pengurusanpelajar:show');
        Route::get('/kedutaan/pengurusanpelajar/kp/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'showGet'])->name('kedutaan-carianPelajar-noKP:showGet');
        
        Route::get( '/kedutaan/pengurusanpelajar/waris/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'warisPelajarCreate'])->name('kedutaan-pengurusanpelajar-waris:create');
        Route::post('/kedutaan/pengurusanpelajar/waris/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'warisPelajarStore'])->name('kedutaan-pengurusanpelajar-waris:store');
        Route::get('/kedutaan/pengurusanpelajar/delete/{waris}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'warisPelajarDestroy'])->name('kedutaan-carianPelajar-noKP-waris:destroy');

        Route::get( '/kedutaan/pengurusanpelajar/pengajianPelajar/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'pengajianPelajarCreate'])->name('kedutaan-carianPelajar-noKP-pengajianPelajar:create');
        Route::post('/kedutaan/pengurusanpelajar/pengajianPelajar/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'pengajianPelajarStore'])->name('kedutaan-carianPelajar-noKP-pengajianPelajar:store');
        Route::get('/kedutaan/pengurusanpelajar/pengajianPelajar/delete/{pengajian}/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'pengajianPelajarDestroy'])->name('kedutaan-carianPelajar-noKP-pengajianPelajar:destroy');

        Route::get( '/kedutaan/pengurusanpelajar/vaksinasiPelajar/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'vaksinasiPelajarCreate'])->name('kedutaan-carianPelajar-noKP-vaksinasiPelajar:create');
        Route::post( '/kedutaan/pengurusanpelajar/vaksinasiPelajar/create/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'vaksinasiPelajarStore'])->name('kedutaan-carianPelajar-noKP-vaksinasiPelajar:store');
        Route::get('/kedutaan/pengurusanpelajar/vaksinasiPelajar/delete/{vaksinasi}/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'vaksinasiPelajarDestroy'])->name('kedutaan-carianPelajar-noKP-vaksinasiPelajar:destroy');

        Route::get('/kedutaan/warisList/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'getWaris'])->name('kedutaan-pengurusanpelajar-noKP-waris:list'); //DATATABLE YAJRA WARIS PELAJAR
        Route::get('/kedutaan/pengajianPelajarList/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'getPengajianPelajar'])->name('kedutaan-carianPelajar-noKP-pengajianpelajar:list'); //DATATABLE YAJRA PENGAJIAN PELAJAR
        Route::get('/kedutaan/vaksinasiPelajarList/{pelajar}', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'getVaksinasi'])->name('kedutaan-carianPelajar-noKP-vaksinasipelajar:list'); //DATATABLE YAJRA VAKSINASI PELAJAR

        Route::get('/kedutaan/populateNegaraToStates', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'populateNegaraToStates'])->name('kedutaan-populateNegaraToStates'); //populate
        Route::get('/kedutaan/populateStatesToInstitusi', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'populateStatesToInstitusi'])->name('kedutaan-populateStatesToInstitusi'); //populate
        Route::get('/kedutaan/populateBidangToProgram', [App\Http\Controllers\Kedutaan\PengurusanPelajarController::class, 'populateBidangToProgram'])->name('kedutaan-populateBidangToProgram'); //populate

        //pengurusan pelajar-peribadi
        Route::get( '/kedutaan/peribadipelajar', [App\Http\Controllers\Kedutaan\PeribadiPelajarController::class, 'index'])->name('kedutaan-peribadipelajar:index');
        //pengurusan pelajar-pengajianpelajar
        Route::get( '/kedutaan/pengajianpelajar', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'index'])->name('kedutaan-pengajianpelajar:index'); //sepatutnya search by ic kt sini
        Route::get( '/kedutaan/pengajianpelajar/{negarapengajian}', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'indexShow'])->name('kedutaan-pengajianpelajar:indexShow');
        Route::get('/kedutaan/pengajianpelajar/edit/{pengajianpelajar}/{negarapengajian}', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'edit'])->name('kedutaan-pengajianpelajar:edit');
        Route::post('/kedutaan/pengajianpelajar/edit/{pengajianpelajar}/{negarapengajian}', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'update'])->name('kedutaan-pengajianpelajar:update');
        // Route::post('/em/pengajianpelajar/edit/{pengajianpelajar}/{negarapengajian}', [App\Http\Controllers\Em\PengajianPelajarController::class, 'update'])->name('em-pengajianpelajar:update');
        Route::get('/kedutaan/populateStatesToInstitusi', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'populateStatesToInstitusi'])->name('kedutaan-populateStatesToInstitusi'); //Retrieve
        Route::get('/kedutaan/populateBidangToProgram', [App\Http\Controllers\Kedutaan\PengajianPelajarController::class, 'populateBidangToProgram'])->name('kedutaan-populateBidangToProgram'); //Retrieve

        //negara
        Route::get( '/kedutaan/negara', [App\Http\Controllers\Kedutaan\NegaraController::class, 'index'])->name('kedutaan-negara:index');
        Route::get('/kedutaan/negara/{negara}', [App\Http\Controllers\Kedutaan\NegaraController::class, 'show'])->name('kedutaan-negara:show');
        Route::get('kedutaan/negaraList', [App\Http\Controllers\Kedutaan\NegaraController::class, 'getNegara'])->name('kedutaan-negara:list'); //DATATABLE YAJRA
    });
//KEDUTAAN end

//PELAJAR start
Route::middleware(['auth', 'pelajar'])->group(function()
    {
        //dashboard
        Route::get('/pelajar/dashboard', [App\Http\Controllers\Pelajar\DashboardController::class, 'dashboard'])->name('pelajar-dashboard:dashboard');

        //peribadi pelajar
        Route::get('/pelajar/peribadi', [App\Http\Controllers\Pelajar\PeribadiController::class, 'index'])->name('pelajar-peribadi:index');
        // Route::get('/admin/users/edit/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('pelajar-peribadi:edit');
        Route::get('/pelajar/peribadi/edit/{userID}', [App\Http\Controllers\Pelajar\PeribadiController::class, 'edit'])->name('pelajar-peribadi:edit');
        Route::post('/pelajar/peribadi/{userID}', [App\Http\Controllers\Pelajar\PeribadiController::class, 'update'])->name('pelajar-peribadi:update');

        //vaksinasi pelajar
        Route::get('/pelajar/vaksinasi', [App\Http\Controllers\Pelajar\VaksinasiPelajarController::class, 'index'])->name('pelajar-vaksinasi:index');
        Route::get('/pelajar/vaksinasi/create', [App\Http\Controllers\Pelajar\VaksinasiPelajarController::class, 'create'])->name('pelajar-vaksinasi:create');
        Route::post('/pelajar/vaksinasi/create', [App\Http\Controllers\Pelajar\VaksinasiPelajarController::class, 'store'])->name('pelajar-vaksinasi:store');
        Route::get('/pelajar/vaksinasi/delete/{vaksinasi}', [App\Http\Controllers\Pelajar\VaksinasiPelajarController::class, 'destroy'])->name('pelajar-vaksinasi:destroy');
        Route::get('pelajar/vaksinasiList', [App\Http\Controllers\Pelajar\VaksinasiPelajarController::class, 'getVaksinasi'])->name('pelajar-vaksinasi:list'); //DATATABLE YAJRA

        //waris pelajar
        Route::get('/pelajar/waris', [App\Http\Controllers\Pelajar\WarisController::class, 'index'])->name('pelajar-waris:index');
        Route::get('/pelajar/waris/create', [App\Http\Controllers\Pelajar\WarisController::class, 'create'])->name('pelajar-waris:create');
        Route::post('/pelajar/waris/create', [App\Http\Controllers\Pelajar\WarisController::class, 'store'])->name('pelajar-waris:store');
        Route::get('/pelajar/waris/{waris}', [App\Http\Controllers\Pelajar\WarisController::class, 'show'])->name('pelajar-waris:show');
        Route::get('/pelajar/waris/edit/{waris}', [App\Http\Controllers\Pelajar\WarisController::class, 'edit'])->name('pelajar-waris:edit');
        Route::post('/pelajar/waris/edit/{waris}', [App\Http\Controllers\Pelajar\WarisController::class, 'update'])->name('pelajar-waris:update');
        Route::get('/pelajar/waris/delete/{waris}', [App\Http\Controllers\Pelajar\WarisController::class, 'destroy'])->name('pelajar-waris:destroy');
        Route::get('pelajar/warisList', [App\Http\Controllers\Pelajar\WarisController::class, 'getWaris'])->name('pelajar-waris:list'); //DATATABLE YAJRA

        //pengajian pelajar
        Route::get('/pelajar/pengajianpelajar', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'index'])->name('pelajar-pengajianpelajar:index');
        Route::get('/pelajar/pengajianpelajar/create', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'create'])->name('pelajar-pengajianpelajar:create');
        Route::post('/pelajar/pengajianpelajar/create', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'store'])->name('pelajar-pengajianpelajar:store');
        Route::get('/pelajar/pengajianpelajar/{pengajian}', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'show'])->name('pelajar-pengajianpelajar:show');
        Route::get('/pelajar/pengajianpelajar/edit/{pengajian}', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'edit'])->name('pelajar-pengajianpelajar:edit');
        Route::post('/pelajar/pengajianpelajar/edit/{pengajian}', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'update'])->name('pelajar-pengajianpelajar:update');
        Route::get('/pelajar/pengajianpelajar/delete/{pengajian}', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'destroy'])->name('pelajar-pengajianpelajar:destroy');

        Route::get('/pelajar/populateNegaraToStates', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateNegaraToStates'])->name('pelajar-populateNegaraToStates'); //Retrieve
        Route::get('/pelajar/populateStatesToInstitusi', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateStatesToInstitusi'])->name('pelajar-populateStatesToInstitusi'); //Retrieve
        Route::get('/pelajar/populateBidangToProgram', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'populateBidangToProgram'])->name('pelajar-populateBidangToProgram'); //Retrieve

        Route::get('pelajar/pengajianPelajarList', [App\Http\Controllers\Pelajar\PengajianPelajarController::class, 'getPengajianPelajar'])->name('pelajar-pengajianpelajar:list'); //DATATABLE YAJRA
        //alamat penginapan pengajian
        Route::get('/pelajar/pengajianpelajar/alamatpenginapanpengajian/create/{pengajian}', [App\Http\Controllers\Pelajar\AlamatPenginapanPengajianController::class, 'create'])->name('pelajar-alamatPenginapanPengajianPelajar:create');
        Route::post('/pelajar/pengajianpelajar/alamatpenginapanpengajian/create/{pengajian}', [App\Http\Controllers\Pelajar\AlamatPenginapanPengajianController::class, 'store'])->name('pelajar-alamatPenginapanPengajianPelajar:store');
        Route::get('/pelajar/pengajianpelajar/alamatpenginapanpengajian/edit/{alamat}', [App\Http\Controllers\Pelajar\AlamatPenginapanPengajianController::class, 'edit'])->name('pelajar-alamatPenginapanPengajianPelajar:edit');
        Route::post('/pelajar/pengajianpelajar/alamatpenginapanpengajian/edit/{alamat}', [App\Http\Controllers\Pelajar\AlamatPenginapanPengajianController::class, 'update'])->name('pelajar-alamatPenginapanPengajianPelajar:update');
        Route::get('/pelajar/pengajianpelajar/alamatpenginapanpengajian/delete/{alamat}', [App\Http\Controllers\Pelajar\AlamatPenginapanPengajianController::class, 'destroy'])->name('pelajar-alamatPenginapanPengajianPelajar:destroy');
        //penaja pengajian
        Route::get('/pelajar/pengajianpelajar/penajapengajian/create/{pengajian}', [App\Http\Controllers\Pelajar\PenajaPengajianController::class, 'create'])->name('pelajar-penajaPengajianPelajar:create');
        Route::post('/pelajar/pengajianpelajar/penajapengajian/create/{pengajian}', [App\Http\Controllers\Pelajar\PenajaPengajianController::class, 'store'])->name('pelajar-penajaPengajianPelajar:store');
        Route::get('/pelajar/pengajianpelajar/penajapengajian/delete/{penajaPengajian}', [App\Http\Controllers\Pelajar\PenajaPengajianController::class, 'destroy'])->name('pelajar-penajaPengajianPelajar:destroy');
        
        //profil pelajar
        Route::get('/pelajar/profilpelajar', [App\Http\Controllers\Pelajar\ProfilPelajarController::class, 'index'])->name('pelajar-profil:index');
        Route::post('/pelajar/profilpelajar', [App\Http\Controllers\Pelajar\ProfilPelajarController::class, 'updateProfile'])->name('pelajar-profil:update');
        Route::get('/pelajar/password', [App\Http\Controllers\Pelajar\ProfilPelajarController::class, 'myProfilePassword'])->name('pelajar-password:index');
        Route::post('/pelajar/password', [App\Http\Controllers\Pelajar\ProfilPelajarController::class, 'updatePassword'])->name('pelajar-password:update');
    });
//PELAJAR end
//----------------------------------------------------------CODING BARU end----------------------------------//