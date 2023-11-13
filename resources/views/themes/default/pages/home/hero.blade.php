<section id="hero" class="hero d-flex flex-column justify-content-center align-items-center overflow-hidden shadow py-5">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-sm-12 col-md-12 col-lg-5 d-flex align-items-center justify-content-center">
                <div data-animation="slide-up">
                   <img src="{{ asset('images/hero/person.png') }}"
                        class="d-block img-fluid mx-auto hero__person"
                        alt="Ilya Shabanov - Software Engineer">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 d-flex justify-content-start align-items-center">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col" data-animation="slide-up">
                            <h1 class="display-1 fw-bold lh-1 text-uppercase text-white">Software Engineer</h1>
                        </div>
                        <div class="col-12 col-md-6 fs-4 fw-light text-white bg-white bg-opacity-10 p-3 rounded-3" data-animation="slide-right">
                            <p>Meet Ilya: Passionate Coder, Tech Maestro, and Innovator. From music to fintech,
                                I've coded it all using PHP, JavaScript, Docker, Kubernetes, and more. Have a project or a
                                groundbreaking idea? Let's connect and bring it to life!</p>
                        </div>
                        <div class="col-12 col-md-6 fs-4 fw-light text-white" data-animation="slide-left">
                            <p>Unveil the Secrets to Success: Explore My Exclusive Insights and Expert Tips!</p>
                            <a href="{{ route('pages.blog') }}" class="btn btn-secondary btn-lg text-up">Learn More <i class="bi bi-chevron-right fw-bold"></i></a>
                        </div>


                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-12 mt-5 mb-2 d-flex flex-column align-items-center">
        <a href="#experience" class="fs-1 text-white fw-bolder m-0 opacity-50"><i class="bi bi-arrow-down"></i></a>
    </div>
</section>
