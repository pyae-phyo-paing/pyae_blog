</div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="js/scripts.js"></script>
        <script>
            $('#description').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $(document).ready(function(){
                $('tbody').on('click','.delete',function(){
                    let id = $(this).data('id');
                    console.log(id);
                    $('#delete_id').val(id);

                    $('#deleteModal').modal('show');
                })
            })
    </script>
    <script>
        function cancelAction() {
            history.back(); // Navigates to the previous page in history
            return false;   // Prevents any other default actions
        }
</script>
    </body>
</html>