<x-app>
  <main class="section">
    <div class="container">
      <h1 class="title is-3">@lang('Registrarse')</h1>

      <x-form
        method="POST"
        :action="route('register')"
      >

        <x-input name="name"></x-input>

        <x-input name="email"></x-input>

        <div class="columns">
          <div class="column">
            <x-input
              name="password"
              type="password"
            ></x-input>
          </div>

          <div class="column">
            <x-input
              name="password_confirmation"
              type="password"
            ></x-input>
          </div>
        </div>

        <div class="buttons is-right">
          <button class="button is-primary">@lang('Registrarse')</button>
        </div>
      </x-form>
    </div>
  </main>
</x-app>
