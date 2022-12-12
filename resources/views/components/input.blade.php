@aware([
    'model' => null,
])

<div class="field">
  <label
    class="label is-capitalized {{ $required ? 'required' : '' }}"
    for="{{ $name }}"
  >{{ $label }}</label>
  <div class="control">
    <input
      {{ $attributes->merge([
          'class' => 'input',
          'type' => 'text',
          'name' => $name,
          'id' => $name,
          'placeholder' => $placeholder,
          'value' => old($name, $model?->$name) ?: null,
          'required' => $required,
      ]) }}
    >
  </div>
</div>
