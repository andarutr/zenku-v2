<div>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
        </div>
        <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
            <tr>
                <th>Foto</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Status</th>
                <th colspan="2">Action</th>
                <th style="display: none"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($materi as $mtr)
                <tr>
                    <td>
                        <a href="/img/materi/{{ $mtr->picture_card}}" data-fancybox>
                            <img src="/img/materi/{{ $mtr->picture_card}}" width="100">
                        </a>
                    </td>
                    <td>{{ $mtr->title_card }}</td>
                    <td>{{ $mtr->user->name }}</td>
                    <td>
                        @if($mtr->is_active == 'active')
                        <span class="btn btn-sm btn-primary text-white">{{ $mtr->is_active }}</span>
                        @else
                        <span class="btn btn-sm btn-danger text-white">{{ $mtr->is_active }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.materi.show', $mtr->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('admin.materi.destroy', $mtr->id) }}" method="POST">@csrf @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td style="display: none"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>