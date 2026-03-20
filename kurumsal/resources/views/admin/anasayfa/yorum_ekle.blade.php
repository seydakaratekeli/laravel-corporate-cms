@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yorum Ekle</h4>

                        <form method="post" action="{{ route('yorum.form') }}"  id="myForm">
                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Ad Soyad</label>
                                                <div class="col-sm-12 form-group">
                                                 <input class="form-control" name="adi" type="text" placeholder="Ad Soyad">
                                                @error('adi')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror 
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Yorum</label>
                                                <div class="col-sm-12 form-group">
                                                 <textarea class="form-control" name="metin" placeholder="Yorum" rows="4"></textarea>
                                                 @error('metin')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                    </div>

                            
                             <div class="row mb-3">
                                <label for="example-text-input" class=" col-form-label">Sıra No</label>
                                <div class="col-sm-2 form-group">
                                    <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="1">
                                  
                                </div>
                          </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Yorum Ekle">

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
                adi: { required: true },
                metin: { required: true },
                sirano: { required: true },
            },
            messages: {

                adi: { required: ' Ad Soyad boş olamaz' },
                metin: { required: ' Metin boş olamaz' }, 
                sirano: { required: 'Sıra numarası giriniz' },

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
    



