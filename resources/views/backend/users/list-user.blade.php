@foreach($users as $user)
<tr>
    <td style="">{{$user->id}}</td>
    <td style="text-align: center"><img width="130" height="130" src="/image/{{$user->image}}" /></td>
    <td style="">{{$user->lastName}}</td>
    <td style="">{{$user->middleName}}</td>
    <td style="">{{$user->firstName}}</td>
    <td style="">{{$user->userName}}</td>
    <td style="">{{$user->email}}</td>
    <td class="form-group">
        <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
        <!-- <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a> -->
        <button type="button" class="deleteUser btn btn-danger" data-url="{{route('user.delete',$user->id) }}"><i class="glyphicon glyphicon-remove"></i></button>
    </td>
</tr>
@endforeach