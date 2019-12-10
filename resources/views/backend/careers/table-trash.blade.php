
        <?php $request = request(); ?>

        @foreach($careers as $career)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.careers.restore', $career->id]]) !!}
                        
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>
                        
                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.careers.force-destroy', $career->id]]) !!}
                        
                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $career->title }}</td>
                <td>{{ $career->careerCategory->title }}</td>
            </tr>

        @endforeach

