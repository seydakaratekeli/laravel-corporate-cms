<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 



<form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')


    <!-- end row -->
    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-3 pt-2">Resim</label>
        <div class="col-sm-9 form-group">
            <input type="file" name="resim" id="resim" class="form-control">
        </div>
    </div>


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-3"></label>
        <div class="col-sm-9">
            <img class="rounded avatar-lg" src="{{ (!empty(Auth::user()->resim)) ? url('upload/admin/'.Auth::user()->resim): url('upload/resim-yok.png') }}" alt="" id="resimGoster">
        </div>
    </div>

    <label class="col-sm-3 col-form-label"></label>
    <button type="submit" class="btn btn-success waves-effect waves-light">
     <i class="ri-check-line align-middle me-9"></i>
     Kaydet
 </button>
</form>





<script type="text/javascript">
    $(document).ready(function(){
        $('#resim').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#resimGoster').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>