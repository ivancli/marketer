@if(auth()->check())
    <script>
        var user = {!! \App\Models\User::findOrFail(auth()->user()->getKey())->toJson() !!};
    </script>
@endif