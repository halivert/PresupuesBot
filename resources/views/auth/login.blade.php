<x-app>
  <main class="section">
    <div class="container">
      <h1 class="title is-3">@lang('Iniciar sesión')</h1>

      <x-form
        method="POST"
        :action="route('login')"
      >
        <x-input
          name="email"
          required
        ></x-input>

        <x-input
          name="password"
          type="password"
          required
        ></x-input>

        <div>
          @if ($errors->any())
            <ul class="is-size-7 is-italic has-text-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif
        </div>

        <div class="buttons is-right">
          <button class="button is-primary">@lang('Iniciar sesión')</button>
        </div>

        <hr />

        <div class="buttons is-centered">
          <script
            v-pre
            async
            src="https://telegram.org/js/telegram-widget.js?21"
            data-telegram-login="{{ config('telegram.bot_username') }}"
            data-size="large"
            data-auth-url="{{ route('login.callback') }}"
            data-request-access="write"
          ></script>
        </div>
      </x-form>
    </div>
  </main>
</x-app>
