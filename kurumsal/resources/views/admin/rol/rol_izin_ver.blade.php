@extends('admin.admin_master')


@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style type="text/css">
    .form-check-label {
        text-transform: capitalize;
   }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Role Yetki Ver</h4>

                        <form method="post" action="{{ route('yetki.ver.form') }}" id="myForm">
                            @csrf


                             <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Rol adı</label>
                                <div class="col-sm-10 form-group">
                                    <select class="form-select" aria-label="Default select example" name="rol_id">
                                        <option value="">Rol Seçiniz</option>

                                        @foreach($roller as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>


                             <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1hepsi">
                                                        <label class="form-check-label" for="formCheck1hepsi">
                                                            Tam Yetki Ver
                                                        </label>
                                        </div>

                            <hr>
                            @foreach($izin_gruplari as $grup)


                             <div class="row mb-3">
                                 <div class="col-3">
                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" id="formCheck1">
                                                        <label class="form-check-label" for="formCheck1">
                                                            <h5>{{ $grup->grup_adi }}</h5> 
                                                        </label>
                                    </div>
                                </div>


                                @php
                                $izinler=App\Models\User::YetkiGruplari($grup->grup_adi);
                                @endphp

                                    <div class="col-9 mb-4">

                                    @foreach($izinler as $izin)
                                        <div class="form-check mb-3">
                                                        <input class="form-check-input" name="yetki[]" type="checkbox" id="formCheck1{{ $izin->id }}" value ="{{ $izin->id }}">
                                                        <label class="form-check-label" for="formCheck1{{ $izin->id }}">
                                                            {{ $izin->name }}
                                                        </label>
                                        </div>
                                        @endforeach

                                    </div>
                             </div>

                             @endforeach
                             
                             
        


                            <input type="submit" class="btn btn-info waves-effect waves-light" value=" Role Yetki Ver">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('#formCheck1hepsi').click(function(){
            if($(this).is(':checked')){
                $('input[type="checkbox"]').prop('checked', true);
            }
            else{ 
                $('input[type="checkbox"]').prop('checked', false);
            }
        });
    });
</script>
@endsection


    



