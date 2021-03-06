<script>
    window.kapouet = window.kapouet || {};
    window.kapouet.notyf = {
        config: {!! json_encode(config('kapouet.notyf')) !!},
        messages: {!! json_encode(session()->pull('notyf.messages', [])) !!}
    };
</script>

<script src="{{ Notyf::mix('js/notyf.js') }}"></script>
