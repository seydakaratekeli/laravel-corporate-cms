@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Düzenle</h4>

                        <form method="post" action="{{ route('banner.guncelle') }}" enctype="multipart/form-data">
                            @csrf


                            <input type="hidden" name="id" value="{{ $homeBanner->id }}">

                            <div class="row mb-3">
                                <label for="banner_baslik" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="baslik" type="text" placeholder="Başlık" id="example-text-input" value="{{ $homeBanner->baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="banner_alt_baslik" class="col-sm-2 col-form-label">Alt Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="alt_baslik" type="text"  placeholder="Alt Başlık" id="example-text-input" value="{{ $homeBanner->alt_baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="banner_url" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="url" type="url"  placeholder="URL" id="example-text-input" value="{{ $homeBanner->url }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="banner_video_url" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="video_url" type="url"  placeholder="Video URL" id="example-text-input" value="{{ $homeBanner->video_url }}">
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
                                    <img class="rounded avatar-lg" src="{{ (!empty($homeBanner->resim)) ? url($homeBanner->resim): url('upload/resim-yok.png') }}" alt="" id="resimGoster">
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