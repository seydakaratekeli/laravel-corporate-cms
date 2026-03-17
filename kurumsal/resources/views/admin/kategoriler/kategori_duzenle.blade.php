@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Düzenle</h4>

                        <form method="post" action="{{ route('kategori.guncelle.form') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $KategoriDuzenle->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $KategoriDuzenle->resim }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kategori_adi" type="text" placeholder="Kategori Adı" id="example-text-input" value="{{ $KategoriDuzenle->kategori_adi }}">
                                    @error('kategori_adi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                                </div>
                            </div>

                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Anahtar" id="example-text-input" value="{{ $KategoriDuzenle->anahtar }}">
                                     @error('anahtar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Açıklama" id="example-text-input" value="{{ $KategoriDuzenle->aciklama }}">
                                     @error('aciklama')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             
        
                            <div class="row mb-3">
                                <label for="resim" class="col-sm-2 col-form-label">Resim</label>
                                <div class="col-sm-10">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                    @error('resim')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ !empty($KategoriDuzenle->resim) ? url($KategoriDuzenle->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Kategori Güncelle">

                            
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
@endpush