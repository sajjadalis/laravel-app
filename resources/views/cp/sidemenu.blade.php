<div class="list-group col-md-12">
    <a href="{{ route('cp.dashboard') }}" class="list-group-item list-group-item-action {{ Active::checkRoute('cp.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="{{ route('cp.posts') }}" class="list-group-item list-group-item-action  {{ Active::checkRoute('cp.posts') }}"><i class="fas fa-map-pin"></i> Posts</a>
    <a href="{{ route('cp.pages') }}" class="list-group-item list-group-item-action  {{ Active::checkRoute('cp.pages') }}"><i class="fas fa-file"></i> Pages</a>
    <a href="{{ route('cp.settings') }}" class="list-group-item list-group-item-action  {{ Active::checkRoute('cp.settings') }}"><i class="fas fa-cog"></i> Settings</a>
</div>