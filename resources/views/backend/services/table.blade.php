
        <?php $request = request(); ?>

        @foreach($services as $service)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.services.destroy', $service->id]]) !!}
                        
                            <a href="{{ route('backend.services.edit', $service->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->serviceCategory->title }}</td>
            </tr>

        @endforeach


