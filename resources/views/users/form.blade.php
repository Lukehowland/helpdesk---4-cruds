@csrf
<div class="field">
    <label>Empresa</label>
    <select name="company_id">
        <option value="">-- Ninguna --</option>
        @foreach($companies as $c)
            <option value="{{ $c->id }}" @selected(old('company_id', $user->company_id ?? '') == $c->id)>{{ $c->name }}</option>
        @endforeach
    </select>
</div>
<div class="field">
    <label>Nombre</label>
    <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required>
</div>
<div class="field">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
</div>
<div class="field">
    <label>Contraseña @if(isset($user))<small>(deja en blanco para mantener)</small>@endif</label>
    <input type="password" name="password" @if(!isset($user)) required @endif>
</div>
<div class="field">
    <label>Rol</label>
    @php($roles = ['super_admin','company_admin','agent','user'])
    <select name="role" required>
        @foreach($roles as $r)
            <option value="{{ $r }}" @selected(old('role', $user->role ?? 'user') === $r)>{{ ucfirst(str_replace('_',' ',$r)) }}</option>
        @endforeach
    </select>
</div>
<div class="actions">
    <button class="btn" type="submit">Guardar</button>
    <a class="btn secondary" href="{{ route('users.index') }}">Cancelar</a>
</div>
