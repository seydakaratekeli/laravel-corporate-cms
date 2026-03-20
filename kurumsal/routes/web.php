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
use App\Http\Controllers\Home\HakkimizdaController;
use App\Http\Controllers\Admin\MesajController;
use App\Http\Controllers\Admin\SurecController;
use App\Http\Controllers\Home\YorumController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\SeoController;
use App\Http\Controllers\Admin\RolController;



Route::get('/', function () {
    return view('frontend.index');
});

//seo route
Route::controller(SeoController::class)->group(function () {
    Route::get('/seo/duzenle', 'SeoDuzenle')->name('seo.duzenle');
    Route::post('/seo/guncelle', 'SeoGuncelle')->name('seo.guncelle');
});

//banner route
Route::controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle');

});    

//footer route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/duzenle', 'FooterDuzenle')->name('footer.duzenle');
    Route::post('/footer/guncelle', 'FooterGuncelle')->name('footer.guncelle');
});

//hakkimizda route
Route::controller(HakkimizdaController::class)->group(function () {
    Route::get('/hakkimizda/duzenle', 'Hakkimizda')->name('admin.hakkimizda');
    Route::post('/hakkimizda/guncelle', 'HakkimizdaGuncelle')->name('admin.hakkimizda.guncelle');
    Route::get('/hakkimizda', 'HakkimizdaFront')->name('anasayfa_hak');
    Route::get('/coklu/resim', 'Cokluresim')->name('coklu.resim');
    Route::post('/coklu/form', 'CokluForm')->name('coklu.resim.form');
    Route::get('/coklu/liste', 'CokluListe')->name('coklu.liste');
    Route::get('/coklu/duzenle/{id}', 'CokluDuzenle')->name('coklu.duzenle');
    Route::post('/coklu/guncelle', 'CokluGuncelle')->name('coklu.guncelle');
    Route::get('/coklu/sil/{id}', 'CokluSil')->name('coklu.sil');

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

//Süreç route
Route::controller(SurecController::class)->group(function () {
    Route::get('/surec/liste', 'SurecListe')->name('surec.liste');
    Route::get('/surec/ekle', 'SurecEkle')->name('surec.ekle');
    Route::post('/surec/form', 'SurecForm')->name('surec.form');
    Route::get('/surec/durum', 'SurecDurum');
    Route::get('/surec/duzenle/{id}', 'SurecDuzenle')->name('surec.duzenle');
    Route::post('/surec/guncelle', 'SurecGuncelle')->name('surec.guncelle');
    Route::get('/surec/sil/{id}', 'SurecSil')->name('surec.sil');
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
    Route::get('/blog', [FrontController::class, 'BlogHepsi']);

    // teklif formu route
Route::controller(MesajController::class)->group(function () {
    Route::get('/iletisim', 'Iletisim')->name('iletisim');
   
    Route::post('/teklif/form', 'TeklifFormu')->name('teklif.form');
  
});
//yorumlar route
Route::controller(YorumController::class)->group(function () {
    Route::post('/yorum/form', 'YorumForm')->name('yorum.form');
    Route::get('/yorumlar', 'Yorumlar')->name('yorum.liste');
    Route::get('/yorum/ekle', 'YorumEkle')->name('yorum.ekle');

    Route::get('/yorum/durum', 'YorumDurum');
    Route::get('/yorum/duzenle/{id}', 'YorumDuzenle')->name('yorum.duzenle');
     Route::post('/yorum/guncelle', 'YorumGuncelle')->name('yorum.guncelle');
     Route::get('/yorum/sil/{id}', 'YorumSil')->name('yorum.sil');
});

//izinler route
Route::controller(RolController::class)->group(function () {
    Route::get('/izin/liste', 'IzinListe')->name('izin.liste');
    Route::get('/izin/ekle', 'IzinEkle')->name('izin.ekle');
    Route::post('/izin/form', 'IzinForm')->name('izin.ekle.form');
    Route::get('/izin/duzenle/{id}', 'IzinDuzenle')->name('izin.duzenle');
    Route::post('/izin/guncelle/form', 'IzinGuncelle')->name('izin.guncelle.form');
    Route::get('/izin/sil/{id}', 'IzinSil')->name('izin.sil');
});

    //rol route
    Route::controller(RolController::class)->group(function () {

    Route::get('/rol/liste', 'RolListe')->name('rol.liste');
    Route::get('/rol/ekle', 'RolEkle')->name('rol.ekle');
    Route::post('/rol/form', 'RolForm')->name('rol.ekle.form');
    Route::get('/rol/duzenle/{id}', 'RolDuzenle')->name('rol.duzenle');
    Route::post('/rol/guncelle/form', 'RolGuncelle')->name('rol.guncelle');
    Route::get('/rol/sil/{id}', 'RolSil')->name('rol.sil');

    //rol izin verme route
    Route::get('/rol/izin/verme', 'RolIzinVerme')->name('rol.izin.verme');
    Route::post('/rol/yetki/ver', 'RolYetkiVer')->name('yetki.ver.form');
    Route::get('/rol/yetki/liste', 'RolYetkiListe')->name('rol.yetki.liste');
    Route::get('/rol/yetki/duzenle/{id}', 'RolYetkiDuzenle')->name('rol.yetki.duzenle');
    Route::get('/rol/yetki/sil/{id}', 'RolYetkiSil')->name('rol.yetki.sil');


});
   












 


