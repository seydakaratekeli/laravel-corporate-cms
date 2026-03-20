 @php
    $surec=App\Models\Surec::where('durum',1)->orderBy('sirano','ASC')->get();
@endphp
 
 <section class="work__process">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section__title text-center">
                                <span class="sub-title">03 - Çalışma Sürecimiz</span>
                                <h2 class="title">A clear product design process is the basis of success</h2>
                            </div>
                        </div>
                    </div>


                    <div class="row work__process__wrap">
                        @foreach ($surec as $surecler)
                        <div class="col">
                            <div class="work__process__item">
                                <span class="work__process_step">{{ $surecler->surec}}</span>
                                <div class="work__process__icon">
                                    <img class="light" src="{{ asset('/frontend/assets/img/icons/wp_light_icon01.png') }}" alt="">
                                </div>
                                <div class="work__process__content">
                                    <h4 class="title">{{ $surecler->baslik }}</h4>
                                    <p>{{ $surecler->aciklama }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </section>