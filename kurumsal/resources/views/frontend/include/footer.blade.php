 @php
$footer = App\Models\Footer::find(1);

  @endphp

<section class="homeContact" style ="margin-top:230px;">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 -İletişim</span>
                                    <h2 class="title">Teklif Formu</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>Buradan bize 7/24 olarak ulaşabilirsiniz.</p>
                                    <h2 class="mail"><a href="mailto:{{ $footer->mail }}">{{ $footer->mail }}</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                            <form method="post" action="{{ route('teklif.form') }}" class="contact__form form-group" id="myForm">
                             @csrf
                             <input type="text" name="adi" placeholder="Ad Soyad*">
                        
                            @error('adi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                                <input type="email" name="email" placeholder="Email Giriniz*">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                                <input type="text" name="telefon" placeholder="Telefon Numarası*">
                             @error('telefon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                                <input type="text" name="konu" placeholder="Konu*">
                            @error('konu')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           
                      
                            <textarea type="text" name="mesaj" id="message" placeholder="Mesajınnız*"></textarea>
                            @error('mesaj')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn">Teklif Gönder</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


<footer class="footer">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">{{ $footer->baslikbir }}</h5>
                                <h4 class="title">{{ $footer->telefon }}</h4>
                            </div>
                            <div class="footer__widget__text">
                                <p>{{ $footer->metin }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">{{ $footer->baslikiki }}</h5>
                                <h4 class="title">{{ $footer->sehir }}</h4>
                            </div>
                            <div class="footer__widget__address">
                                <p>{{ $footer->adres }}</p>
                                <a href="mailto:{{ $footer->mail }}" class="mail">{{ $footer->mail }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="footer__widget">
                            <div class="fw-title">
                                <h5 class="sub-title">{{ $footer->baslikuc }}</h5>
                                <h4 class="title">{{ $footer->sosyal_baslik }}</h4>
                            </div>
                            <div class="footer__widget__social">
                                <p>{{ $footer->aciklama }}</p>
                                <ul class="footer__social__list">
                                    <li><a href="{{ $footer->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $footer->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $footer->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $footer->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright__wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright__text text-center">
                                <p>{{ $footer->copyright }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>