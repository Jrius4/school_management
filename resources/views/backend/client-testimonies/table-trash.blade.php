
        <?php $request = request(); ?>

        @foreach($testimonies as $testimony)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.client-testimonies.restore', $testimony->id]]) !!}
                        
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>
                        
                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.client-testimonies.force-destroy', $testimony->id]]) !!}
                        
                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $testimony->name }}</td>
                <td>{{ $testimony->title_of_client }}</td>
            </tr>

        @endforeach

