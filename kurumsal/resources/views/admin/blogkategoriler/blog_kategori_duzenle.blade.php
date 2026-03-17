@extends('admin.admin_master')


@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Blog Kategori Düzenle</h4>

                        <form method="post" action="{{ route('blog.kategori.guncelle') }}" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $BlogKategoriDuzenle->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="kategori_adi" type="text" placeholder="Kategori Adı" id="example-text-input" value="{{ $BlogKategoriDuzenle->kategori_adi }}">
                                    @error('kategori_adi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                               
                                </div>
                            </div>

                                <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sıra No</label>
                                <div class="col-sm-10">
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $BlogKategoriDuzenle->sirano }}">
                                  </div>
                                </div>
                            </div>

                           
                             
        
                           


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Blog Kategori Güncelle">

                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

