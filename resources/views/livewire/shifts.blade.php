<div>

    <div class="row justify-content-around" wire:poll.100ms>

        @foreach ($shifts as $shift)
            <div class="d-flex justify-content-around p-2 mt-3 shadow rounded">
                <div class="col-6">
                    <button type="submit" class="container border-0 p-3 rounded shadow bg-primary text-center text-white">
                        <h1><b>{{ $shift['code'] }}</b></h1>
                    </button>
                </div>
                {{-- <div class="col-0 d-flex align-items-center">
                    <h3><b>Sala {{ $shift['room'] ?? 'N/A' }}</b></h3>
                </div> --}}
                <div class="col-0 d-flex align-items-center">
                    <h3><b>Posición {{ $shift['window'] ?? '0' }}</b></h3>
                </div>
            </div>
        @endforeach

    </div>
</div>
