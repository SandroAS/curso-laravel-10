<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support) {
        // $supports = Support::all(); ou $supports = $support->all();
        $supports = $support->all();
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id) {
        if(!$support = Support::find($id)) {
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function create() {
        return view('admin/supports/create');
    }

    public function store(SupportRequest $request, Support $support) {
        $data = $request->validated();
        $data['status'] = 'a';

        // Support::create($data); ou $support->create($data);
        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id) {
        if(!$support = $support->find($id)) {
            return back();
        }
        return view('admin/supports/edit', compact('support'));
    }

    public function update(SupportRequest $request, Support $support, string $id) {
        if(!$support = $support->find($id)) {
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();
        // ou
        // $support->update($request->only(['subject', 'body']));

        $support->update($request->validated());
        return redirect()-> route('support.index');
    }

    public function destroy(Support $support, string|int $id) {
        if(!$support = $support->find($id)) {
            return back();
        }
        $support->delete();
        return redirect()-> route('support.index');
    }
}
