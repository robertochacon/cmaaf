<div>

    <div class="row justify-content-around" wire:poll.100ms>

        @foreach ($shifts as $shift)
            <div class="col-12 d-flex justify-content-around p-1 mb-3 border shadow rounded">
                <div class="col-6">
                    <button type="submit" class="container border-0 p-2 rounded shadow bg-primary text-center text-white">
                        <h1 style="font-size: 80px;"><b>{{ $shift['code'] }}</b></h1>
                    </button>
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <h1><b>Posición {{ $shift['window'] ?? '0' }}</b></h1>
                </div>
            </div>
        @endforeach

    </div>
</div>
