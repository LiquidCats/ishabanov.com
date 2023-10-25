@php use Carbon\Carbon; @endphp
@extends('layouts.default')

@section("title", "Home")

@section('content')
<section id="about" class="bg-body">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-lg-5">
                <img src="{{ asset('images/about/man.svg') }}" alt="About" class="d-block img-fluid mx-auto my-4">
            </div>
            <div class="col-12 col-lg-7 fs-5">
                <div class="rounded-4 p-5">
                    <div>
                        <h1>About Me</h1>
                        <div class="fs-5 mt-2 mb-2">Current experience: {{ $duration }}</div>

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
                    </div>
                    <div>
                        <a href="https://github.com/LiquidCats" class="btn btn-light" target="_blank"><i class="bi bi-github"></i> GitHub</a>
                        <a href="https://www.instagram.com/degradation.of.mine" class="btn btn-light" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
                        <a href="https://www.linkedin.com/in/ilia-shabanov" class="btn btn-light" target="_blank"><i class="bi bi-linkedin"></i> LinkedIn</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
