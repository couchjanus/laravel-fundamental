<div class="modal fade" id="delete_category_{{ $category->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <form class="" action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-red">
                    <h4 class="modal-title" id="mySmallModalLabel">Delete category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    Are you sure to delete category: <b>{{ $category->name }} </b>?

                </div>
                <div class="modal-footer">
                    <a href="{{ url('/') }}">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </a>
                    <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                </div>
            </div>
        </div>
    </form>
</div>
