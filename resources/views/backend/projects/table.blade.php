
        <?php $request = request(); ?>

        @foreach($projects as $project)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.projects.destroy', $project->id]]) !!}
                        
                            <a href="{{ route('backend.projects.edit', $project->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->projectCategory->title }}</td>
            </tr>

        @endforeach


