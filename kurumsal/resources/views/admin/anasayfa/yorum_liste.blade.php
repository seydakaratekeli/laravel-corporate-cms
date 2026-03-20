@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yorum Listesi</h4>
                        </div>
                                                </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yorumlar</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                   <th>Sıra</th>
                                    <th>Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($yorumlar as $yorum)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $yorum->adi }}</td>
                                    <td>
                                        <input type="checkbox" class="yorum" data-id="{{ $yorum->id }}" id="{{ $yorum->id }}" switch="success" {{ $yorum->durum ? 'checked' : '' }} />
                                        <label for="{{ $yorum->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
 <a href="{{ route('yorum.duzenle', $yorum->id) }}" class="btn btn-info sm" title="Düzenle">
    <i class="fas fa-edit"></i></a>
    <a href="{{ route('yorum.sil', $yorum->id) }}" class="btn btn-danger sm" title="Sil" id="sil">
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