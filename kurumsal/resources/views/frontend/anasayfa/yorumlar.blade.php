 @php
$yorumlar = App\Models\Yorumlar::where('durum', 1)->orderBy('sirano', 'asc')->get();
$coklu = App\Models\Cokluresim::all();
@endphp

            <section class="testimonial">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 order-0 order-lg-2">
                            <ul class="partner__logo__wrap">
                                @foreach($coklu as $resimler)
                                <li>
                                    <img src="{{ asset($resimler->resim) }}" alt="">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-xl-5 col-lg-6">
                            <div class="testimonial__wrap">
                                <div class="section__title">
                                    <span class="sub-title">06 - Müşteri Yorumları</span>
                                    <h2 class="title">Bazı Müşterilerimiz </h2>
                                </div>
                                <div class="testimonial__active">

                                    @foreach($yorumlar as $yorum)
                                    <div class="testimonial__item">
                                        <div class="testimonial__icon">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <div class="testimonial__content">
                                            <p>{{ $yorum->metin }}</p>
                                            <div class="testimonial__avatar">
                                                <span>{{ $yorum->adi }}</span>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    @endforeach
                                </div>

                                <div class="testimonial__arrow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>