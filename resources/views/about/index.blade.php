<section id="about" class="bg-body">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-6">
                <img src="{{ asset('images/about/man.svg') }}" alt="About" class="d-block img-fluid mx-auto my-4">
            </div>
            <div class="col-12 col-lg-6 fs-5">
                <div class="rounded-4 p-5">
                    <div>
                        <h2>About Me</h2>
                        <p>Senior Software Engineer with a demonstrated history of working in the information technology
                            and services industry. Skilled in PHP, JS,NodeJs, React, Vue.js, Laravel, Symphony, Zend
                            Framework, CQRS, Event Sourcing and Payment Gateways for Blockchain architecture. Strong
                            engineering professional with a bachelor focused in Programming Engineering.</p>
                    </div>
                    <div class="text-muted fs-4 my-1">
                        Current experience: {{ $duration->getYears() }} years {{ $duration->getMonths() }} months
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
