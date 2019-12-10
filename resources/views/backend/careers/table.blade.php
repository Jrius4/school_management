
        <?php $request = request(); ?>

        @foreach($careers as $career)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.careers.destroy', $career->id]]) !!}
                        
                            <a href="{{ route('backend.careers.edit', $career->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                        

                        
                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        
                    {!! Form::close() !!}
                </td>
                <td>{{ $career->title }}</td>
                <td>{{ $career->careerCategory->title }}</td>
            </tr>

        @endforeach


