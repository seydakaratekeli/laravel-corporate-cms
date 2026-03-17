<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Home\BannerController;
use Intervention\Image\Laravel\Facades\Image;
use  App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AltkategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\Admin\BlogkategoriController;
use App\Http\Controllers\Admin\BlogicerikController;



Route::get('/', function () {
    return view('frontend.index');
});

//banner route
Route::controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');

});    

//kategori route
Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi');
    Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle');
    Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form');
    Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle');
    Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form');
    Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil');
});  

//Alt kategori route
Route::controller(AltkategoriController::class)->group(function () {
    Route::get('/altkategori/liste', 'AltkategoriListe')->name('altkategori.liste');
    Route::get('/altkategori/ekle', 'AltkategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form', 'AltkategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}', 'AltkategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/altkategori/guncelle/form', 'AltkategoriGuncelle')->name('altkategori.guncelle');
    Route::get('/altkategori/sil/{id}', 'AltkategoriSil')->name('altkategori.sil');
    Route::get('/altkategoriler/ajax/{kategori_id}', 'AltkategoriAjax');

});  
//Ürün route
Route::controller(UrunController::class)->group(function () {
    Route::get('/urun/liste', 'UrunListe')->name('urun.liste');
    Route::get('/urun/durum', 'UrunDurum');
    Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle');
    Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form');
    Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle');
    Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form');
    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
});

//Blog kategori route
Route::controller(BlogkategoriController::class)->group(function () {
    Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste');
    Route::get('/blog/kategori/ekle', 'BlogKategoriEkle')->name('blog.kategori.ekle');
    Route::post('/blog/kategori/form', 'BlogKategoriForm')->name('blog.kategori.form');
    Route::get('/blog/kategori/durum', 'BlogKategoriDurum');
    Route::get('/blog/kategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle');
    Route::post('/blog/kategori/guncelle', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle');

     Route::get('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil');

}); 


//Blog içerik route
Route::controller(BlogicerikController::class)->group(function () {
    Route::get('/icerik/liste', 'IcerikListe')->name('icerik.liste');
    Route::get('/blog/icerik/ekle', 'BlogicerikEkle')->name('blog.icerik.ekle');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum');
    Route::post('/blog/icerik/ekle/form', 'BlogicerikEkleForm')->name('blog.icerik.ekle.form');    
    Route::get('/blog/icerik/duzenle/{id}', 'BlogicerikDuzenle')->name('blog.icerik.duzenle');
    Route::post('/blog/icerik/guncelle/form', 'BlogicerikGuncelleForm')->name('blog.icerik.guncelle.form');
    Route::get('/blog/icerik/sil/{id}', 'BlogicerikSil')->name('blog.icerik.sil');
});



Route::middleware('auth')->controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');
    Route::post('/banners', 'store')->name('banners.store');
    Route::get('/banners/{banner}', 'show')->name('banners.show');
    Route::get('/banners/{banner}/edit', 'edit')->name('banners.edit');
    Route::put('/banners/{banner}', 'update')->name('banners.update');
    Route::delete('/banners/{banner}', 'destroy')->name('banners.destroy');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//frontend route
    Route::get('/urun/{id}/{url}', [FrontController::class, 'urunDetay']);
    Route::get('/kategori/{id}/{url}', [FrontController::class, 'kategoriDetay']);
    Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay']);
    Route::get('/post/{id}/{url}', [FrontController::class, 'IcerikDetay']);
    Route::get('/blog/{id}/{url}', [FrontController::class, 'BlogKategoriDetay']); 













    Route::get('/iletisim', [FrontController::class, 'iletisim'])->name('iletisim');
    Route::post('/iletisim/form', [FrontController::class, 'iletisimForm'])->name('iletisim.form');
    Route::get('/hakkimizda', [FrontController::class, 'hakkimizda'])->name('hakkimizda');
    Route::get('/referanslar', [FrontController::class, 'referanslar'])->name('referanslar');
    Route::get('/kategoriler', [FrontController::class, 'kategoriler'])->name('kategoriler');
    Route::get('/altkategoriler', [FrontController::class, 'altkategoriler'])->name('altkategoriler');
    Route::get('/urunler', [FrontController::class, 'urunler'])->name('urunler');
   


