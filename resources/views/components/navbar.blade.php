<nav
  class="navbar is-primary"
  role="navigation"
  aria-label="main navigation"
  v-scope="{
    opened: false,
    toggleNavbar() {
        this.opened = !this.opened
    }
  }"
>
  <div class="navbar-brand">
    <a
      class="navbar-item"
      href="{{ route('home') }}"
    >
      <img src="/presupuesbot.png">
    </a>

    <a
      role="button"
      class="navbar-burger"
      :class="{ 'is-active': opened }"
      aria-label="menu"
      @click="toggleNavbar"
    >
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div
    :class="['navbar-menu', { 'is-active': opened }]"
    v-cloak
  >
    @auth
      <div class="navbar-start">
        <a
          class="navbar-item"
          href="{{ route('home') }}"
        >
          @lang('Inicio')
        </a>

        <a
          class="navbar-item"
          href="{{ route('profile') }}"
        >
          @lang('Perfil')
        </a>
      </div>
    @endauth

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          @auth
            <x-form
              class="is-hidden"
              id="logout-form"
              method="POST"
              :action="route('logout')"
            />
            <button
              class="button is-dark"
              form="logout-form"
            >
              @lang('Cerrar sesión')
            </button>
          @else
            <a
              class="button is-primary"
              href="{{ route('login') }}"
            >
              @lang('Iniciar sesión')
            </a>
            <a
              class="button is-info"
              href="{{ route('register') }}"
            >
              @lang('Registrarse')
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</nav>
