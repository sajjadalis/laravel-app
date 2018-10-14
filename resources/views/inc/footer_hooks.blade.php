<script>
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laravel-app-3.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
<script id="dsq-count-scr" src="//laravel-app-3.disqus.com/count.js" async></script>

<script>
    function confirm_delete() {
        return confirm('Do you really want to delete this?');
    }
</script>

@If(Request::is(['*edit', "*create"]))

    <script>
        var editor = new Jodit("#editor");
    </script>

@endif

{{-- <script>
    ClassicEditor
        .create( document.querySelector( '#article-ckeditor' ) 
            // , {
            //     toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'imageUpload', 'video' ],
            //     heading: {
            //         options: [
            //             { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            //             { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
            //             { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            //             { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
            //             { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            //         ]
            //     }
            // }
        )
        .catch( error => {
            console.error( error );
        } );
</script> --}}