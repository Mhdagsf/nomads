<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.newsSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            grabCursor: true, // Menampilkan icon tangan saat mouse di atas kartu
            mousewheel: false,
            keyboard: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 30 },
            }
        });
    });
</script>