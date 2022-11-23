<x-app>
  <main class="section">
    <div class="container">
      <header class="columns">
        <div class="column">
          <h1 class="title is-3">
            {{ $currentUser->name }}
          </h1>
        </div>

        <div class="column is-3">
          @if ($currentUser->telegram_id)
            <span class="tag is-info is-medium">
              @lang('Telegram')
              <a
                class="ml-1 has-text-weight-semibold has-text-white"
                href="https://t.me/{{ $currentUser->username }}"
              >
                ({{ $currentUser->username }})
              </a>
            </span>
          @endif
        </div>
      </header>

      <div class="buttons is-right">
        <a
          class="button is-link"
          href="{{ route('profile.edit') }}"
        >
          @lang('Editar perfil')
        </a>
      </div>

      @if (!$currentUser->telegram_id)
        <hr />

        <div>
          <h2 class="subtitle is-5">@lang('Vincular telegram')</h2>

          <script
            v-pre
            async
            src="https://telegram.org/js/telegram-widget.js?21"
            data-telegram-login="{{ config('telegram.bot_username') }}"
            data-size="large"
            data-auth-url="{{ route('telegram.link') }}"
            data-request-access="write"
          ></script>
        </div>
      @endif
    </div>
  </main>
</x-app>
