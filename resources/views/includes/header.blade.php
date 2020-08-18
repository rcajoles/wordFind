
<ul class="nav nav-pills justify-content-center" style="padding-bottom:50px;">

    <li class="nav-item">
        <a class="nav-link {{ $page == 'new search' ? 'active' : '' }}" href="{{ route('welcome') }}">New Search</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $page == 'previous search' ? 'active' : '' }}" href="{{ route('previous-search.index') }}">Previous Seaches</a>
    </li>

</ul>
