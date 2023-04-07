<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Models\Support;
use App\Services\SupportService;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service)
    {
        
    }

    public function index(Request $request) {
        // $supports = Support::all(); ou $supports = $support->all();
        // $supports = $support->all();
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id) {
        // if(!$support = Support::find($id)) {
        if(!$support = $this->service->findOne($id)) {
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

    public function edit(string|int $id) {
        // if(!$support = $support->find($id)) {
        if(!$support = $this->service->findOne($id)) {
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

    public function destroy(string $id) {
        // if(!$support = $support->find($id)) {
        //     return back();
        // }
        // $support->delete();
        $this->service->delete($id);
        return redirect()-> route('support.index');
    }
}
