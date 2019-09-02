@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        <img style="height: 80px;" src="http://wwwfs.mineduc.cl/Archivos/infoescuelas/imagenes/20298/Escudo%20PuenteMaipo.jpg?fbclid=IwAR0xLBVFSMbMNo7lGGuZDzLzqK_QU-_9r0v_4JvFXguj6gsL4CLtAGizZjo">
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            {{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
        @endcomponent
    @endslot
@endcomponent
