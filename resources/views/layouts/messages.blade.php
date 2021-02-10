<div class="alert-icon shadow-inner wrap-alert-b">
    @if ($message = Session::get('success'))
        {{-- <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3><strong>Exitoso! </strong>{{ $message }}</h3>
        </div> --}}
        @push('scripts')
            <script type="text/javascript">
                $(document).ready(function() {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Exitoso ! ',
                        body: " {{ $message }} "
                    });
                });

            </script>
        @endpush

    @endif
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{-- <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><strong>Lo sentimos! </strong> {{ $error }}</h3>
            </div> --}}

            @push('scripts')
                <script type="text/javascript">
                    $(document).ready(function() {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Lo sentimos ! ',
                            body: " {{ $error }} "
                        });
                    });

                </script>
            @endpush
        @endforeach

    @endif
</div>
