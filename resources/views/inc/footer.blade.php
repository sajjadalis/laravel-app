<footer class="probootstrap-footer">
    <div class="container">
        <div class="row mb-5">
        <div class="col-md-8">
            <div class="row">
            <div class="col-lg mb-4"><h2 class="probootstrap-heading"><a href="#">Laravel</a></h2></div>
            <div class="col-lg">
                <div class="probootstrap-footer-widget mb-4">
                <h2 class="probootstrap-heading-2">Company</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">About</a></li>
                    <li><a href="#" class="py-2 d-block">Jobs</a></li>
                    <li><a href="#" class="py-2 d-block">Press</a></li>
                    <li><a href="#" class="py-2 d-block">News</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg">
                <div class="probootstrap-footer-widget mb-4">
                <h2 class="probootstrap-heading-2">Communities</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Support</a></li>
                    <li><a href="#" class="py-2 d-block">Sharing is Caring</a></li>
                    <li><a href="#" class="py-2 d-block">Better Web</a></li>
                    <li><a href="#" class="py-2 d-block">News</a></li>
                </ul>
                </div>
            </div>
            <div class="col-lg">
                <div class="probootstrap-footer-widget mb-4">
                <h2 class="probootstrap-heading-2">Useful links</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Bootstrap 4</a></li>
                    <li><a href="#" class="py-2 d-block">jQuery</a></li>
                    <li><a href="#" class="py-2 d-block">HTML5</a></li>
                    <li><a href="#" class="py-2 d-block">Sass</a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="probootstrap-footer-widget mb-4">
            <ul class="probootstrap-footer-social list-unstyled float-md-right float-lft">
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md text-left">
            <ul class="list-unstyled footer-small-nav">
            <li><a href="#">Legal</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Cookies</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">About</a></li>
            </ul>
        </div>
        <div class="col-md text-md-right text-left">
            <p><small>&copy; Laravel App 2018. All Rights Reserved.</p>
        </div>
        </div>
    </div>
</footer>

<script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laravel-app-3.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
    <script id="dsq-count-scr" src="//laravel-app-3.disqus.com/count.js" async></script>
    
@If(Request::is(['*edit']))
<script>
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
</script>

@endif