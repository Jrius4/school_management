@section('style')
    <link rel="stylesheet" href="/backend/plugins/tag-editor/jquery.tag-editor.css">
@endsection

@section('script')
    <script src="/backend/plugins/tag-editor/jquery.caret.min.js"></script>
    <script src="/backend/plugins/tag-editor/jquery.tag-editor.min.js"></script>
    <script type="text/javascript">
        var options = {};



        $('input[name=post_tags]').tagEditor(options);

        $('ul.pagination').addClass('no-margin pagination-sm');

        $('#name').on('blur', function() {
            var thename = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = thename.replace(/&/g, '-and-')
                                  .replace(/[^a-z0-9-]+/g, '-')
                                  .replace(/\-\-+/g, '-')
                                  .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });


    $(function () {
        // Summernote
        $('#bio').summernote();
    })


    </script>
@endsection
