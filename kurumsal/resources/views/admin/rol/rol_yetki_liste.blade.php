@extends('admin.admin_master')

@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Rol Yetki Listesi</h4>


                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="overflow-x: auto;">
        
                                        <h4 class="card-title">Roller</h4>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Sıra</th>
                                                <th>Rol Adı</th>
                                                <th>Yetkiler</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                @php
                                                    ($s = 1)
                                                @endphp

                                                @foreach($rol as $roller)
                                            <tr>
                                                <td>{{ $s++ }}</td>
                                                <td>{{ $roller->name }}</td>
                                                <td>
                                                    @foreach($roller->permissions as $yetkiler)
                                                        <span class="badge rounded-pill bg-primary" style="font-size: 15px;">{{ $yetkiler->name }}</span>
                                                    @endforeach


                                                <td><a href="{{ route('rol.yetki.duzenle', $roller->id) }}" class="btn btn-info btn-sm m-2">Düzenle 
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.rol.sil', $roller->id) }}" class="btn btn-danger btn-sm" id="sil">Sil 
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                    </td>

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