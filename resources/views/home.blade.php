<x-app>
  <main class="section">
    <div class="container">
      <h1 class="title is-3">
        Hola {{ $currentUser->name }}
      </h1>

      <div class="columns">
        <div
          class="column is-half"
          v-scope="{creating: false}"
          v-cloak
        >
          <x-cards::form
            v-if="creating"
            :model="new App\Models\Card()"
            @success="creating = false"
          ></x-cards::form>

          <div class="buttons is-right">
            <button
              type="button"
              class="button is-link"
              :class="{ 'is-hidden': creating }"
              @click="creating = true"
            >
              @lang('Agregar tarjeta')
            </button>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-app>
