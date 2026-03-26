<section>

    <div class="card-header bg-transparent border-success">
        <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Şifre Güncelle</h5>
    </div>

    <div class="card-body">
        <p class="card-text">
            Hesabınızın güvende kalması için uzun, rastgele bir parola kullandığından emin olun.
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')


        <div class="row mb-3">
            <label for="current_password" class="col-sm-3 col-form-label">
            Mevcut Şifre</label>
            <div class="col-sm-9 form-group">
                <input class="form-control" placeholder="Mevcut Şifre" id="current_password" name="current_password" type="password" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-sm-3 col-form-label">
            Yeni Şifre</label>
            <div class="col-sm-9 form-group">
                <input class="form-control" placeholder="Yeni Şifre" id="password" name="password" type="password" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="row mb-3">
            <label for="password_confirmation" class="col-sm-3 col-form-label">
            Yeni Şifre Tekrar</label>
            <div class="col-sm-9 form-group">
                <input class="form-control" placeholder="Yeni Şifre Tekrar" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

    <div class="row col-xl-12 mt-3"> <!-- son div açılış-->
        <label class="col-xl-3 col-form-label"></label>
            <div class="col-xl-3 col-md-6 form-group">
                <button type="submit" class="btn btn-success waves-effect waves-light">
                     <i class="ri-check-line align-middle me-2"></i>
                     Kaydet
                 </button>
             </div>

            @if (session('status') === 'password-updated')
            <p class="col-xl-3 pt-2" 
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
            >Kaydedildi</p>
            @endif
        </div>
    </form>
</section>
