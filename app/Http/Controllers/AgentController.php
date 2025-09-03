<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::with(['company','user'])->latest()->paginate(15);
        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();
        return view('agents.create', compact('companies','users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_id' => ['required','integer','exists:companies,id'],
            'user_id' => ['required','integer','exists:users,id','unique:agents,user_id'],
            'position' => ['nullable','string','max:255'],
        ]);

        $agent = Agent::create($data);
        return redirect()->route('agents.index')->with('success', 'Agent created');
    }

    public function show(Agent $agent)
    {
        $agent->load(['company','user']);
        return view('agents.show', compact('agent'));
    }

    public function edit(Agent $agent)
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();
        $agent->load(['company','user']);
        return view('agents.edit', compact('agent','companies','users'));
    }

    public function update(Request $request, Agent $agent)
    {
        $data = $request->validate([
            'company_id' => ['required','integer','exists:companies,id'],
            'user_id' => ['required','integer','exists:users,id', Rule::unique('agents','user_id')->ignore($agent->id)],
            'position' => ['nullable','string','max:255'],
        ]);

        $agent->update($data);
        return redirect()->route('agents.index')->with('success', 'Agent updated');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route('agents.index')->with('success', 'Agent deleted');
    }
}
