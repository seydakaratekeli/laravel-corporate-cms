@extends('admin.admin_master')


@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #228b22;
        font-weight: 700;
        padding:3px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Seo Ayarları</h4>

                        <form method="post" action="{{ route('seo.guncelle', [], false) }}" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $seo->id }}">
                             <input type="hidden" name="onceki_resim" value="{{ $seo->logo }}">


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="title" type="text" placeholder="Title" id="example-text-input" value="{{ $seo->title }}">
                                </div>
                            </div>
                            

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Site Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="site_adi" type="text"  placeholder="Site Adı" id="example-text-input" value="{{ $seo->site_adi }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="aciklama" type="text"  placeholder="Açıklama / Description" id="example-text-input" value="{{ $seo->aciklama }}">
                                </div>
                            </div>

                               

                                <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                                <div class="col-sm-10 form-group">
                                                 <input class="form-control" name="keywords" type="text" data-role="tagsinput" value="{{ $seo->keywords }}">
                                                
                                        </div>
                                    </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yapımcı / Author</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="author" type="text"  placeholder="Yapım / Author" id="example-text-input" value="{{ $seo->author }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Harita</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="harita" type="text"  placeholder="Google Haritalar" id="example-text-input" value="{{ $seo->harita }}">
                                    </div>
                                </div>

                           

                            <div class="row mb-3">
                                <label for="resim" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ (!empty($seo->logo)) ? url($seo->logo): url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Güncelle">

                            
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