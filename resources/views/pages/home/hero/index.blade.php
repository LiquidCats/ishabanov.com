<section id="hero" class="container-fluid d-flex align-items-center justify-content-center lc-hero bg-dark">
    <span class="lc-hero-background blue"></span>
    <span class="lc-hero-background cyan"></span>
    <span class="lc-hero-background pink"></span>
    <div class="row justify-content-center min-vh-100">
        <div class="col-md-12 col-lg align-self-center text-white">
            <div class="display-1 m-0 fw-bold text-center text-lg-end">SOFTWARE DEVELOPER</div>
            <div class="display-1 m-0 mb-4 fw-light text-center text-lg-end">SOLVING PROBLEMS</div>
            <div class="row">
                <div class="col col-md-8 offset-md-2 col-lg-8 offset-lg-4">
                    <div class="row g-2 justify-content-lg-end justify-content-center">
                        @each('pages.home.hero.chip', $languages, 'tool')
                        @each('pages.home.hero.chip', $frameworks, 'tool')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-auto align-self-center">
            <img src="{{ asset("images/hero/person.jpg") }}" class="d-block img-fluid my-4 my-lg-2 mx-auto lc-hero-person" alt="LiquidCats - Person">
        </div>
    </div>
</section>
