<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['company','user','agent.user'])->latest()->paginate(15);
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();
        $agents = \App\Models\Agent::with('user')->orderBy('id')->get();
        return view('tickets.create', compact('companies','users','agents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_id' => ['required','integer','exists:companies,id'],
            'user_id' => ['required','integer','exists:users,id'],
            'agent_id' => ['nullable','integer','exists:agents,id'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required', Rule::in(['open','in_progress','resolved','closed'])],
            'priority' => ['required', Rule::in(['low','medium','high'])],
        ]);

        $ticket = Ticket::create($data);
        return redirect()->route('tickets.index')->with('success', 'Ticket created');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['company','user','agent.user']);
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $companies = \App\Models\Company::orderBy('name')->get();
        $users = \App\Models\User::orderBy('name')->get();
        $agents = \App\Models\Agent::with('user')->orderBy('id')->get();
        $ticket->load(['company','user','agent']);
        return view('tickets.edit', compact('ticket','companies','users','agents'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'company_id' => ['required','integer','exists:companies,id'],
            'user_id' => ['required','integer','exists:users,id'],
            'agent_id' => ['nullable','integer','exists:agents,id'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required', Rule::in(['open','in_progress','resolved','closed'])],
            'priority' => ['required', Rule::in(['low','medium','high'])],
        ]);

        $ticket->update($data);
        return redirect()->route('tickets.index')->with('success', 'Ticket updated');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted');
    }
}
