@if ($popupBanner)
    

<div class="modal fade" id="popup-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <a href="{{ route('app.banner.show', $popupBanner->id) }}">
                    <img src="{{ $popupBanner->image_url }}" class="card-img-top" alt="...">
                </a>
            </div>
        </div>
    </div>
</div><!-- End Vertically centered Modal-->

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#popup-modal").modal('show');
        });
    </script>
@endpush

@endif
