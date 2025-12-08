@if(isset($breadcrumbs))

<div class="breadcrumb-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{-- Ícone de casinha fixo --}}
            <li class="breadcrumb-item d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
                    <i class="fas fa-house"></i>
                </a>
            </li>

            {{-- Iteração sobre os breadcrumbs passados pelo controller --}}
            @foreach($breadcrumbs as $item)
                <li class="breadcrumb-item d-flex align-items-center {{ isset($item['status']) && $item['status'] ? 'active' : '' }}" aria-current="{{ isset($item['status']) && $item['status'] ? 'page' : '' }}">
                    <i class="fas fa-caret-right mx-2 text-muted"></i>
                    @if(isset($item['link']))
                        <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                    @else
                        {{ $item['name'] }}
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
</div>
@endif