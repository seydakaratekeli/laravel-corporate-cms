@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Kullanıcı Liste</h4>

                                     <a href="{{ route('kullanici.ekle') }}" >
                                    <button type="button" class="btn btn-primary waves-effect waves-light" style="float: right;">Kullanıcı Ekle</button>
                                    </a>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Kullanıcılar</h4>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sıra</th>
                                                <th>Resim</th>
                                                <th>Adı</th>
                                                <th>Email</th>
                                                <th>Durum</th>
                                                <th>Rol</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @php
                                                    $s = 1;
                                                @endphp

                                                @foreach($kullanici_liste as $kullanicilar)
                                            <tr>
                                                <td>{{ $s++ }}</td>

                                                <td><img src="{{ !empty($kullanicilar->resim) ? url('upload/admin/' . $kullanicilar->resim) : url('upload/resim-yok.png') }}" style="width: 50px; height: 50px;"></td>
                                                <td>{{ $kullanicilar->name }}</td>
                                                <td>{{ $kullanicilar->email }}</td>

                                                <td>
                                                    <input type="checkbox" class="kullanicilar" data-id="{{ $kullanicilar->id }}" id="{{ $kullanicilar->id }}" switch="success" {{ $kullanicilar->durum ? 'checked' : '' }} />
                                                    <label for="{{ $kullanicilar->id }}" data-on-label="Yes" data-off-label="No"></label>
                                                </td>

                                                <td>

                                                    @foreach($kullanicilar->roles as $rol)
                                                        <span class="bg-primary" style= "border-radius: 7px 7px 3px 3px; color:#fff; font-size: 14px; padding: 4px;  ">{{ $rol->name }}</span>
                                                    @endforeach

                                                </td>
                                                <td>
                                                    <a href="{{ route('kullanici.duzenle', $kullanicilar->id) }}" class="btn btn-info btn-sm">Düzenle 
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('kullanici.sil', $kullanicilar->id) }}" class="btn btn-danger btn-sm" id="sil">Sil 
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </tr>
                                                @endforeach
                                           
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                       
                        
                    </div> <!-- container-fluid -->
                </div>

@endsection