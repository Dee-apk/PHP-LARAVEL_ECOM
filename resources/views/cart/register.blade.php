<!-- resources/views/auth/register.blade.php -->
<form action="{{ route('register') }}" method="POST">
    @csrf

    <!-- Name Input -->
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <!-- Email Input -->
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <!-- Password Input -->
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <!-- Confirm Password -->
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>
