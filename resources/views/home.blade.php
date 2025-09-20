@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pilih Kandidat OSIS</h2>

    @if($candidates->isEmpty())
        <p>Belum ada kandidat.</p>
    @else
        <div class="row">
            @foreach($candidates as $candidate)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidate->name }}</h5>
                            <p><strong>Visi:</strong> {{ $candidate->vision }}</p>
                            <p><strong>Misi:</strong> {{ $candidate->mission }}</p>
                            <form method="POST" action="{{ route('vote.store') }}">
                                @csrf
                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
