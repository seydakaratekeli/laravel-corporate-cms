<section class="space-y-6">

    <div class="card-header bg-transparent border-danger">
        <h5 class="my-0 text-danger">
            <i class="mdi mdi-block-helper me-3"></i>
            <font _mstmutation="1" _msttexthash="443495" _msthash="262">Hesabı Sil
            </font>
        </h5>
    </div>

    <div class="card-body">
        <p class="card-text">
            Hesabınız silindikten sonra, tüm kaynakları ve verileri kalıcı olarak silinir. Hesabınızı silmeden önce, lütfen saklamak istediğiniz tüm verileri veya bilgileri indirin.
        </p>
    </div>


<div class="col-sm-12 col-md-12 col-xl-12">
    <div class="row">
            <label for="example-text-input" class="col-sm-3 col-form-label">
            </label>
        <div class="col-sm-9 form-group">
            <!-- Small modal -->
            <button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Hesabı Sil</button>
        </div>
    </div>

<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
    @csrf
    @method('delete')

<div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none; top:25%;" aria-hidden="true">
    <div class="modal-dialog modal-lg">

                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="myLargeModalLabel" style="font-weight: 600;">
                            Hesabınızı Silmek İstediğinizden Emin misiniz?</h5>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p class="card-text">Hesabınız silindikten sonra, tüm kaynakları ve verileri kalıcı olarak silinir. Hesabınızı kalıcı olarak silmek istediğinizi onaylamak için lütfen şifrenizi girin.</p>
                        </div>

                        <div class="m-2 col-lg-6">
                            <!-- <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" /> -->

                           <!--  <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                            /> -->

                            <input class="form-control" placeholder="Şifre" id="password" name="password" type="password" autocomplete="current-password" />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                            <div class="mt-6 flex justify-end">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-danger waves-effect waves-light">Hesabı Sil</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                        </form>
                    </div>
                    
            </section>