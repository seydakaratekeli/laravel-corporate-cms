@extends('admin.admin_master')


@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-md-12">
                <div class="card" style="height: 600px;">
                    <div class="card-body">
                        <h4 class="card-title">Kullanıcı Düzenle</h4>

                        <form method="post" action="{{ route('kullanici.guncelle', $user->id) }}" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Ad Soyad</label>
                                <div class="col-sm-9 form-group">
                                    <input class="form-control" name="name" type="text" placeholder="Ad Soyad" value="{{ $user->name }}"    >
                                   
                               
                                </div>
                            </div>

                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9 form-group">
                                    <input class="form-control" name="email" type="email" placeholder="Email" value="{{ $user->email }}">
                                   
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="username" type="text" placeholder="Kullanıcı Adı" id="example-text-input" value="{{ $user->username }}">
                                     @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Telefon</label>
                                <div class="col-sm-9 form-group">
                                    <input class="form-control" name="telefon" type="text" placeholder="Telefon" value="{{ $user->telefon }}">
                                    @error('telefon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                              

                             <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Rol adı</label>
                                <div class="col-sm-9 form-group">
                                    <select class="form-select" aria-label="Default select example" name="rol">
                                        <option value="">Rol Seçiniz</option>

                                        @foreach($roller as $rol)
                                        <option value="{{ $rol->id }}" {{ $user->hasRole($rol->name) ? 'selected' : '' }}>{{ $rol->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                             
        
                           

                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Kullanıcı Düzenle">

                            
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

        $('#myForm').validate({
            rules: {
                name: { required: true },
                email:      { required: true, },
            },
            messages: {
                name: { required: 'Ad soyad giriniz' },
                email:      { required: 'Email giriniz' },
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
    



