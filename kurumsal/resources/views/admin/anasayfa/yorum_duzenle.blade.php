@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yorum Düzenle</h4>

                        <form method="post" action="{{ route('yorum.guncelle') }}" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $yorumduzenle->id }}">
                            

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Ad</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="adi" type="text" placeholder="Ad Soyad" id="example-text-input" value="{{ $yorumduzenle->adi }}">
                                   
                                </div>
                            </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yorum</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="metin" placeholder="Yorum" rows="4">{{ $yorumduzenle->metin }}</textarea>
                                        @error('metin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class=" col-sm-2 col-form-label">Sıra No</label>
                                    <div class="col-sm-2 form-group">
                                        <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $yorumduzenle->sirano }}">
                                    
                                    </div>
                                </div>


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Yorum Güncelle">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')


<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                adi: { required: true },
                metin:        { required: true },
                sirano:        { required: true },
            },
            messages: {
                adi: { required: ' Ad Soyad boş olamaz' },
                metin: { required: ' Metin boş olamaz' },
                sirano:        { required: 'Sıra numarası giriniz' },

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
@endsection

