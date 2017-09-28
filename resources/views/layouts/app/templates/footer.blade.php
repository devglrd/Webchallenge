
    </body>
    <footer>
        @include('.layouts.app.partials._script')
        <script>
            $(document).ready(function () {
                console.log('salut JQUERY !');
                $('.dropdown-toggle').dropdown()
            });
        </script>
    </footer>
</html>