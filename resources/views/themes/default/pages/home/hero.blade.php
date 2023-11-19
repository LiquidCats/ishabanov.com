<section id="hero" class="hero min-vh-100 d-flex flex-column justify-content-center align-items-center overflow-hidden shadow py-5">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-sm-12 col-md-12 col-lg-5 d-flex align-items-center justify-content-center">
                <div data-animation="slide-up" class="hero__person position-relative">
                    <svg width="841" height="870" viewBox="0 0 841 870" fill="none" xmlns="http://www.w3.org/2000/svg" class="position-relative z-2">
                        <g id="Homepage/Person">
                            <path id="big-triangle" d="M84.2043 697.622C54.4345 690.379 41.6262 655.791 59.6943 631.435L486.472 56.1205C506.83 28.6782 550.106 34.6926 561.924 66.6066L838.326 813.007C850.144 844.921 820.925 876.87 787.384 868.709L84.2043 697.622Z" fill="#22212A"/>
                            <ellipse id="ellipse" cx="414.82" cy="253.571" rx="257.055" ry="253.571" fill="#FAFAFA"/>
                            <image id="person-image" x="55" y="56" href="{{ asset('images/hero/person.png') }}" width="681" height="798"/>
                            <path id="small-triangle" d="M54.9035 560.03C67.096 530.269 106.857 523.717 128.193 547.953L218.599 650.643C240.921 675.998 226.461 715.68 192.882 721.214L50.8156 744.624C17.2369 750.157 -9.51346 717.266 3.24247 686.13L54.9035 560.03Z" fill="url(#paint0_linear_1026_963)" style=""/>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear_1026_963" x1="114.658" y1="533.145" x2="114.658" y2="745.237" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#05EAFF"/>
                                <stop offset="1" stop-color="#05FF64"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg width="841" height="870" viewBox="0 0 841 870" fill="none" xmlns="http://www.w3.org/2000/svg" id="shadow-root" class="position-absolute z-1">
                        <path id="shadow-big-triangle" d="M84.2043 697.622C54.4345 690.379 41.6262 655.791 59.6943 631.435L486.472 56.1205C506.83 28.6782 550.106 34.6926 561.924 66.6066L838.326 813.007C850.144 844.921 820.925 876.87 787.384 868.709L84.2043 697.622Z" fill="#22212A"/>
                        <ellipse id="shadow-ellipse" cx="414.82" cy="253.571" rx="257.055" ry="253.571" fill="#FAFAFA"/>
                        <path id="shadow-small-triangle" d="M54.9035 560.03C67.096 530.269 106.857 523.717 128.193 547.953L218.599 650.643C240.921 675.998 226.461 715.68 192.882 721.214L50.8156 744.624C17.2369 750.157 -9.51346 717.266 3.24247 686.13L54.9035 560.03Z" fill="#007F86"/>
                    </svg>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-7 d-flex justify-content-start align-items-center">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col" data-animation="slide-down">
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
