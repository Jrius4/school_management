
        <?php $request = request(); ?>

        @foreach($services as $service)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.services.restore', $service->id]]) !!}
                        
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>
                        
                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.services.force-destroy', $service->id]]) !!}
                        
                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->serviceCategory->title }}</td>
            </tr>

        @endforeach

