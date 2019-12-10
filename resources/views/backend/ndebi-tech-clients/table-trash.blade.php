
        <?php $request = request(); ?>

        @foreach($clients as $client)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.ndebi-tech-clients.restore', $client->id]]) !!}

                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>

                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.ndebi-tech-clients.force-destroy', $client->id]]) !!}

                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>

                    {!! Form::close() !!}
                </td>
                <td>
                        <img class="img-fluid" width="75" height="25" src="{{$client->imageUrl}}" />
                </td>
                <td>{{ $client->name }}</td>
            </tr>

        @endforeach

