<form method="POST" action="{{ route('dashboard.password.update') }}">
    @csrf
    <label for="password">New Password</label>
    <input id="password" type="password" name="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input id="password_confirmation" type="password" name="password_confirmation" required>

    <button type="submit">Change Password</button>
</form>
