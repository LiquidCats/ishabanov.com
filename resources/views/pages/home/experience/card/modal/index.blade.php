<!-- Modal -->
<div class="modal fade"
     id="experience-{{ $experience->id }}"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="experience-{{ $experience->id }}-label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            @include("pages.home.experience.card.modal.body")
        </div>
    </div>
</div>
