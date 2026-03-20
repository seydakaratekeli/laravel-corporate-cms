@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Footer Düzenle</h4>

                        <form method="post" action="{{ route('footer.guncelle') }}" enctype="multipart/form-data">
                            @csrf

                             <input type="hidden" name="id" value="{{ $footer->id }}">

<div class="row">

                            <div class="col-lg-4 mb-4"> <!-- sol kolon -->

                                <!-- Başlık 1 -->

                                <label for="footer_baslik" class="col-form-label">Footer Sol</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="baslikbir" type="text" placeholder="Başlık" id="example-text-input" value="{{ $footer->baslikbir }}">
                                </div>

                                
                                <label for="footer_baslik" class="col-form-label">Telefon</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="telefon" type="text" placeholder="Telefon" id="example-text-input" value="{{ $footer->telefon }}">
                                </div>

                                <label for="footer_baslik" class="col-form-label">Metin</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="metin" placeholder="Metin" id="example-text-input" rows="6">{{ $footer->metin }}</textarea>
                                </div>
                            


                            </div>  <!-- sol kolon bitti -->

    <div class="col-lg-4 mb-4"> <!-- orta kolon -->

                                <!-- Başlık 2 -->
                            <label for="footer_baslik" class="col-form-label">Footer Orta</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="baslikiki" type="text" placeholder="Başlık" id="example-text-input" value="{{ $footer->baslikiki }}">
                                </div>

                                 <label for="footer_baslik" class="col-form-label">Şehir</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="sehir" type="text" placeholder="Şehir" id="example-text-input" value="{{ $footer->sehir }}">
                                </div>

                                 <label for="footer_baslik" class="col-form-label">Adres</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="adres" type="text" placeholder="Adres" id="example-text-input" value="{{ $footer->adres }}">
                                </div>

                                <label for="footer_baslik" class="col-form-label">Mail</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="mail" type="text" placeholder="Mail" id="example-text-input" value="{{ $footer->mail }}">
                                </div>

                                    <label for="footer_baslik" class="col-form-label">Copyright</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="copyright" type="text" placeholder="Copyright" id="example-text-input" value="{{ $footer->copyright }}">
                                </div>



    </div> <!-- orta kolon bitti -->

   

     <div class="col-lg-4 mb-4"><!-- sağ kolon -->

                                <!-- Başlık 3 -->
                                 <label for="footer_baslik" class=" col-form-label">Footer Sağ</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="baslikuc" type="text" placeholder="Başlık" id="example-text-input" value="{{ $footer->baslikuc }}">
                                </div>

                                   <!-- sosyal_baslik -->
                                <label for="footer_baslik" class="col-form-label">Sosyal Başlık</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="sosyal_baslik" type="text" placeholder="Sosyal Başlık" id="example-text-input" value="{{ $footer->sosyal_baslik }}">
                                </div>
                            <!-- açıklama -->
                                <label for="footer_baslik" class="col-form-label">Açıklama</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Açıklama" id="example-text-input" value="{{ $footer->aciklama }}">
                                </div>

                                
                            <!-- facebook -->
                                <label for="footer_baslik" class="col-form-label">Facebook</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="facebook" type="text" placeholder="Facebook" id="example-text-input" value="{{ $footer->facebook }}">
                                </div>
                            <!-- twitter -->
                                <label for="footer_baslik" class="col-form-label">Twitter</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="twitter" type="text" placeholder="Twitter" id="example-text-input" value="{{ $footer->twitter }}">
                                </div>
                            <!-- linkedin -->
                                <label for="footer_baslik" class="col-form-label">Linkedin</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="linkedin" type="text" placeholder="Linkedin" id="example-text-input" value="{{ $footer->linkedin }}">
                                </div>

                            <!-- instagram -->
                                <label for="footer_baslik" class="col-form-label">Instagram</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="instagram" type="text" placeholder="Instagram" id="example-text-input" value="{{ $footer->instagram }}">
                                </div>

 </div> <!-- sağ kolon bitti -->

                            
                            




                            </div>  <!--row bitti -->

                            <input type="submit" class="col-8 btn btn-info waves-effect waves-light" value="Footer Güncelle">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
