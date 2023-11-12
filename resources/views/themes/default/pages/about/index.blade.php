@php use Carbon\Carbon; @endphp
@extends('themes.default.layouts.default')

@section("title", "Home")
@section("preview", "Hey, I'm Ilya! I love coding and have been doing it for years across cool areas like music, fintech, and more. I know my way around tech stuff, from PHP and JavaScript to Docker and Kubernetes. Got a project or idea? Let's chat and make it happen!")
@section("published_time", Carbon::parse('2023-10-21')->startOfDay()->toAtomString())
@section('self_url', route('pages.about'))

@section('content')
<section id="about" class="about container-fluid position-relative py-4 d-flex align-items-center min-vh-100">
    <div class="about__content container bg-white p-4 rounded-4">
        <div class="row">
            <div class="col-12 col-lg-6">
                <img src="{{ asset('images/about/man.svg') }}" alt="About" class="d-block img-fluid mx-auto">
            </div>
            <div class="col-12 col-lg-6">
                <article>
                    <h1 class="mb-0">About Me</h1>
                    <div class="fs-5 mb-3 text-muted fw-bold">Current experience: {{ $duration }}</div>
                    <p>Hey! 👋 I'm Ilya. For many years now, I've been immersing myself in the world of Software
                        Engineering. First thing to note? Coding isn't just a profession for me—it's a passion.
                        Since the outset of my journey, I've honed in on delivering features that are not only
                        optimized but also highly maintainable.</p>
                    <p>My inner geek never rests. I'm always on the prowl to amplify my expertise and stay synced
                        with the latest tech vibes. Over the years, I've dipped my toes into a myriad of domains,
                        from remote education and music distribution to grocery delivery and fintech. My tech
                        arsenal? It's brimming with languages like PHP, Golang, NodeJS, and JavaScript; frameworks
                        including Laravel, React, and Vue; and an array of tools like Kafka, ElasticSearch,
                        RabbitMQ, Redis, Docker, Docker Swarm, and Kubernetes. Let's not forget databases like
                        MySQL, PostgreSQL, and MSSQL.</p>
                    <p>With all the experience under my belt, I'm primed to craft top-notch web applications infused
                        with modern-day flair. Always game for fresh adventures in code and eager to breathe life
                        into innovative ideas. Dive into my website, reach out with any queries or dream projects.
                        Let's code the future together!</p>
                    <div class="mt-3">
                        <a href="https://github.com/LiquidCats" class="btn btn-light" target="_blank"><i class="bi bi-github"></i> GitHub</a>
                        <a href="https://www.instagram.com/degradation.of.mine" class="btn btn-light" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
                        <a href="https://www.linkedin.com/in/ilia-shabanov" class="btn btn-light" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

@endsection
