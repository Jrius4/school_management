
        <?php $request = request(); ?>

        @foreach($industries as $industry)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.field-industries.restore', $industry->id]]) !!}
                        
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>
                        
                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.field-industries.force-destroy', $industry->id]]) !!}
                        
                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $industry->title }}</td>
                <td>{!! $industry->description !!}</td>
            </tr>

        @endforeach

