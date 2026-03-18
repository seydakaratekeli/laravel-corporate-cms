@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Çoklu Resim Ekle</h4>

                        <form method="post" action="{{ route('coklu.resim.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                                <div class="row mb-3">
                                    <label for="resim" class="col-sm-2 col-form-label">Resim</label>
                                    <div class="col-sm-10 form-group">
                                        <input type="file" name="resim[]" id="resim" class="form-control" multiple required>
                                        @error('resim')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @error('resim.*')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                           
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 form-group">
                                    <img class="rounded avatar-lg" src="{{ url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Çoklu Resim Ekle">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
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
    });
</script>
@endpush
