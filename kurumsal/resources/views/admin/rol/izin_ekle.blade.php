@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">İzin Ekle</h4>

                        <form method="post" action="{{ route('izin.ekle.form') }}" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İzin Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="İzin Adı" >
                                   
                               
                                </div>
                            </div>

                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Grup adı</label>
                                <div class="col-sm-10 form-group">
                                    <select class="form-select" aria-label="Default select example" name="grup_adi">
                                        <option value="">Grup Seçiniz</option>
                                        <option value="banner">Banner</option>
                                        <option value="hakkimizda">Hakkımızda</option>
                                        <option value="kategoriler">Kategoriler</option>
                                        <option value="altkategoriler">Altkategoriler</option>
                                        <option value="urunler">Ürünler</option>
                                        <option value="bloglar">Bloglar</option>
                                        <option value="yazilar">Blog İçerikleri</option>
                                        <option value="surecler">Süreçler</option>
                                        <option value="yorumlar">Yorumlar</option>
                                        <option value="footer">Footer</option>
                                        <option value="seo">Seo Ayarları</option>
                                        
                                    </select>
                                </div>
                            </div>
                             
                             
        


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="İzin Ekle">

                            
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
    



