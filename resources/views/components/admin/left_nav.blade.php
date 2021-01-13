<div class="left-nav">
      <h4 class="title">Menu</h4>
      <a href="{{ url('/admin') }}" class="@if (Route::currentRouteName() == 'AdminHome') active @endif">Página Inicial Admin</a>
      <a href="{{ url('/admin/catalogos') }}" class="@if (Route::currentRouteName() == 'AdminCatalogos' or Route::currentRouteName() == 'AdminCatalogosEdit') active @endif">Catálogos</a>
      <a href="{{ url('/admin/documentos') }}" class="@if (Route::currentRouteName() == 'documentos_admin') active @endif">Documentos / Manuais</a>
      <a href="{{ url('/admin/videos') }}" class="@if (Route::currentRouteName() == 'videos_admin') active @endif">Vídeos</a>
      {{-- <a href="{{ url('/admin/fichas') }}" class="@if (Route::currentRouteName() == 'fichas_admin') active @endif">Fichas Técnicas</a> --}}
      {{-- <a href="{{ url('/admin/posts') }}" class="@if (Route::currentRouteName() == 'AdminPosts') active @endif">Posts página inicial</a> --}}
</div>

