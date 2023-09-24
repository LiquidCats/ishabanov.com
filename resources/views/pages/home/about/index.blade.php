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

                        <p>I am Ilya, a passionate Software Engineer who has been working in the industry for several
                            years. Coding is not just a job for me, it's a way of life. I have always been focused on
                            delivering optimized and highly maintainable features to my clients.</p>

                        <p>As a self-proclaimed geek, I'm always looking to improve my skills and stay up-to-date with
                            the latest technologies. Throughout my career, I have worked in various domains such as
                            remote education, music distribution, grocery delivery, and fintech. I have gained
                            experience in a variety of programming languages including PHP, Golang, NodeJS, and
                            JavaScript, as well as frameworks like Laravel, React, and Vue. I am also proficient in
                            working with tools such as Kafka, ElasticSearch, RabbitMQ, Redis, Docker, Docker Swarm,
                            Kubernetes, and databases including MySQL, PostgreSQL, and MSSQL.</p>

                        <p>My experience and knowledge enable me to build high-end web applications using modern
                            technologies and approaches. I'm always excited to take on new challenges and help bring
                            ideas to life. Feel free to explore my website and get in touch if you have any questions or
                            projects you'd like to discuss. Let's build something great together!</p>
                    </div>
                    <div class="text-muted fs-4 my-1">
                        Current experience: {{ $duration->years }} years {{ $duration->months }} months
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
