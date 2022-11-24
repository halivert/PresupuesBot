@if ($errors->any())
  <ul class="is-size-7 is-italic has-text-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@else
  <ul class="is-size-7 is-italic has-text-danger">
    <li v-for="error in errors" :key="error">
      @{{ error }}
    </li>
  </ul>
@endif
