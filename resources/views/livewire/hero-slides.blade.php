<div>
    <section id="hero" class="relative w-full flex items-center justify-center bg-gradient-to-r from-green-100 to-blue-100">
      <div class="relative w-full overflow-hidden">
        <div class="swiper h-[50vh]"> <!-- altura responsiva -->
            <div class="swiper-wrapper">
                @foreach ($slides as $hero)
                    @foreach ($hero->getMedia('slides') as $slide)
                        <div class="swiper-slide">
                            <img src="{{ $slide->getUrl() }}" alt="Slide" class="w-full h-full object-cover" />
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
      </div>

      <!-- SwiperJS CDN -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              new Swiper('.swiper', {
                  navigation: {
                      nextEl: '.swiper-button-next',
                      prevEl: '.swiper-button-prev',
                  },
                  loop: true,
                  autoplay: {
                      delay: 3500,
                      disableOnInteraction: false,
                  },
              });
          });
      </script>
    </section>
</div>