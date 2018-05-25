<tr>
  <th scope="row">{{$post->id}}</th>
  <td>{{$post->title}}</td>

  <td>
    <a href="{{route('posts.show', ['id'=>$post->id])}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;View</button></a>
    <a href="{{route('posts.edit', ['id'=>$post->id])}}"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-magic"></i>&nbsp;Edit</button></a>
    <a href="{{route('posts.destroy', ['id'=>$post->id])}}"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i>&nbsp;Delete</button></a>
  </td>
</tr>
