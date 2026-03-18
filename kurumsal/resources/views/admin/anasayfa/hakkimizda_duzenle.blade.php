@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hakkımızda Düzenle</h4>

                        <form method="post" action="{{ route('admin.hakkimizda.guncelle') }}" enctype="multipart/form-data">
                            @csrf

                             <input type="hidden" name="id" value="{{ $hakkimizda->id }}">
                             <input type="hidden" name="onceki_resim" value="{{ $hakkimizda->resim }}">

                            <div class="row mb-3">
                                <label for="hakkimizda_baslik" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="baslik" type="text" placeholder="Başlık" id="example-text-input" value="{{ $hakkimizda->baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hakkimizda_alt_baslik" class="col-sm-2 col-form-label">Kısa Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kisa_baslik" type="text"  placeholder="Kısa Başlık" id="example-text-input" value="{{ $hakkimizda->kisa_baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hakkimizda_kisa_aciklama" class="col-sm-2 col-form-label">Kısa Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea name="kisa_aciklama" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Kısa Açıklama">{{ $hakkimizda->kisa_aciklama }}</textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="hakkimizda_aciklama" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea name="aciklama" class="form-control" id="elm1" rows="5" placeholder="Açıklama">{{ $hakkimizda->aciklama }}</textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="resim" class="col-sm-2 col-form-label">Resim</label>
                                <div class="col-sm-10">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ (!empty($hakkimizda->resim)) ? url($hakkimizda->resim): url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Hakkımızda Güncelle">

                            
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