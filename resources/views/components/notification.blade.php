@props([
    'noClose' => false,
])

<article
  {{ $attributes->merge([
      'class' => 'notification',
  ]) }}
  v-scope="{ open: true }"
  v-show="open"
>
  @unless($noClose)
    <button
      class="delete"
      type="button"
      @click="open = false"
    ></button>
  @endunless
  {{ $slot }}
</article>
