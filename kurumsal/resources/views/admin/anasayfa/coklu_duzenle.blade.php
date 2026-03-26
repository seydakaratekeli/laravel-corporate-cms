@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Çoklu Resim Düzenle</h4>

                        <form method="post" action="{{ route('coklu.guncelle') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $resim->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $resim->resim }}">

       
        
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
                                    <img class="rounded avatar-lg" src="{{ asset($resim->resim) }}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class=" col-form-label">Sıra No</label>
                                <div class="col-sm-2 form-group">
                                    <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value=" {{ $resim->sirano }} ">
                                  
                                </div>
                            </div>



                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Çoklu Resim Güncelle">

                            
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