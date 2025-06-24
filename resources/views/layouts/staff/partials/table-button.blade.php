<div class="btn-group" role="group" aria-label="Basic example">
    @if (isset($show))
        
    @endif
    @can('show_role')
        <a href="#" class="btn btn-info"><i class="bx bx-show"></i></a>
    @endcan
    @can('show_role')
        <a href="#" class="btn btn-success"><i class="bx bx-edit"></i></a>
    @endcan
    
    <a href="#" class="btn btn-success">
        <i class='bx bxs-edit'></i>
    </a>
    <a href="#" class="btn btn-danger">
        <i class='bx bx-trash'></i>
    </a>
</div>