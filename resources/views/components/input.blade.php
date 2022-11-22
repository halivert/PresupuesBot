<div class="field">
  <label
    class="label is-capitalized"
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
          'value' => old($name),
      ]) }}
    >
  </div>
</div>
