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
Route::middleware('auth')->group(function () {

//seo route
Route::controller(SeoController::class)->group(function () {
    Route::get('/seo/duzenle', 'SeoDuzenle')->name('seo.duzenle')->middleware('permission:seo.duzenle');
    Route::post('/seo/guncelle', 'SeoGuncelle')->name('seo.guncelle')->middleware('permission:seo.guncelle');
});

//banner route
Route::controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle')->middleware('permission:banner.guncelle');

});    

//footer route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/duzenle', 'FooterDuzenle')->name('footer.duzenle')->middleware('permission:footer.duzenle');
    Route::post('/footer/guncelle', 'FooterGuncelle')->name('footer.guncelle')->middleware('permission:footer.guncelle');
});

//hakkimizda route
Route::controller(HakkimizdaController::class)->group(function () {
    Route::get('/hakkimizda/duzenle', 'Hakkimizda')->name('admin.hakkimizda');
    Route::post('/hakkimizda/guncelle', 'HakkimizdaGuncelle')->name('admin.hakkimizda.guncelle')->middleware('permission:hakkimizda.guncelle');
    Route::get('/hakkimizda', 'HakkimizdaFront')->name('anasayfa_hak')->middleware('permission:anasayfa_hak');
    Route::get('/coklu/resim', 'Cokluresim')->name('coklu.resim')->middleware('permission:coklu.ekle');
    Route::post('/coklu/form', 'CokluForm')->name('coklu.resim.form')->middleware('permission:coklu.resim.form');
    Route::get('/coklu/liste', 'CokluListe')->name('coklu.liste')->middleware('permission:coklu.liste');
    Route::get('/coklu/durum', 'CokluDurum');
    Route::get('/coklu/duzenle/{id}', 'CokluDuzenle')->name('coklu.duzenle')->middleware('permission:coklu.duzenle');
    Route::post('/coklu/guncelle', 'CokluGuncelle')->name('coklu.guncelle')->middleware('permission:coklu.guncelle');
    Route::get('/coklu/sil/{id}', 'CokluSil')->name('coklu.sil')->middleware('permission:coklu.sil');

    });

    

//kategori route
Route::controller(KategoriController::class)->group(function () {
    Route::get('/kategori/hepsi', 'KategoriHepsi')->name('kategori.hepsi')->middleware('permission:kategori.hepsi');
    Route::get('/kategori/ekle', 'KategoriEkle')->name('kategori.ekle')->middleware('permission:kategori.ekle');
    Route::post('/kategori/ekle/form', 'KategoriEkleForm')->name('kategori.ekle.form')->middleware('permission:kategori.ekle.form');
    Route::get('/kategori/duzenle/{id}', 'KategoriDuzenle')->name('kategori.duzenle')->middleware('permission:kategori.duzenle');
    Route::post('/kategori/guncelle/form', 'KategoriGuncelleForm')->name('kategori.guncelle.form')->middleware('permission:kategori.guncelle.form');
    Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil')->middleware('permission:kategori.sil');
    Route::get('/kategori/durum', 'KategoriDurum');
    Route::get('/altkategori/durum', 'AltkategoriDurum');
});  

//Alt kategori route
Route::controller(AltkategoriController::class)->group(function () {
    Route::get('/altkategori/liste', 'AltkategoriListe')->name('altkategori.liste')->middleware('permission:altkategori.liste');
    Route::get('/altkategori/ekle', 'AltkategoriEkle')->name('altkategori.ekle')->middleware('permission:altkategori.ekle');
    Route::post('/altkategori/ekle/form', 'AltkategoriEkleForm')->name('altkategori.ekle.form')->middleware('permission:altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}', 'AltkategoriDuzenle')->name('altkategori.duzenle')->middleware('permission:altkategori.duzenle');
    Route::post('/altkategori/guncelle/form', 'AltkategoriGuncelle')->name('altkategori.guncelle')->middleware('permission:altkategori.guncelle');
    Route::get('/altkategori/sil/{id}', 'AltkategoriSil')->name('altkategori.sil')->middleware('permission:altkategori.sil');
    Route::get('/altkategoriler/ajax/{kategori_id}', 'AltkategoriAjax');

});  
//Ürün route
Route::controller(UrunController::class)->group(function () {
    Route::get('/urun/liste', 'UrunListe')->name('urun.liste')->middleware('permission:urun.liste');
    Route::get('/urun/durum', 'UrunDurum')->middleware('permission:urun.durum');
    Route::get('/urun/ekle', 'UrunEkle')->name('urun.ekle')->middleware('permission:urun.ekle');
    Route::post('/urun/ekle/form', 'UrunEkleForm')->name('urun.ekle.form')->middleware('permission:urun.ekle.form');
    Route::get('/urun/duzenle/{id}', 'UrunDuzenle')->name('urun.duzenle')->middleware('permission:urun.duzenle');
    Route::post('/urun/guncelle/form', 'UrunGuncelle')->name('urun.guncelle.form')->middleware('permission:urun.guncelle.form');
    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil')->middleware('permission:urun.sil');
});

