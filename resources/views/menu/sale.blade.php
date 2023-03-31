<li class="nav-item {{ Route::is('sale.index') || Route::is('sale.history') ? 'active' : '' }}">
    <a href="{{ route('sale.index') }}">
        <i class="fas fa-motorcycle"></i>
        <p>Data Sale</p>
    </a>
</li>