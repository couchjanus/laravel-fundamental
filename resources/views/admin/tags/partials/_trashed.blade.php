<tr>
  <th scope="row">{{$category->id}}</th>
  <td>{{$category->name}}</td>

  <td>
    <a href="{{route('categories.restore', ['id'=>$category->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;Restore</button></a>
    <a href="{{route('categories.clear', ['id'=>$category->id])}}">
    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Clear Trash</button></a>
  </td>
</tr>
