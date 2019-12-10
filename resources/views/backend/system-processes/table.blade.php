
        <?php $request = request(); ?>

        @foreach($processes as $process)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.system-processes.destroy', $process->id]]) !!}
                        
                            <a href="{{ route('backend.system-processes.edit', $process->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $process->title }}</td>
                <td>{!! $process->excerpt !!}</td>
            </tr>

        @endforeach


