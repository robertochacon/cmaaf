<div>

    <div class="row justify-content-around" wire:poll.100ms>

        @foreach ($shifts as $shift)
            <div class="col-10 d-flex justify-content-around p-2 mb-3 border shadow rounded">
                <div class="col-6">
                    <button type="submit" class="container border-0 p-2 rounded shadow bg-primary text-center text-white">
                        <h1><b>{{ $shift['code'] }}</b></h1>
                    </button>
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <h2><b>Posición {{ $shift['window'] ?? '0' }}</b></h2>
                </div>
            </div>
        @endforeach

    </div>
</div>
