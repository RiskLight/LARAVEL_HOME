@component('mail::message')
    <h1>Актривируйте аккаунт</h1>
    <br>
    Благодарим за регистриацию, пожалуйста активируйте свой аккаунт.
    @component('mail::button', ['url' => route('auth.activate', ['token' => $user->activation_token, 'email' => $user->email])])
        Активировать
    @endcomponent
@endcomponent
