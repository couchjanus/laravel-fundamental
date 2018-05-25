<tr>
  <th scope="row">{{$category->id}}</th>
  <td>{{$category->name}}</td>

  <td>
    <a href="{{route('categories.show', ['id'=>$category->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button></a>
    <a href="{{route('categories.edit', ['id'=>$category->id])}}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-magic"></i>&nbsp;Edit</button></a>

    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_category_{{ $category->id  }}"><i class="fa fa-times"></i>&nbsp;Delete</button>
  </td>
</tr>
