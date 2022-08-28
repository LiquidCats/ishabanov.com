<section id="hero" class="container-fluid vstack d-flex align-items-center justify-content-center lc-hero bg-dark">
    <span class="lc-hero-background blue"></span>
    <span class="lc-hero-background cyan"></span>
    <span class="lc-hero-background pink"></span>
    <div class="row justify-content-center min-vh-100">
        <div class="col-md-12 col-lg align-self-center text-white">
            <div class="display-1 m-0 fw-bold text-center text-lg-end">SOFTWARE DEVELOPER</div>
            <div class="display-1 m-0 mb-4 fw-light text-center text-lg-end">WHO SOLVING PROBLEMS</div>
            <div class="vstack gap-4 gap-lg-3 justify-content-end">
                <div class="hstack gap-3 justify-content-lg-end justify-content-center">
                    @each('hero.chip', $languages, 'tool')
                </div>
                <div class="hstack gap-3 justify-content-lg-end justify-content-center">
                    @each('hero.chip', $frameworks, 'tool')
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-auto align-self-center">
            <img src="{{ asset("images/hero/person.jpg") }}" class="d-block img-fluid my-4 my-lg-2 mx-auto lc-hero-person" alt="LiquidCats - Person">
        </div>
    </div>
</section>
