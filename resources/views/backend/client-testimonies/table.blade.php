
        <?php $request = request(); ?>

        @foreach($testimonies as $testimony)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.client-testimonies.destroy', $testimony->id]]) !!}
                        
                            <a href="{{ route('backend.client-testimonies.edit', $testimony->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $testimony->name }}</td>
                <td>{{ $testimony->title_of_client }}</td>
            </tr>

        @endforeach


