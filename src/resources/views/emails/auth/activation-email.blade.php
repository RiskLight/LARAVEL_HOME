    @component('mail::message')
        # Актривируйте аккаунт

        Благодарим за регистриацию, пожалуйста активируйте свой аккаунт.

        @component('mail::button', ['url' => route('auth.activate', [
        'token' => $user->activation_token,
        'email' => $user->email
        ])])
            Активировать
        @endcomponent

        Thanks,<br>
        {{ config('app.name') }}
    @endcomponent
