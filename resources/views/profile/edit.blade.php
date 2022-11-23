<x-app>
  <main class="section">
    <div class="container">
      <h1 class="title is-3">@lang('Editar perfil')</h1>

      <x-form
        method="PUT"
        :model="$currentUser"
        :action="route('user-profile-information.update')"
      >

        <x-input name="name" />

        <x-input name="email" />

        <div>
          <x-errors></x-errors>
        </div>

        <div class="buttons is-right">
            <x-form.submit></x-form.submit>
        </div>
      </x-form>
    </div>
  </main>
</x-app>