//Blog kategori route
Route::controller(BlogkategoriController::class)->group(function () {
    Route::get('/blog/kategori/liste', 'BlogListe')->name('blog.liste')->middleware('permission:blog.liste');
    Route::get('/blog/kategori/ekle', 'BlogKategoriEkle')->name('blog.kategori.ekle')->middleware('permission:blog.kategori.ekle');
    Route::post('/blog/kategori/form', 'BlogKategoriForm')->name('blog.kategori.form')->middleware('permission:blog.kategori.form');
    Route::get('/blog/kategori/durum', 'BlogKategoriDurum')->middleware('permission:blog.kategori.durum');
    Route::get('/blog/kategori/duzenle/{id}', 'BlogKategoriDuzenle')->name('blog.kategori.duzenle')->middleware('permission:blog.kategori.duzenle');
    Route::post('/blog/kategori/guncelle', 'BlogKategoriGuncelle')->name('blog.kategori.guncelle')->middleware('permission:blog.kategori.guncelle');

     Route::get('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil')->middleware('permission:blog.kategori.sil');

}); 


//Blog içerik route
Route::controller(BlogicerikController::class)->group(function () {
    Route::get('/icerik/liste', 'IcerikListe')->name('icerik.liste')->middleware('permission:icerik.liste');
    Route::get('/blog/icerik/ekle', 'BlogicerikEkle')->name('blog.icerik.ekle')->middleware('permission:blog.icerik.ekle');
    Route::get('/blog/icerik/durum', 'BlogicerikDurum')->middleware('permission:blog.icerik.durum');
    Route::post('/blog/icerik/ekle/form', 'BlogicerikEkleForm')->name('blog.icerik.ekle.form')->middleware('permission:blog.icerik.ekle.form');    
    Route::get('/blog/icerik/duzenle/{id}', 'BlogicerikDuzenle')->name('blog.icerik.duzenle')->middleware('permission:blog.icerik.duzenle');
    Route::post('/blog/icerik/guncelle/form', 'BlogicerikGuncelleForm')->name('blog.icerik.guncelle.form')->middleware('permission:blog.icerik.guncelle.form');
    Route::get('/blog/icerik/sil/{id}', 'BlogicerikSil')->name('blog.icerik.sil')->middleware('permission:blog.icerik.sil');
});

//Süreç route
Route::controller(SurecController::class)->group(function () {
    Route::get('/surec/liste', 'SurecListe')->name('surec.liste')->middleware('permission:surec.liste');
    Route::get('/surec/ekle', 'SurecEkle')->name('surec.ekle')->middleware('permission:surec.ekle');
    Route::post('/surec/form', 'SurecForm')->name('surec.form')->middleware('permission:surec.form');
    Route::get('/surec/durum', 'SurecDurum')->middleware('permission:surec.durum');
    Route::get('/surec/duzenle/{id}', 'SurecDuzenle')->name('surec.duzenle')->middleware('permission:surec.duzenle');
    Route::post('/surec/guncelle', 'SurecGuncelle')->name('surec.guncelle')->middleware('permission:surec.guncelle');
    Route::get('/surec/sil/{id}', 'SurecSil')->name('surec.sil')->middleware('permission:surec.sil');
});

Route::middleware('auth')->controller(BannerController::class)->group(function () {
    Route::get('/banner/duzenle', 'HomeBanner')->name('banner');
    Route::post('/banner/guncelle', 'BannerGuncelle')->name('banner.guncelle')->middleware('permission:banner.guncelle');
    Route::post('/banners', 'store')->name('banners.store')->middleware('permission:banner.ekle');
    Route::get('/banners/{banner}', 'show')->name('banners.show')->middleware('permission:banner.liste');
    Route::get('/banners/{banner}/edit', 'edit')->name('banners.edit')->middleware('permission:banner.duzenle');
    Route::put('/banners/{banner}', 'update')->name('banners.update')->middleware('permission:banner.guncelle');
    Route::delete('/banners/{banner}', 'destroy')->name('banners.destroy')->middleware('permission:banner.sil');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('permission:profile.duzenle');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('permission:profile.guncelle');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('permission:profile.sil');
});

require __DIR__.'/auth.php';

//frontend route
    Route::get('/urun/{id}/{url}', [FrontController::class, 'urunDetay'])->middleware('permission:urun.detay');
    Route::get('/kategori/{id}/{url}', [FrontController::class, 'kategoriDetay'])->middleware('permission:kategori.detay');
    Route::get('/altkategori/{id}/{url}', [FrontController::class, 'AltDetay'])->middleware('permission:altkategori.detay');
    Route::get('/post/{id}/{url}', [FrontController::class, 'IcerikDetay'])->middleware('permission:icerik.detay');
    Route::get('/blog/{id}/{url}', [FrontController::class, 'BlogKategoriDetay'])->middleware('permission:blog.kategori.detay');
    Route::get('/blog', [FrontController::class, 'BlogHepsi'])->middleware('permission:blog.hepsi');

    // teklif formu route
