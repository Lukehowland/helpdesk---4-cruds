@csrf
<div class="field">
    <label>Nombre</label>
    <input type="text" name="name" value="{{ old('name', $company->name ?? '') }}" required>
</div>
<div class="field">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $company->email ?? '') }}">
</div>
<div class="field">
    <label>Teléfono</label>
    <input type="text" name="phone" value="{{ old('phone', $company->phone ?? '') }}">
</div>
<div class="field">
    <label>Estado</label>
    <select name="status" required>
        @php($statuses = ['pending','approved','rejected'])
        @foreach($statuses as $status)
            <option value="{{ $status }}" @selected(old('status', $company->status ?? 'pending') === $status)>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>
<div class="actions">
    <button class="btn" type="submit">Guardar</button>
    <a class="btn secondary" href="{{ route('companies.index') }}">Cancelar</a>
</div>
