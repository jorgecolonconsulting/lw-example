<div class="container-md pt-3">
    <input class="form-control" wire:model.debounce.300ms="search" type="text" placeholder="Search iTunes"/>

    @if($results)
        <div class="mt-3">
            @foreach($results as $result)
                @if(isset($result->trackName))
                    <div class="shadow mb-3 result d-flex justify-content-between align-items-center">
                            <img src="{{$result->artworkUrl100}}">

                            <div class="d-flex flex-column align-items-center">
                                <h5 class="mb-1">{{ $result->trackName }}</h5>

                                @if($result->kind == 'song')
                                    <audio controls src="{{$result->previewUrl}}"></audio>
                                @endif

                                @if(Str::endsWith($result->previewUrl, 'm4v'))
                                    <video controls height="150" src="{{$result->previewUrl}}"></video>
                                @endif
                            </div>

                            <p><a class="itunes-button badge rounded-pill bg-primary text-decoration-none me-3"
                                  href="{{str_replace('https', 'itms', $result->trackViewUrl)}}">Open in
                                    iTunes</a></p>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>

<style>
    a:hover {
        color: #adcfff;
    }

    .result {
        height: 200px;
    }

    .itunes-button {
        padding: .6rem;
    }
</style>
