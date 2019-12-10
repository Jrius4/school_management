
        <?php $request = request(); ?>

        @foreach($industries as $industry)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.field-industries.destroy', $industry->id]]) !!}
                        
                            <a href="{{ route('backend.field-industries.edit', $industry->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $industry->title }}</td>
                <td>{!! $industry->description !!}</td>
            </tr>

        @endforeach


