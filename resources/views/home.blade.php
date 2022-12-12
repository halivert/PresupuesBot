<x-app>
  <main class="section">
    <div class="container">
      <h1 class="title is-3">
        @lang('Hola :0', [$currentUser->name])
      </h1>

      <div class="columns">
        <div
          class="column"
          v-scope
          v-cloak
        >
          @foreach ($cards as $card)
            <x-notification no-close>
              <h1 class="title is-5 mb-2">
                {{ $card->name }}
              </h1>

              <p>
                <strong>
                  @lang('Fecha de corte'):
                  {{ $card->closing_date }}
                </strong>
              </p>

              <p>
                @lang('Límite de pago'):
                {{ $card->payment_due_date }}
              </p>

              <p>
                {{ $card->credit_limit }}
              </p>
            </x-notification>
          @endforeach
        </div>

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
