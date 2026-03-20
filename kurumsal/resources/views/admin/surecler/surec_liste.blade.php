@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Süreç Listesi</h4>
                        </div>
                                                </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Süreçler</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                   <th>Sıra</th>
                                    <th>Süreç</th>
                                    <th>Başlık</th>

                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($surecler as $surec)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $surec->surec }}</td>
                                    <td>{{ $surec->baslik }}</td>
                                   
                                    <td>
                                        <input type="checkbox" class="surec" data-id="{{ $surec->id }}" id="{{ $surec->id }}" switch="success" {{ $surec->durum ? 'checked' : '' }} />
                                        <label for="{{ $surec->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </td>
                                    <td>
 <a href="{{ route('surec.duzenle', $surec->id) }}" class="btn btn-info sm" title="Düzenle">
    <i class="fas fa-edit"></i></a>
    <a href="{{ route('surec.sil', $surec->id) }}" class="btn btn-danger sm" title="Sil" id="sil">
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