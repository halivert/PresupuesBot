<button
  {{ $attributes->merge([
      'class' => 'button is-primary',
      ':class' => "{'is-loading': isLoading}",
  ]) }}
>
  @if ($slot->isEmpty())
    @lang('Guardar')
  @else
    {{ $slot }}
  @endif
</button>
