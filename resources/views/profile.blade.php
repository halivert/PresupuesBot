<x-app>
  <main class="section">
    <h1 class="title is-3">
      {{ $currentUser->name }}
    </h1>

    {{ $currentUser->displayName }}

    {{ $currentUser->email }}
  </main>
</x-app>
