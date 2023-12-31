@foreach($materi as $mat)
    <div class="col-lg-3 mb-3">
        <div class="card shadow" style="border-radius: 25px">
            <img src="/img/materi/{{ $mat->picture_card }}" class="card-img-top" style="border-radius: 25px 25px 10px 10px">
            <div class="card-body">
                <span class="badge bg-primary text-white mb-3">{{ $mat->category->category}}</span>
                <h5 class="card-title">
                    <a href="{{ route('user.materi.show', ['id' => $mat->id, 'url' => $mat->url_card]) }}" style="text-decoration: none;">{{ $mat->title_card  }}</a>
                    @if($mat->is_active == 'active')<small><i class="fas fa-check-circle"></i></small>@endif
                </h5>
                <p class="card-text"><img src="/img/profile/{{ $mat->user->picture }}" class="img-fluid rounded-circle" width="25"> <a href="/bio/{{ str_replace(' ', '-', strtolower($mat->user->name)) }}" style="text-decoration: none; color:black">{{ $mat->user->name }}</a></p>
                @php
                    $likes = \DB::table('likes')->where(['card_id' => $mat->id,'user_id' => Auth::user()->id])->first();
                @endphp
                <a href="{{ route('user.like.store', ['id' => $mat->id]) }}" class="btn btn-md"><i class="fas fa-heart 
                    @isset($likes)
                    text-danger
                    @endisset"></i></a>
                
                <a href="{{ route('user.materi.show', ['id' => $mat->id, 'url' => $mat->url_card]) }}" class="btn btn-md"><i class="fas fa-comment text-secondary"></i></a>
                <a href="{{ route('user.materi.show', ['id' => $mat->id, 'url' => $mat->url_card]) }}" class="btn btn-primary"><i class="fas fa-book-reader"></i> Belajar</a>
            </div>
        </div>
    </div>
@endforeach
<div class="col-lg-12">
    {{ $materi->links() }}
</div>