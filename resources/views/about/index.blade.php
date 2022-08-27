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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda distinctio dolores enim harum illo molestiae nihil quia tempora vero voluptatibus.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium adipisci aliquid amet cupiditate distinctio dolore ea est et eum facere fugit in labore maiores nobis numquam optio pariatur perferendis perspiciatis porro possimus provident, quo temporibus tenetur velit, veritatis voluptas. Architecto autem ducimus id natus obcaecati reprehenderit suscipit velit veniam!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores atque blanditiis dolore dolorem, doloremque ducimus enim, ex fuga hic in ipsum iusto laboriosam mollitia obcaecati pariatur, possimus quisquam saepe suscipit ut vel velit vero vitae? Aspernatur corporis earum provident!</p>
                    </div>
                    <div class="text-muted fs-4 my-1">
                        Current experience: {{ $duration->getYears() }} years {{ $duration->getMonths() }} months
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
