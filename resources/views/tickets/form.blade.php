@csrf
<div class="field">
    <label>Empresa</label>
    <select name="company_id" required>
        @foreach($companies as $c)
            <option value="{{ $c->id }}" @selected(old('company_id', $ticket->company_id ?? '') == $c->id)>{{ $c->name }}</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Usuario</label>
    <select name="user_id" required>
        @foreach($users as $u)
            <option value="{{ $u->id }}" @selected(old('user_id', $ticket->user_id ?? '') == $u->id)>{{ $u->name }} ({{ $u->email }})</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Agente</label>
    <select name="agent_id">
        <option value="">-- Unassigned --</option>
        @foreach($agents as $a)
            <option value="{{ $a->id }}" @selected(old('agent_id', $ticket->agent_id ?? '') == $a->id)>{{ $a->user->name ?? 'Agent #'.$a->id }}</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Title</label>
    <input type="text" name="title" value="{{ old('title', $ticket->title ?? '') }}" required>
</div>
<div class="field">
    <label>Description</label>
    <textarea name="description" rows="5" required>{{ old('description', $ticket->description ?? '') }}</textarea>
</div>
<div class="field">
    <label>Status</label>
    @php($statuses = ['open','in_progress','resolved','closed'])
    <select name="status" required>
        @foreach($statuses as $s)
            <option value="{{ $s }}" @selected(old('status', $ticket->status ?? 'open') === $s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Priority</label>
    @php($priorities = ['low','medium','high'])
    <select name="priority" required>
        @foreach($priorities as $p)
            <option value="{{ $p }}" @selected(old('priority', $ticket->priority ?? 'medium') === $p)>{{ ucfirst($p) }}</option>
        @endforeach
    </select>
</div>
<div class="actions">
    <button class="btn" type="submit">Save</button>
    <a class="btn secondary" href="{{ route('tickets.index') }}">Cancel</a>
</div>
