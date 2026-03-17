@extends('admin.admin_master')

@section('admin')

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Blog İçerikler </h4>

                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Ürün Liste</h4>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>                                                                                                                                    
                                                <th>Sıra</th>
                                                <th>Başlık</th>
                                                <th>Kategori Adı</th>
                                                <th>Resim</th>
                                               <th>Durum</th>
                                                <th>İşlem</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                                @foreach ($blogicerik as $icerikler)
                                               
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $icerikler->baslik }}</td>
                                               <td>{{ $icerikler['kategoriler']['kategori_adi'] }}</td>

                                         
                                             
                                               
                                                <td><img src="{{ !empty($icerikler->resim) ? url($icerikler->resim) : url('upload/resim-yok.png') }}" style="width: 50px; height: 50px;"></td>
                                                
                                                <td> 
                                                <input type="checkbox" class="metinler" data-id="{{ $icerikler->id }}" id="{{ $icerikler->id }}" switch="success" {{ $icerikler->durum ? 'checked' : '' }} />
                                                
                                                <label for="{{ $icerikler->id }}" data-on-label="Yes" data-off-label="No"></label> </td>

                                                <td><a href="{{ route('blog.icerik.duzenle', $icerikler->id) }}" class="btn btn-info btn-sm">Düzenle 
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('blog.icerik.sil', $icerikler->id) }}" class="btn btn-danger btn-sm btn-delete" id="sil">Sil 
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