@extends('admin.admin_master')


@section('admin')
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput.tag {
        margin-right: 3px;
        font-weight: 700;
        background: #f8f9fa;
        padding: 4px;
        color:#222;
        border-radius: 3px;

    }
    .bootstrap-tagsinput {
        padding: 10px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Alt Kategori Düzenle</h4>

                        <form method="post" action="{{ route('altkategori.guncelle') }}" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $altkategoriler->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $altkategoriler->resim }}">

                              <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Kategori Seç</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example" name ="kategori_id">
                                                    <option selected="">Kategori Seç</option>
                                                   @foreach($kategoriler as $kategori)
                                                    <option value="{{ $kategori->id }}"{{ $kategori->id == $altkategoriler->kategori_id ? 'selected' : '' }} >{{ $kategori->kategori_adi }}</option>
                                                    
                                                    @endforeach

                                                 
                                                    </select>
                                            </div>
                                        </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Kategori Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="altkategori_adi" type="text" placeholder="Alt Kategori Adı"  value="{{ $altkategoriler->altkategori_adi }}">
                                    @error('altkategori_adi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                                </div>
                            </div>

                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Anahtar"  value="{{ $altkategoriler->anahtar }}">
                                     @error('anahtar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Açıklama"  value="{{ $altkategoriler->aciklama }}">
                                     @error('aciklama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sıra No</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $altkategoriler->sirano ?? 1 }}">
                                    @error('sirano')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             
        
                            <div class="row mb-3">
                                <label for="resim" class="col-sm-2 col-form-label">Resim</label>
                                <div class="col-sm-10 form-group">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                    @error('resim')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ !empty($altkategoriler->resim) ? url($altkategoriler->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Alt Kategori Güncelle">

                            
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
        $('#resim').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#resimGoster').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#resim').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#resimGoster').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('#myForm').validate({
            rules: {
                altkategori_adi: { required: true },
                anahtar:      { required: true },
                aciklama:     { required: true },
                sirano:       { required: true, number: true },
              
            },
            messages: {
                altkategori_adi: { required: 'Alt kategori adı giriniz' },
                anahtar:      { required: 'Anahtar giriniz' },
                aciklama:     { required: 'Açıklama giriniz' },
                sirano:       { required: 'Sıra no giriniz', number: 'Sıra no sayı olmalıdır' },
              
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