Route::controller(MesajController::class)->group(function () {
    Route::get('/iletisim', 'Iletisim')->name('iletisim');
   
    Route::post('/teklif/form', 'TeklifFormu')->name('teklif.form')->middleware('permission:teklif.form');
   
});
//yorumlar route
Route::controller(YorumController::class)->group(function () {
    Route::post('/yorum/form', 'YorumForm')->name('yorum.form')->middleware('permission:yorum.form');
    Route::get('/yorumlar', 'Yorumlar')->name('yorum.liste')->middleware('permission:yorum.liste');
    Route::get('/yorum/ekle', 'YorumEkle')->name('yorum.ekle')->middleware('permission:yorum.ekle');

    Route::get('/yorum/durum', 'YorumDurum')->middleware('permission:yorum.durum');
    Route::get('/yorum/duzenle/{id}', 'YorumDuzenle')->name('yorum.duzenle')->middleware('permission:yorum.duzenle');
     Route::post('/yorum/guncelle', 'YorumGuncelle')->name('yorum.guncelle')->middleware('permission:yorum.guncelle');
     Route::get('/yorum/sil/{id}', 'YorumSil')->name('yorum.sil')->middleware('permission:yorum.sil');
});

//izinler route
Route::controller(RolController::class)->group(function () {
    Route::get('/izin/liste', 'IzinListe')->name('izin.liste')->middleware('permission:izinler.liste');
    Route::get('/izin/ekle', 'IzinEkle')->name('izin.ekle')->middleware('permission:izin.ekle');
    Route::post('/izin/form', 'IzinForm')->name('izin.ekle.form')->middleware('permission:izin.ekle.form');
    Route::get('/izin/duzenle/{id}', 'IzinDuzenle')->name('izin.duzenle')->middleware('permission:izin.duzenle');
    Route::post('/izin/guncelle/form', 'IzinGuncelle')->name('izin.guncelle.form')->middleware('permission:izin.guncelle.form');
    Route::get('/izin/sil/{id}', 'IzinSil')->name('izin.sil')->middleware('permission:izin.sil');
});

    //rol route
    Route::controller(RolController::class)->group(function () {

    Route::get('/rol/liste', 'RolListe')->name('rol.liste')->middleware('permission:rol.liste');
    Route::get('/rol/ekle', 'RolEkle')->name('rol.ekle')->middleware('permission:rol.ekle');
    Route::post('/rol/form', 'RolForm')->name('rol.ekle.form')->middleware('permission:rol.ekle.form');
    Route::get('/rol/duzenle/{id}', 'RolDuzenle')->name('rol.duzenle')->middleware('permission:rol.duzenle');
    Route::post('/rol/guncelle/form', 'RolGuncelle')->name('rol.guncelle.form')->middleware('permission:rol.guncelle.form');
    Route::get('/rol/sil/{id}', 'RolSil')->name('rol.sil')->middleware('permission:rol.sil');

    //rol izin verme route
    Route::get('/rol/izin/verme', 'RolIzinVerme')->name('rol.izin.verme')->middleware('permission:rol.izin.verme');
    Route::post('/rol/yetki/ver', 'RolYetkiVer')->name('yetki.ver.form')->middleware('permission:yetki.ver.form');
    Route::get('/rol/yetki/liste', 'RolYetkiListe')->name('rol.yetki.liste')->middleware('permission:rol.yetki.liste');
    Route::get('/rol/yetki/duzenle/{id}', 'RolYetkiDuzenle')->name('rol.yetki.duzenle')->middleware('permission:rol.yetki.duzenle');
    Route::post('/rol/yetki/guncelle/{id}', 'RolYetkiGuncelle')->name('rol.yetki.guncelle')->middleware('permission:rol.yetki.guncelle');
    Route::get('/admin/rol/sil/{id}', 'AdminRolSil')->name('admin.rol.sil')->middleware('permission:admin.rol.sil');

    //kullanıcı route
    Route::get('/kullanici/liste', 'KullaniciListe')->name('kullanici.liste')->middleware('permission:kullanici.liste');
    Route::get('/kullanici/durum', 'KullaniciDurum');
    Route::get('/kullanici/ekle', 'KullaniciEkle')->name('kullanici.ekle')->middleware('permission:kullanici.ekle');
    Route::post('/kullanici/ekle/form', 'KullaniciEkleForm')->name('kullanici.ekle.form')->middleware('permission:kullanici.ekle.form');
    Route::get('/kullanici/duzenle/{id}', 'KullaniciDuzenle')->name('kullanici.duzenle')->middleware('permission:kullanici.duzenle');
    Route::post('/kullanici/guncelle/{id}', 'KullaniciGuncelle')->name('kullanici.guncelle')->middleware('permission:kullanici.guncelle');
    Route::get('/kullanici/sil/{id}', 'KullaniciSil')->name('kullanici.sil')->middleware('permission:kullanici.sil');

});
   












 


