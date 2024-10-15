<!-- dashboard-change-password.blade.php -->

<form action="{{ route('dashboard.change-password.post') }}" method="POST">
    @csrf

    <div>
        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <button type="submit">Change Password</button>
</form>
