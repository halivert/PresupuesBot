<form
  {{ $attributes->except('v-scope')->whereDoesntStartWith('fieldset-')->merge([
          'v-scope' => "Form({ isAsync: $async, hasFiles: $files })",
          'method' => $requireCsrf() ? 'POST' : 'GET',
          'action' => $action,
          '@submit' => 'onSubmitForm',
          '@input-error' => 'pushInputError',
          'enctype' => $hasFiles ? 'multipart/form-data' : null,
      ]) }}
>
  @if ($requireCsrf())
    @csrf
    @method($method)
  @endif

  <fieldset
    {{ $attributes->only('v-scope')->merge([
        'class' => implode(' ', [$attributes->get('fieldset-class'), 'min-w-0']),
        'disabled' => $attributes->get('fieldset-disabled'),
        ':disabled' => $attributes->get(':fieldset-disabled'),
    ]) }}
  >
    {{ $slot }}
  </fieldset>
</form>
