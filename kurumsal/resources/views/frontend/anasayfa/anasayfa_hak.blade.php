  @php
$hakkimizda = App\Models\Hakkimizda::find(1);
$coklu = App\Models\Cokluresim::where('durum', 1)->orderBy('sirano', 'asc')->get();

  @endphp

   <!-- about-area -->
            <section id="aboutSection" class="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="about__icons__wrap">
                                @foreach($coklu as $CokluResim)
                                <li>
                                    <img class="light" src="{{ asset($CokluResim->resim) }}" alt="XD">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="about__content">
                                <div class="section__title">
                                    <span class="sub-title">01 - Hakkımızda</span>
                                    <h2 class="title">{{ $hakkimizda->baslik }}</h2>
                                </div>
                                <div class="about__exp">
                                    <div class="about__exp__icon">
                                        <img src="{{ asset('/frontend/assets/img/icons/about_icon.png') }}" alt="">
                                    </div>
                                    <div class="about__exp__content">
                                        <p>{{ $hakkimizda->kisa_baslik }}</p>
                                    </div>
                                </div>
                                <p class="desc">{{ $hakkimizda->kisa_aciklama }}</p>
                                <a href="{{ route('anasayfa_hak') }}" class="btn" target="_blank">Devamı...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->