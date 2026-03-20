@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Süreç Düzenle</h4>

                        <form method="post" action="{{ route('surec.guncelle') }}" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $surecduzenle->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Süreç Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="surec" type="text" placeholder="Süreç Adı" id="example-text-input" value="{{ $surecduzenle->surec }}">
                                   
                                </div>
                            </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="baslik" type="text" placeholder="Başlık" id="example-text-input" value="{{ $surecduzenle->baslik }}">
                                        @error('baslik')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="aciklama" placeholder="Açıklama" rows="4">{{ $surecduzenle->aciklama }}</textarea>
                                        @error('aciklama')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            
                                <div class="row mb-3">
                                    <label for="example-text-input" class=" col-sm-2 col-form-label">Sıra No</label>
                                    <div class="col-sm-2 form-group">
                                        <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $surecduzenle->sirano }}">
                                    
                                    </div>
                                </div>

        
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Süreç Güncelle">

                            
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
@endsection

