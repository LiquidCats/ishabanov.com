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
                        <p>Hey! 👋 This is me 👆 and my name is Ilya. Already for many years, I am working as a Software Engineer. And the first thing you have to know about me I am mad about coding. From the very begging of my carrier I was concentrating on delivering optimized and highly maintainable features.
                        <p>My geeky nature never let me stop improving my skills and constantly learning new stuff. For the past years, I tried myself as a developer in different domains such as remote education, music distribution, grocery delivery, and fintech. Filled my stack with different programming languages: PHP, Golang, NodeJS, JavaScript; frameworks: Laravel, React, Vue; Tools: Kafka, ElasticSearch, RabbitMQ, Redis, Doker, Docker Swarm, Kubernetes, etc.; and databases: MySQL, PostgreSQL, MSSQL</p>
                        <p>Currently, all of my experience allows me to build high-end web applications with all modern technologies and approaches. </p>
                    </div>
                    <div class="text-muted fs-4 my-1">
                        Current experience: {{ $duration->getYears() }} years {{ $duration->getMonths() }} months
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
