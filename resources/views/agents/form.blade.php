@csrf
<div class="field">
    <label>Empresa</label>
    <select name="company_id" required>
        @foreach($companies as $c)
            <option value="{{ $c->id }}" @selected(old('company_id', $agent->company_id ?? '') == $c->id)>{{ $c->name }}</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Usuario</label>
    <select name="user_id" required>
        @foreach($users as $u)
            <option value="{{ $u->id }}" @selected(old('user_id', $agent->user_id ?? '') == $u->id)>{{ $u->name }} ({{ $u->email }})</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Puesto</label>
    <input type="text" name="position" value="{{ old('position', $agent->position ?? '') }}">
</div>
<div class="actions">
    <button class="btn" type="submit">Guardar</button>
    <a class="btn secondary" href="{{ route('agents.index') }}">Cancelar</a>
</div>
