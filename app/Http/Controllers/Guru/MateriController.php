<?php

namespace App\Http\Controllers\Guru;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Guru\EditMateriRequest;
use App\Http\Requests\Guru\PostMateriRequest;

class MateriController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Materi';
        return view('pages.guru.materi.index', $data);
    }
    
    public function show($id_card)
    {
        $data['menu'] = 'Materi';
        $data['id_card'] = $id_card;

        return view('pages.guru.materi.show', $data);
    }

    public function create()
    {
        $data['menu'] = 'Materi';
        return view('pages.guru.materi.create', $data);
    }

    public function store(PostMateriRequest $req)
    {
        $req->validated();

        // Pictures
        $file = $req->file('picture_card');
        $file->move('img/materi/', $file->getClientOriginalName());

        $materi = Card::create(array_merge($req->all(), [
                            'user_id' => Auth::user()->id,
                            'picture_card' => $file->getClientOriginalName(),
                            'url_card' => str_replace(' ','-',$req->title_card),
                            'is_active' => 'not_active',
                            'visit' => 1
                        ])
                );

        // Track Activity Account
        \Record::track('Menambahkan Materi '.$req->title_card);

        return redirect()->route('guru.materi.index')->withToastSuccess('Berhasil menambahkan data!');
    }

    public function edit($id_card)
    {
        $data['menu'] = 'Materi';
        $data['id_card'] = $id_card;

        return view('pages.guru.materi.edit', $data);
    }

    public function update(EditMateriRequest $req, $id_card)
    {
        $req->validated();

        if($req->hasFile('picture_card'))
        {
            // Pictures
            $file = $req->file('picture_card');
            $file->move('img/materi/', $file->getClientOriginalName());

            Card::where('id', $id_card)
                    ->update(array_merge($req->except(['_token','_method']), [
                        'user_id' => Auth::user()->id,
                        'picture_card' => $file->getClientOriginalName(),
                        'url_card' => str_replace(' ','-',$req->title_card),
                        'category_id' => $req->category_id,
                        'updated_at' => now(),
                    ])
                );
        }else{
            Card::where('id', $id_card)
                    ->update(array_merge($req->except(['_token','_method']), [
                        'user_id' => Auth::user()->id,
                        'url_card' => str_replace(' ','-',$req->title_card),
                        'category_id' => $req->category_id,
                        'updated_at' => now(),
                    ])
                );
        }

        // Track Activity Account
        \Record::track('Memperbarui Materi '.$req->title_card);

        return redirect()->route('guru.materi.index')->withToastSuccess('Berhasil menambahkan data!');
    }

    public function destroy($id_card)
    {
        // Track Activity Account
        $materi = Card::where('id', $id_card)->first();

        \Record::track('Menghapus Materi - '.$materi->user->name.' ('.$materi->user->title_card.')');

        $destroy = Card::where(['id' => $id_card, 'user_id' => Auth::user()->id])->delete();

        return redirect()->route('guru.materi.index')->withToastSuccess('Berhasil menghapus data!');
    }
}
