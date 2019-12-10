
        <?php $request = request(); ?>

        @foreach($projects as $project)

            <tr>
                <td>
                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'PUT', 'route' => ['backend.projects.restore', $project->id]]) !!}
                        
                            <button title="Restore" class="btn btn-xs btn-default">
                                <i class="fa fa-recycle"></i>
                            </button>
                        
                    {!! Form::close() !!}

                    {!! Form::open(['style' => 'display:inline-block;', 'method' => 'DELETE', 'route' => ['backend.projects.force-destroy', $project->id]]) !!}
                        
                            <button title="Delete Permanent" onclick="return confirm('You are about to delete a post permanently. Are you sure?')" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->projectCategory->title }}</td>
            </tr>

        @endforeach

