<section>
    <div class="card-header bg-transparent border-success">
        <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Hesap Bilgilerim</h5>
    </div>

    <div class="card-body">
        <p class="card-text">
            Hesabınızın profil bilgilerini ve e-posta adresini güncelleyin.
        </p>
    </div>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

            <div class="row mb-3">
                <label for="name" class="col-sm-3 col-form-label">
                Ad Soyad</label>
                <div class="col-sm-9 form-group">
                    <input class="form-control" placeholder="Süreç" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" autocomplete="name"/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                </div>

<div class="row"> <!-- row açılış --->

    <label for="email" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9 form-group">
            <input class="form-control" placeholder="Süreç" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" autocomplete="email"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

    <div> <!-- endif üstü açılış -->
        <div class="row mb-2 mt-2">
            <label for="example-text-input" class="col-sm-3 col-form-label">
            </label>
            <div class="col-sm-9 form-group">
                E-posta adresiniz doğrulanmadı.
             </div>
        </div>

        <div class="row">
            <label for="example-text-input" class="col-sm-3 col-form-label">
            </label>
            <div class="col-sm-9 form-group">
                <button form="send-verification" type="submit" class="btn btn-warning waves-effect waves-light">
                <i class="ri-error-warning-line align-middle me-2"></i>
                   Doğrulama e-postasını yeniden göndermek için burayı tıklayın.
                </button>
             </div>
        </div>

            @if (session('status') === 'verification-link-sent')

        <div class="row mt-2">
            <label for="example-text-input" class="col-sm-3 col-form-label">
            </label>
            <p class="col-sm-9 form-group card-text">
                E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.
            </p>
        </div>
            @endif
        </div> <!-- endif üstü kapanış -->
        @endif
</div> <!-- row kapanış --->

    <div class="row col-xl-12 mt-3"> <!-- son div açılış-->
        <label class="col-xl-3 col-form-label"></label>
            <div class="col-xl-4 col-md-6 form-group">
                <button type="submit" class="btn btn-success waves-effect waves-light">
                     <i class="ri-check-line align-middle me-2"></i>
                     Kaydet
                 </button>
             </div>
   
            @if (session('status') === 'profile-updated')
            <p class="col-xl-3 pt-2" 
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400"
            >Kaydedildi.</p>
            @endif
        </div>
    </form>
</section>
