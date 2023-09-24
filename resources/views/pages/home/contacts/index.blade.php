<section id="contacts" class="container lc-contacts">
    <div class="row">
        <div class="col mt-5 mb-3">
            <h2 class="display-4 fw-light">Send me a message</h2>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-7 col-lg-8">
            @include('pages.home.contacts.form')
        </div>
        <div class="col-12 col-md-5 col-lg-4 d-flex flex-column justify-content-center align-items-center">
            @include("pages.home.contacts.info")
            @include("pages.home.contacts.links")
        </div>

    </div>
</section>
