<form action="{{ url('feedback') }}" method="post" class="bg-body p-5 rounded-4 lc-contacts-form">
    <fieldset>
        <legend></legend>

        <div class="grid gap-3">
            <div class="g-col-6">
                <label for="exampleInputEmail1" class="form-label small">Email address</label>
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="g-col-6">
                <label for="exampleInputEmail2" class="form-label small">Email address</label>
                <input type="email" class="form-control form-control-lg" id="exampleInputEmail2" aria-describedby="emailHelp">
            </div>

            <div class="g-col-12">
                <label for="exampleFormControlTextarea1" class="form-label small">Example textarea</label>
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>

        <div class="row text-end mt-3">
            <div class="col">
                <select id="exampleInputEmail3" class="form-select form-select-lg">
                    <option value="1" disabled selected>Subject</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary btn-lg">
                    <span class="d-inline-flex justify-content-center align-items-center gap-2 text-uppercase">
                        <span class="fs-6">Send</span>
                        <i data-feather="arrow-right-circle"
                           stroke-width="1.5"
                           width="24"
                           height="24"></i>
                    </span>

                </button>
            </div>

        </div>

    </fieldset>
</form>
