<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        $data['menu'] = 'Feedback';
        return view('pages.admin.feedback.index', $data);
    }

    public function destroy_all($id_feedback)
    {
        Feedback::truncate();
        return redirect()->back()->withToastSuccess('Berhasil menghapus feedback!');
    }

    public function destroy($id)
    {
        Feedback::where('id', $id)->delete();
        return redirect()->back()->withToastSuccess('Berhasil menghapus feedback!');
    }
}
