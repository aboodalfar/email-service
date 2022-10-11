<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Mail Template</div>


                <div class="card-body">

                    @include('livewire.mail-template._mail-template-form')

                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('partials.template-preview')
        </div>
    </div>

    @push('scripts')

        <script type="text/javascript" src="{{asset('js/tinymce.js')}}"></script>

        <script>
            initializeTinymce((content) => {
            @this.set('body', content);
            });
        </script>

    @endpush

</div>