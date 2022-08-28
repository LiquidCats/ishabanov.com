<form id="feedback-form" action="{{ url('feedback') }}" method="post" class="bg-body p-5 rounded-4 lc-contacts-form">
    @csrf
    <fieldset>
        <legend></legend>

        <div class="form-floating mb-3">
            <input name="name" type="text" class="form-control" id="feedback-name" placeholder="Your Name">
            <label for="feedback-name">Your Name</label>
        </div>
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="feedback-email" placeholder="Email">
            <label for="feedback-email">Email</label>
        </div>

        <div class="form-floating mb-3">
            <textarea name="message"
                      class="form-control"
                      id="feedback-message"
                      rows="3"
                      maxlength="200"
                      placeholder="Message"
                      style="height: 10rem"></textarea>
            <label for="feedback-message">Message</label>
        </div>

        <div class="form-floating mb-3">
            <select id="feedback-subject" class="form-select" aria-label="Subject">
                @php($feedbackTypes = App\Data\Enums\FeedbackType::cases())
                @foreach($feedbackTypes as $type)
                    <option value="{{ $type->value }}">{{ $type->getText() }}</option>
                @endforeach
            </select>
            <label for="feedback-subject">Subject</label>
        </div>

        <div class="text-end">
            <button type="submit" id="feedback-submit" class="btn btn-outline-primary btn-lg">
                <span class="d-inline-flex justify-content-center align-items-center gap-2 text-uppercase">
                    <span class="fs-6">Send</span>
                    <i data-feather="arrow-right-circle"
                       stroke-width="1.5"
                       width="24"
                       height="24"></i>
                </span>
            </button>
        </div>

    </fieldset>
</form>
