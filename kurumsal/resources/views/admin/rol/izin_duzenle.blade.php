@extends('admin.admin_master')


@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">İzin Düzenle</h4>

                        <form method="post" action="{{ route('izin.guncelle.form') }}" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $izinler->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İzin Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="İzin Adı" id="example-text-input" value="{{ $izinler->name }}">
                                    
                               
                                </div>
                            </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Grup adı</label>
                                    <div class="col-sm-10 form-group">
                                        <select class="form-select" aria-label="Default select example" name="grup_adi">
                                            <option value="">Grup Seçiniz</option>
                                            <option value="banner" {{ $izinler->grup_adi == 'banner' ? 'selected' : '' }}>Banner</option>
                                            <option value="hakkimizda" {{ $izinler->grup_adi == 'hakkimizda' ? 'selected' : '' }}>Hakkımızda</option>
                                            <option value="kategoriler" {{ $izinler->grup_adi == 'kategoriler' ? 'selected' : '' }}>Kategoriler</option>
                                            <option value="altkategoriler" {{ $izinler->grup_adi == 'altkategoriler' ? 'selected' : '' }}>Altkategoriler</option>
                                            <option value="urunler" {{ $izinler->grup_adi == 'urunler' ? 'selected' : '' }}>Ürünler</option>
                                            <option value="bloglar" {{ $izinler->grup_adi == 'bloglar' ? 'selected' : '' }}>Bloglar</option>
                                            <option value="yazilar" {{ $izinler->grup_adi == 'yazilar' ? 'selected' : '' }}>Blog İçerikleri</option>
                                            <option value="surecler" {{ $izinler->grup_adi == 'surecler' ? 'selected' : '' }}>Süreçler</option>
                                            <option value="yorumlar" {{ $izinler->grup_adi == 'yorumlar' ? 'selected' : '' }}>Yorumlar</option>
                                            <option value="footer" {{ $izinler->grup_adi == 'footer' ? 'selected' : '' }}>Footer</option>
                                            <option value="seo" {{ $izinler->grup_adi == 'seo' ? 'selected' : '' }}>Seo Ayarları</option>
                                            
                                        </select>
                                    </div>
                             

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="İzin Güncelle">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                name: { required: true },
            },
            messages: {
                name: { required: 'İzin adı giriniz' }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endpush