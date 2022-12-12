<x-form
  {{ $attributes }}
  v-scope="{ closingDate: '' }"
  is-async
>

  <x-input
    name="name"
    required
  ></x-input>

  <div class="field">
    <div class="field-body">
      <x-input
        name="closing_date"
        v-model="closingDate"
        type="number"
        min="1"
        max="28"
        required
      ></x-input>

      <x-input
        name="payment_due_date"
        type="number"
        min="closingDate"
        max="28"
        required
      ></x-input>
    </div>
  </div>

  <x-input
    name="credit_limit"
    type="number"
  ></x-input>

  <x-errors />

  <div class="buttons is-right">
    <button
      type="button"
      class="button"
      @click="creating = false"
    >@lang('Cancelar')</button>

    <x-form.submit></x-form.submit>
  </div>
</x-form>
