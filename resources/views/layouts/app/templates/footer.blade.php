
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; WebChallegne 2017</p>
            </div>
            <!-- /.container -->
        </footer>

        @include('.layouts.app.partials._script')
        <script>
            $(document).ready(function () {
                console.log('salut JQUERY !');
                $('.dropdown-toggle').dropdown()
            });
        </script>
    </body>
</html>
