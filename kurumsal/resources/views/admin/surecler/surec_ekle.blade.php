@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Süreç Ekle</h4>

                        <form method="post" action="{{ route('surec.form') }}"  id="myForm">
                            @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Süreç Adı</label>
                                                <div class="col-sm-12 form-group">
                                                 <input class="form-control" name="surec" type="text" placeholder="Süreç Adı">
                                                <!-- @error('surec')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror -->
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Başlık</label>
                                                <div class="col-sm-12 form-group">
                                                 <input class="form-control" name="baslik" type="text" placeholder="Başlık">
                                                <!-- @error('baslik')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror -->
                                        </div>  
                                    </div>

                                    <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Açıklama</label>
                                                <div class="col-sm-12 form-group">
                                                 <textarea class="form-control" name="aciklama" placeholder="Açıklama" rows="4"></textarea>
                                                 @error('aciklama')
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
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Süreç Ekle">

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
                surec: { required: true },
                baslik:        { required: true },
                aciklama:        { required: true },
                sirano:        { required: true },
            },
            messages: {
                surec: { required: ' Süreç boş olamaz' },
                baslik: { required: ' Başlık boş olamaz' }, 
                aciklama: { required: ' Açıklama boş olamaz' },
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
    



