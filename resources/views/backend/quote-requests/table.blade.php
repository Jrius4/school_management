
        <?php $request = request(); ?>

        @foreach($quote_requests as $quote)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.quote-requests.destroy', $quote->id]]) !!}

                            <a href="{{ route('backend.quote-requests.edit', $quote->id) }}" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </a>



                            <button type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>

                    {!! Form::close() !!}
                </td>
                <td>{{ $quote->company }}</td>
                <td>{{ $quote->email }}</td>
                <td>{{ $quote->fieldIndustry->title }}</td>
                <td class="text-center"> <a href="{{ route('backend.quote-requests.show', $quote->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-eye"></i>
                    </a></td>
            </tr>

        @endforeach


