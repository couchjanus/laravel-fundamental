<tr>
  <th scope="row">{{$tag->id}}</th>
  <td>{{$tag->name}}</td>

  <td>
    <a href="{{route('tags.show', ['id'=>$tag->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button></a>
    <a href="{{route('tags.edit', ['id'=>$tag->id])}}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-magic"></i>&nbsp;Edit</button></a>

    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_tag_{{ $tag->id  }}"><i class="fa fa-times"></i>&nbsp;Delete</button>
  </td>
</tr>
