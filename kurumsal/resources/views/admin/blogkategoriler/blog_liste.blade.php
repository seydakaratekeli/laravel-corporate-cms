@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Kategori Listesi</h4>
                        </div>
                                                </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Kategori Listesi</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                   <th>Sıra</th>
                                    <th>Blog Kategori Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($blogListe as $bloglar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bloglar->kategori_adi }}</td>
                                    <td>
                                        <input type="checkbox" class="icerikler" data-id="{{ $bloglar->id }}" id="{{ $bloglar->id }}" switch="success" {{ $bloglar->durum ? 'checked' : '' }} />
                                        <label for="{{ $bloglar->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
 <a href="{{ route('blog.kategori.duzenle', $bloglar->id) }}" class="btn btn-info sm" title="Düzenle">
    <i class="fas fa-edit"></i></a>
    <a href="{{ route('blog.kategori.sil', $bloglar->id) }}" class="btn btn-danger sm" title="Sil" id="sil">
    <i class="fas fa-trash-alt"></i></a>
                                         </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection