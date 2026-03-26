
<!doctype html>
<html lang="tr">

<head>

    <meta charset="utf-8" />
    <title>Admin | Mail Doğrulama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }} ">

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- bildiri -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <!-- bildiri -->

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Mail Doğrulama</b></h4>

                    <div class="p-3">

                        <div class="form-group mb-3 row">
                           <div class="col-12">
                            <p>
                                <strong>Üye olduğunuz için teşekkürler!</strong> Mail güvenliği adına, tarafınıza gelen mail ile doğrulama yapınız.
                            </p>
                        </div>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <p>
                       Kayıt sırasında verdiğiniz e-posta adresine yeni bir <b>doğrulama bağlantısı gönderildi.</b>
                   </p>
                   @endif

                   <form class="form-horizontal mt-3"  method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Doğrulama e-postasını tekrar gönder
                            </button>
                        </div>
                    </div>


                </form>

                <form class="form-horizontal mt-3"  method="POST" action="{{ route('logout') }}">
                    @csrf

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">
                                Çıkış
                            </button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <!-- end -->
    </div>
    <!-- end cardbody -->
</div>
<!-- end card -->
</div>
<!-- end container -->
</div>
<!-- end -->

<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }} "></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }} "></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }} "></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }} "></script>

<script src="{{ asset('backend/assets/js/app.js') }} "></script>

<!-- bildiri -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

   @if(Session::has('bildirim'))
   var type = "{{ Session::get('alert-type','info') }}"
   switch(type){
   case 'info':
    toastr.info(" {{ Session::get('bildirim') }} ");
    break;

case 'success':
    toastr.success(" {{ Session::get('bildirim') }} ");
    break;

case 'warning':
    toastr.warning(" {{ Session::get('bildirim') }} ");
    break;

case 'error':
    toastr.error(" {{ Session::get('bildirim') }} ");
    break; 
}
@endif 
</script>
<!-- bildiri -->



</body>
</html>
