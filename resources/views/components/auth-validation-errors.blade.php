@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>


        <ul class="mt-3 list-none test-sm space-y-2">
            @foreach ($errors->all() as $error)
                <li class="bg-red-100 borden-l-4 border-red-600 text-red-600 font-bold p-3">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
