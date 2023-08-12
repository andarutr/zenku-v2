<div>
    <div class="card mb-3">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Likes</h6>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th>Foto</th>
                    <th>Materi</th>
                    <th>Dibuat</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($likes as $like)
                <tr>
                    <td>
                        <a href="/img/materi/{{ $like->picture_card }}" data-fancybox>
                            <img src="/img/materi/{{ $like->picture_card }}" width="100">
                        </a>
                    </td>
                    <td>{{ $like->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($like->created_at)->format('d F Y') }}</td>
                    <td>
                        <a href="{{ route('user.materi.show', ['id_card' => $like->id_card ,'url_card' => $like->url_card]) }}" class="btn btn-md btn-primary"><i class="fas fa-eye"></i></a>&nbsp;
                    </td>
                    <td>
                        <form action="{{ route('user.like.destroy', ['id_like' => $like->id_like]) }}" method="POST">@csrf @method('delete')
                            <button type="submit" class="btn btn-md btn-danger" onclick="return confirm('Yakin ingin menghapus like ?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>
    {{ $likes->links() }}
</div>